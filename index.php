<?php
/**
 *  wordpress index page
 * @author Stilesyu
 * @since card room 1.0.0
 */
?>
<link href="style.css" rel="stylesheet" type="text/css">
<?php
get_header();

if (is_home()) {
    get_template_part('/header/featured', 'slider');
} ?>
<!--navigation area-->
<div class="featured-navigation-area">
    <?php $categories = get_categories();
    foreach ($categories as $category) {
        echo '<div class="featured-navigation-area-item"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></div>';
    } ?>
</div>
<!--main content-->
<div class="featured-posts-area">
    <div class="featured-posts-area-content">
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                get_template_part('content/content');
            endwhile;
        else :
        endif;
        ?>
    </div>
</div>