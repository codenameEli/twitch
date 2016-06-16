<?php

namespace Tower\Component;

use Tower\Utils\AjaxHandler as AjaxHandler;

class Events {

    private $categories; // String
    private $ajax_handler;

    public $post_count = 0;
    public $post_per_page = 9;
    public $paged = 0;
    public $has_more_posts = false;
    public $limit = 9;

    public function __construct()
    {

        $this->ajax_handler = new AjaxHandler( 'events' );
        $this->ajax_handler->add_listener( 'events_fetch_events', array( $this, 'fetch_events' ) );
        $this->ajax_handler->add_listener( 'events_fetch_dates', array( $this, 'fetch_dates' ) );
        $this->ajax_handler->add_listener( 'events_fetch_categories', array( $this, 'fetch_categories' ) );

        $this->paged = $this->get_paged();
    }

    public function get_paged()
    {
        return isset( $_REQUEST['st_paged'] ) ? $_REQUEST['st_paged'] : 1;
    }

    public function do_next_link()
    {
        $link;
        $output = '';
        $haystack = $_SERVER['REQUEST_URI'];
        $needle = 'st_paged';
        $pos1 = strpos( $haystack, $needle );
        $pos2 = strpos( $haystack, '&', $pos1 );
        $pos3 = strpos( $haystack, '?', $pos1 );
        $sep = false === $pos3 ? '?' : '&';

        if ( $this->paged === 1 || $this->paged === 0 ) {
            $link = home_url() . '/' . $haystack . $sep . $needle . '=2';
        } else {

            if ( !$pos2 && !$pos3 ) {
                $link = substr_replace( $haystack, $needle . '=' . ( $this->paged + 1 ), $pos1 );
            } else {
                $link = substr_replace( $haystack, $needle . '=' . ( $this->paged + 1 ), $pos1 ) . substr( $haystack, $pos2 );
            }
        }

        $output .= '<a class="pagination next-pagination" href="' . $link . '">Next</a>';

        return $output;
    }

    public function do_previous_link()
    {
        $link;
        $output = '';
        $haystack = $_SERVER['REQUEST_URI'];
        $needle = 'st_paged';

        if ( $this->paged <= 1 ) {
            return $output;
        } else {
            $pos1 = strpos( $haystack, $needle );
            $pos2 = strpos( $haystack, '&', $pos1 );
            $pos3 = strpos( $haystack, '?', $pos1 );

            if ( !$pos2 && !$pos3 ) {
                $link = substr_replace( $haystack, $needle . '=' . ( $this->paged - 1 ), $pos1 );
            } else {
                $link = substr_replace( $haystack, $needle . '=' . ( $this->paged - 1 ), $pos1 ) . substr( $haystack, $pos2 );
            }

            $output .= '<a class="pagination prev-pagination" href="' . $link . '">Previous</a>';
        }

        return $output;
    }

    public function fetch_events()
    {
        $data = $this->get_events();
        wp_send_json( $data );
    }

    public function fetch_categories()
    {
        wp_send_json( get_terms( "tribe_events_cat" ) );
    }

