<?php
/**
 *
 * @author Stilesyu
 * @since card room 1.0.0
 */

?>
<?php get_header();

?>
<?php
if (cardroom_options("general_show_up_in_the_post")){
    get_template_part('/header/header', 'slider');
}
get_template_part('/header/header', 'category');?>
<section class="single-area">
    <section class="single-area-contain">
        <?php
        while (have_posts()):
            the_post();
            get_template_part('templates/content/content', 'single');
        endwhile;
        ?>
    </section>
</section>
<?php
get_footer()
?>
