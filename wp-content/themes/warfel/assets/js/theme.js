jQuery(document).ready(function($) {
	$('html').removeClass('no-js');

    var executiveBioAccordion =
    {
        init: function()
        {
            this.transitionDuration = 500;
            this.addEventListeners();
        },

        closeAllBios: function()
        {
            $('.grid-loop-item-executive').removeClass('active');
        },

        viewBio: function()
        {
            var self = this;

            if ( this.anyBiosOpen() ) {
                this.closeAllBios();

                setTimeout(function() {
                    $(self.parent).addClass('active');
                }, self.transitionDuration + 200);
            } else {
                $(self.parent).addClass('active');
            }
        },

        anyBiosOpen: function()
        {
            var isOpen = false;

            $('.grid-loop-item-executive').each(function(i) {
                if ( $(this).hasClass('active') ) {
                    isOpen = true;
                }
            });

            return isOpen;
        },

        getParent: function(ev)
        {
            return ev.delegateTarget;
        },

        addEventListeners: function()
        {
            var self = this;

            $('.grid-loop-item-executive').on( 'click', '.view-bio', function(ev) {
                self.parent = self.getParent(ev);
                self.viewBio();
            });

            $('.grid-loop-item-executive').on( 'click', '.close-bio', function() {
                self.closeAllBios();
            });
        }
    };
    executiveBioAccordion.init();


// // START UberMenu Force Open Menu Items for Styling
//     var ubermenuOpenSubmenus = function() {
//
//         $( '.ubermenu' ).ubermenu( 'openSubmenu' , $( '.ubermenu-item' ) );
//         // Mobile trigger
//         $('.ubermenu-responsive-toggle').trigger('click');
//     };
//
//     window.setTimeout( ubermenuOpenSubmenus, 500 );
// // END UberMenu Force Open Menu Items for Styling


    $('.slick').slick();
});