    public function get_dates()
    {
        global $wpdb;

        $final = array();
        $results = $wpdb->get_results('
            SELECT year(meta_value), month(meta_value), meta_value
            FROM st_posts p JOIN st_postmeta pm ON p.id = pm.post_id
            where pm.meta_key = "_eventstartdate" and post_type = "tribe_events" GROUP BY year(meta_value), month(meta_value)
        ');

        foreach ($results as $result) {
            $datetime = new \DateTime( $result->meta_value );
            $datetime = $datetime->setDate( $datetime->format('Y'), $datetime->format('m'), 1 );

            $formatted = array(
                'timestamp' => $datetime->format('c'),
                'label' => $datetime->format('F'),
                'month' => (int) $datetime->format('m'),
                'year' => (int) $datetime->format('Y'),
                'selected' => (bool) false
            );

            $final[] = $formatted;
        }

        return $final;
    }

    public function fetch_dates()
    {
        global $wpdb;

        $final = array();
        $results = $wpdb->get_results('
            SELECT year(meta_value), month(meta_value), meta_value
            FROM st_posts p JOIN st_postmeta pm ON p.id = pm.post_id
            where pm.meta_key = "_eventstartdate" and post_type = "tribe_events" GROUP BY year(meta_value), month(meta_value)
        ');

        foreach ($results as $result) {
            $datetime = new \DateTime( $result->meta_value );
            $datetime = $datetime->setDate( $datetime->format('Y'), $datetime->format('m'), 1 );

            $formatted = array(
                'timestamp' => $datetime->format('c'),
                'label' => $datetime->format('F'),
                'month' => (int) $datetime->format('m'),
                'year' => (int) $datetime->format('Y'),
                'selected' => (bool) false
            );

            $final[] = $formatted;
        }

        wp_send_json($final);
    }

    public function get_events()
    {
        $args = array(
            'dates' => isset( $_REQUEST['dates']) ? explode( ',', $_REQUEST['dates'] ) : array(),
            'cat_ids' => isset( $_REQUEST['cat_ids'] ) ? explode( ',', $_REQUEST['cat_ids'] ) : array(),
            'st_paged' => isset( $_REQUEST['st_paged'] ) ? $_REQUEST['st_paged'] : 1
        );

        $events = $this->query_events($args);

        return $events;
    }

    public function query_events($args)
    {
        global $wpdb;
        $paged = $args['st_paged'];
        $limit = 10;
        $index = ($paged-1)*($limit-1);
        $query = "
            SELECT
              post_id,
              post_type,
              p1.meta_value AS `event_start`,
              p2.meta_value AS `event_end`

            FROM st_postmeta AS p1
              JOIN st_postmeta AS p2
                USING (post_id)
              JOIN st_posts AS p
                ON p.ID = post_id
        ";

        if ( !empty($args['cat_ids']) ) {
            $query .= "
                JOIN st_term_relationships AS p3
                ON p3.object_id = post_id
            ";
        }

        $query .= "
            WHERE
                post_type = 'tribe_events'
                AND p1.meta_key = '_EventStartDate'
                AND p2.meta_key = '_EventEndDate'
        ";

        if ( !empty($args['dates']) && !empty('cat_ids') ) {
            $query .= $this->format_args_for_query($args);
        }

        $query .= "
            GROUP BY post_id
            ORDER BY event_start
            LIMIT $index,$limit
        ";

        $results = $wpdb->get_results($query, 'ARRAY_A');
        $trimmed = $this->do_pagination_trim($results);

        return $trimmed;
    }

    public function do_pagination_trim($results)
    {
        if ( count($results) >= $this->limit+1 ) {
            $this->has_more_posts = true;
            array_pop($results);
        }

        return $results;
    }

    public function do_pagination()
    {
        $output = '';

        if ( $this->has_more_posts ) {
            $output .= $this->do_next_link();
        }

        $output .= $this->do_previous_link();

        return $output;
    }

    public function format_args_for_query($args)
    {
        $query = 'AND (';

        if ( !empty($args['dates']) && !empty($args['cat_ids']) ) {

            $start = '(';

            foreach ($args['dates'] as $i=>$date) {
                $date = new \DateTime($date);

                $query .= $start;
                $query .= 'MONTH(p1.meta_value) IN (' . $date->format('m') . ')';
                $query .= 'AND YEAR(p1.meta_value) IN (' . $date->format('Y') . ')';
                $query .= ')';
                $query .= 'OR';
                $query .= '(';
                $query .= 'MONTH(p2.meta_value) IN (' . $date->format('m') . ')';
                $query .= 'AND YEAR(p2.meta_value) IN (' . $date->format('Y') . ')';
                $query .= ')';

                $start = 'OR (';
            }

            $query .= 'AND (';
            $query .= 'p3.term_taxonomy_id IN (' . implode(',', $args['cat_ids']) . ')';
            $query .= ')';
        }

        if ( !empty($args['dates']) && empty($args['cat_ids']) ) {

            $start = '(';

            foreach ($args['dates'] as $i=>$date) {
                $date = new \DateTime($date);

                $query .= $start;
                $query .= 'MONTH(p1.meta_value) IN (' . $date->format('m') . ')';
                $query .= 'AND YEAR(p1.meta_value) IN (' . $date->format('Y') . ')';
                $query .= ')';
                $query .= 'OR';
                $query .= '(';
                $query .= 'MONTH(p2.meta_value) IN (' . $date->format('m') . ')';
                $query .= 'AND YEAR(p2.meta_value) IN (' . $date->format('Y') . ')';
                $query .= ')';

                $start = 'OR (';
            }
        }

        if ( !empty($args['cat_ids']) && empty($args['dates']) ) {

            $query .= 'p3.term_taxonomy_id IN (' . implode(",", $args['cat_ids']) . ')';
        }

        $query .= ')';

        return $query;
    }
}