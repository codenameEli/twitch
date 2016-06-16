<?php

namespace Tower\Component;

class Repeatable_Block
{
    public $repeater_group;

    public function __construct($repeater_group)
    {
        $this->repeater_group = $repeater_group;
    }

    public function render()
    {
        $text = $this->repeater_group['repeatable_blocks_content_text'];
        $button_text = $this->repeater_group['repeatable_blocks_content_button_text'];
        $button_link = $this->repeater_group['repeatable_blocks_content_button_link'];
        ?>
        <div class="flex-block block">
            <p><?php echo $text; ?></p>
            <a href="<?php echo $button_link; ?>" class="underline-button">
                <?php echo $button_text; ?>
            </a>
        </div>
        <?php
    }
}