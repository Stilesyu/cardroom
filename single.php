<?php
/**
 *
 * @author Stilesyu
 * @since card room 1.0.0
 */

?>
<?php get_header(); ?>
<div class="single-container">
    <div class="single-container-header">
        <?php
        //advertise bar
        if (cardroom_options("general_show_up_in_the_post")) {
            get_template_part('/templates/header/header', 'ad');
        }
        ?>
    </div>
    <section class="single-container-center">
        <div>
            <?php
            //navigation bar
            get_template_part('/templates/header/header', 'navigation');
            while (have_posts()):
                the_post();
                get_template_part('templates/content/content', 'single');
            endwhile;
            ?>
        </div>
        <div class="single-container-center-sidebar">
            <?php get_sidebar()?>
        </div>
    </section>
</div>
<div class="single-comment-container">
<?php
    if (comments_open() || get_comments_number()) :
        comments_template();
    endif; ?>
</div>
<?php
get_footer()
?>
