<?php
/**
 *
 * @author Stilesyu
 * @since card room 1.0.0
 */

?>

<?php
get_header();
get_template_part('/header/header', 'category');
?>

    <div class="category-list-area">
        <header class="category-list-area-title">
            <h1><?php _e('当前分类:', 'cardroom') ?>
                <span><?php single_cat_title() ?></span>
            </h1>
        </header>
        <div class="category-area-post">
            <?php
            if (have_posts()):
                while (have_posts()):
                    the_post();
                    get_template_part('content/content');
                endwhile;
            endif;
            ?>
        </div>
    </div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>