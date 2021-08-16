<?php
//import dynamic-css
require get_parent_theme_file_path('/dynamic-css.php');
require get_parent_theme_file_path("/customizer.php");
require get_parent_theme_file_path("/customizer-default.php");
require get_parent_theme_file_path("/functions-default.php");


/************************************/
// theme feature
/************************************/
//Edit Post->add featured image function
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
}


/************************************/
// global setting
/************************************/
//import css file (front page)
function enqueue_styles()
{
    wp_enqueue_style('stylesheet', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('cardroom_style', get_stylesheet_uri(), array(), '1.9.7');
//load responsive css
    wp_enqueue_style('cardroom-responsive', get_theme_file_uri('/assets/css/responsive.css'), array(), '1.9.7');
}

add_action('wp_enqueue_scripts', 'enqueue_styles');


$header_info = array(
    'flex-width' => true,
    'width' => 100,
    'flex-height' => true,
    'height' => 600,
    'default-image' => get_template_directory_uri() . '/images/header-default.jpg',
);
add_theme_support('custom-header', $header_info);
//删除header-image边上留边
function remove_admin_login_header()
{
    remove_action('wp_head', '_admin_bar_bump_cb');
}

add_action('get_header', 'remove_admin_login_header');


/**
 * Automatically add id to use the title
 * This function is only using for h1-h3
 *
 * @author stilesyu
 * @since cardroom 1.0.0
 * @date  2021/8/16
 */
function auto_id_headings($content)
{
    $content = preg_replace_callback('/(\<h[1-3](.*?))\>(.*)(<\/h[1-3]>)/i', function ($matches) {
        if (!stripos($matches[0], 'id=')) :
            $matches[0] = $matches[1] . $matches[2] . ' id="' . $matches[3] . '">' . $matches[3] . $matches[4];
        endif;
        return $matches[0];
    }, $content);
    return $content;
}

add_filter('the_content', 'auto_id_headings');