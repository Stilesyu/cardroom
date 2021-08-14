<?php
/**
 *
 * @author Stilesyu
 * @since card room 1.0.0
 */

?>
<?php get_header(); ?>
<div class="single-container">
        <section class="single-container-section">
            <?php
            //advertise bar
            if (cardroom_options("general_show_up_in_the_post")) {
                get_template_part('/header/header', 'slider');
            }
            //navigation bar
            get_template_part('/header/header', 'category');
            while (have_posts()):
                the_post();
                get_template_part('templates/content/content', 'single');
            endwhile;
            ?>
        </section>
        <div class="single-container-sidebar">
            <?php get_sidebar() ?>
        </div>
</div>
<?php
get_footer()
?>
