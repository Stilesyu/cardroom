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

//if (is_home()) {
//    get_template_part('/header/header', 'slider');
//    get_template_part('/header/header', 'category');
//} ?>

<!--main content-->
<div class="index-container">
    <div class="index-container-center">
        <div class="index-container-center-container">
            <?php
            get_template_part('/header/header', 'slider');
            get_template_part('/header/header', 'category');
            ?>
            <div class="index-container-center-container-post">
                <?php
                if (have_posts()) :
                    while (have_posts()) :
                        the_post();
                        get_template_part('content/content');
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </div>
    <div class="index-container-right">
        <?php get_sidebar() ?>
    </div>
</div>
<?php
get_footer();
?>

