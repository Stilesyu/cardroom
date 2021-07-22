<?php
/**
 *
 * @author Stilesyu
 * @since card room 1.0.0
 */

?>

<?php get_header() ?>

<section class="featured-single-area">
    <section class="featured-single-area-contain">
        <?php
        while (have_posts()):
            the_post();
            get_template_part('content/content', 'single');
        endwhile;
        ?>
    </section>


</section>
