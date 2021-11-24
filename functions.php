<?php
//import dynamic-css
require get_parent_theme_file_path('/dynamic-css.php');
require get_parent_theme_file_path("/customizer.php");
require get_parent_theme_file_path("/customizer-default.php");
require get_parent_theme_file_path("/functions-default.php");
require get_template_directory() . '/classes/class-cardroom-walker-comment.php';


/************************************/
// theme feature
/************************************/
//Edit Post->add featured image function
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
}
add_theme_support(
    'html5',
    array(
        'comment-form',
        'comment-list'
    )
);

/************************************/
// global setting
/************************************/
//import css file (front page)
function enqueue_styles()
{
    wp_enqueue_style('cardroom_style', get_stylesheet_uri(), array());
//load responsive css
    wp_enqueue_style('cardroom-responsive', get_theme_file_uri('/assets/css/responsive.css'), array());
    wp_enqueue_style('animate', get_template_directory_uri() . '/animate.min.css');
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
 * //TODO 虽然H1-H2会自动生成ID=Heading 内容，但是经过测试，发现如果你改了标题，这个ID不会变，导致目录无法定位
 * //TODO 为了解决这个问题，将结果分成两种情况
 * @author stilesyu
 * @since cardroom 1.0.0
 * @date  2021/8/16
 */
function auto_id_headings($content)
{
    $content = preg_replace_callback('/(\<h[1-6](.*?))\>(.*)(<\/h[1-6]>)/i', function ($matches) {
        if (!stripos($matches[0], 'id=')) {
            $matches[0] = $matches[1] . $matches[2] . ' id="' . $matches[3] . '">' . $matches[3] . $matches[4];
        } else {
            $h = substr($matches[0], 0, 3);
            $matches[0] = $h . ' id="' . $matches[3] . '">' . $matches[3] . $matches[4];
        };
        return $matches[0];
    }, $content);
    return $content;
}

add_filter('the_content', 'auto_id_headings');

register_nav_menus(array(
    'main_menu' => '主菜单',
));

/**
 *  Automatically generate title
 * @author stilesyu
 * @since cardroom 1.0.0
 * @date  2021/9/25
 */
function Bing_add_theme_support_title()
{
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'Bing_add_theme_support_title');

/**
 *  替换Gravatar头像为Cravatar
 * @author stilesyu
 * @since cardroom 1.0.0
 * @date  2021/9/25
 */
if (!function_exists('get_cravatar_url')) {
    function get_cravatar_url($url)
    {
        $sources = array(
            'www.gravatar.com',
            '0.gravatar.com',
            '1.gravatar.com',
            '2.gravatar.com',
            'secure.gravatar.com',
            'cn.gravatar.com'
        );
        return str_replace($sources, 'cravatar.cn', $url);
    }

    add_filter('um_user_avatar_url_filter', 'get_cravatar_url', 1);
    add_filter('bp_gravatar_url', 'get_cravatar_url', 1);
    add_filter('get_avatar_url', 'get_cravatar_url', 1);
}

if (!function_exists('set_defaults_for_cravatar')) {
    /**
     * 替换WordPress讨论设置中的默认头像
     */
    function set_defaults_for_cravatar($avatar_defaults)
    {
        $avatar_defaults['gravatar_default'] = 'Cravatar 标志';

        return $avatar_defaults;
    }

    add_filter('avatar_defaults', 'set_defaults_for_cravatar', 1);
}


/************************************/
// comment respond
/************************************/
function comment_respond()
{
    if ((!is_admin()) && is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'comment_respond');


/**
 * 开启https访问资源
 * @author stilesyu
 * @since cardroom 1.0.0
 * @date  2021/11/19
 */
add_filter('script_loader_src', 'agnostic_script_loader_src', 20,2);

function agnostic_script_loader_src($src, $handle) {
    return preg_replace('/^(http|https):/', '', $src);
}
add_filter('style_loader_src', 'agnostic_style_loader_src', 20,2);
function agnostic_style_loader_src($src, $handle) {
    return preg_replace('/^(http|https):/', '', $src);
}

