<?php
/**
 *
 * @author Stilesyu
 * @since card room 1.0.0
 */

?>
<?php
$classes = array(
    'single-area-template'
);
?>
<!--post content-->
<article id="post-<?php the_ID(); ?>"<?php post_class($classes) ?>>
    <div class="single-area-post">
        <div class="single-area-post-content">
            <header class="single-area-post-content-header">
                <?php if (get_the_title()): ?>
                    <h1 class="single-area-post-content-header-title"><?php the_title() ?></h1>
                <?php endif ?>
            </header>
            <div class="single-area-post-content-content">
                <?php
                the_content();
                ?>
            </div>
        </div>
        <div class="single-area-post-catalogue-container">
            <div class="single-area-post-catalogue">
                <?php get_sidebar() ?>
            </div>
        </div>
    </div>
</article>
