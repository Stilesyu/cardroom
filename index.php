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
    get_template_part('/header/header', 'slider');
    get_template_part('/header/header', 'category');
} ?>

<!--main content-->
<div class="posts-area">
    <div class="posts-area-content">
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
<?php
get_footer();
?>

