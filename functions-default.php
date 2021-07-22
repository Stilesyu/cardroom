<?php
/**
 *
 * @author Stilesyu
 * @since card room 1.0.0
 */

?>

<?php
/*  Output first category
/* ------------------------------------ */
/**
 * output first category name
 *
 * @author stilesyu
 * @since cardroom 1.0.0
 * @date  2021/7/13
 */
function output_first_category()
{
    global $post;
    $output_category = '';

    $gpt = get_post_type(get_the_ID());
    $category = get_the_category();
    if ($category) {
        //TODO 以后来写分类
        $output_category =
            '<a href="' . get_category_link($category[0]->term_id) . '" ' . 'title="' . sprintf(__("View all posts in %s", "justwrite"), $category[0]->name) . '" ' . '>' . $category[0]->name . '</a> ';
    }
    if ($gpt != 'page' && !empty($category)) {
        echo $output_category;
    }

}