<?php


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

//import style.css
function enqueue_styles()
{
    wp_enqueue_style('stylesheet', get_template_directory_uri() . '/style.css');
}

//import dynamic-css
require get_parent_theme_file_path('/dynamic-css.php');
require get_parent_theme_file_path("/customizer.php");
require get_parent_theme_file_path("/customizer-default.php");
require get_parent_theme_file_path("/functions-default.php");
wp_enqueue_style('cardroom_style', get_stylesheet_uri(), array(), '1.9.7');
//load responsive css
wp_enqueue_style('cardroom-responsive', get_theme_file_uri('/assets/css/responsive.css'), array(), '1.9.7');


/**
 * extract heading content(h1,h2 etc) from an HTML string using regex
 *
 * @param $content string posts content
 * @author stilesyu
 * @since cardroom 1.0.0
 * @date  2021/7/20
 */
function article_index($content)
{
    $matches = array();
    $ul_li = '';
    $rh = "|<h[^>]+>(.*)</h[^>]+>|iU";
    $h2_num = 0;
    $h3_num = 0;
    if (is_single()) {
        if (preg_match_all($rh, $content, $matches)) {
            foreach ($matches[1] as $num => $title) {
                $hx = substr($matches[0][$num], 0, 3);
                $start = stripos($content, $matches[0][$num]);
                $end = strlen($matches[0][$num]);
                if ($hx == "<h2") {
                    $h2_num += 1;
                    $h3_num = 0;
                    // 文章标题添加id，便于目录导航的点击定位
                    $content = substr_replace($content, '<h2 id="h2-' . $num . '">' . $title . '</h2>', $start, $end);
                    $title = preg_replace('/<.+?>/', "", $title); //将h2里面的a链接或者其他标签去除，留下文字
                    $ul_li .= '<li class="single-area-post-catalogue-h2"><a href="#h2-' . $num . '" class="tooltip" title="' . $title . '">' . $title . "</a><i class=\"post_nav_dot\"></i></li>\n";
                } else if ($hx == "<h3") {
                    $h3_num += 1; //记录h3的序列，此熬过请查看百度百科中的序号，如1.1、1.2中的第二位数
                    $content = substr_replace($content, '<h3 id="h3-' . $num . '">' . $title . '</h3>', $start, $end);
                    $title = preg_replace('/<.+?>/', "", $title); //将h3里面的a链接或者其他标签去除，留下文字
                    $ul_li .= '<ol class="single-area-post-catalogue-h3"><a href="#h3-' . $num . '" class="tooltip" title="' . $title . '">' . $title . "</a><i class=\"post_nav_dot\"></i></ol>\n";
                }
            }
        }
        // 将目录拼接到文章
        return "<ul class=\"single-area-post-catalogue-ul\">\n" . $ul_li . "</ul>\n";
    }
}

function hidden_if_catalogue_not_exist()
{

}


