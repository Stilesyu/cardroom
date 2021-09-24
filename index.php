<?php
/**
 *  wordpress index page
 * @author Stilesyu
 * @since card room 1.0.0
 */
?>
<?php
get_header();
?>
<!--main content-->
<div class="index-container">
    <div class="index-container-center">
            <?php
            get_template_part('/templates/header/header', 'ad');
            get_template_part('/templates/header/header', 'navigation');
            ?>
            <div class="index-container-center-container-post">
                <?php
                if (have_posts()) :
                    while (have_posts()) :
                        the_post();
                        get_template_part('templates/content/content');
                    endwhile;
                endif;
                ?>
            </div>
    </div>
    <div class="index-container-right">
        <?php get_sidebar() ?>
    </div>
</div>
<?php
get_footer();
?>

