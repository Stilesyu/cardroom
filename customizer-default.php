<?php
/**
 *
 * @author Stilesyu
 * @since card room 1.0.0
 */

?>

<?php

function cardroom_options($control)
{
    $ashe_defaults = array(
        'general_sidebar_width' => '270',
        'general_show_up_in_the_post' => true,
        'general_slider_url_1' => '',
        'general_slider_url_2' => '',
        'general_slider_url_3' => '',
        'general_slider_url_4' => '',
        'general_image_1' => '',
        'general_image_2' => '',
        'general_image_3' => '',
        'general_image_4' => ''
    );

    // merge defaults and options
    $ashe_defaults = wp_parse_args(get_option('cardroom_options'), $ashe_defaults);

    // return control
    return $ashe_defaults[$control];
}