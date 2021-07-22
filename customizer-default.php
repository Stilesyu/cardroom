<?php
/**
 *
 * @author Stilesyu
 * @since card room 1.0.0
 */

?>

<?php

function cardroom_options($control){
    $ashe_defaults = array(
        'general_sidebar_width' => '270',
        'general_show_up_in_the_post'=>true
    );

    // merge defaults and options
    $ashe_defaults = wp_parse_args( get_option('cardroom_options'), $ashe_defaults );

    // return control
    return $ashe_defaults[ $control ];
}