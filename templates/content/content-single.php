<?php
/**
 *
 * @author Stilesyu
 * @since card room 1.0.0
 */

?>
<?php
$classes = array(
    'content-single-container'
);
?>
<!--post content-->
<article id="post-<?php the_ID(); ?>"<?php post_class($classes) ?>>
    <div class="content-single-container-article">
        <!--article header-->
        <header class="content-single-container-article-content-header">
            <?php if (get_the_title()): ?>
                <h1 class="content-single-container-article-content-header-title"><?php the_title() ?></h1>
            <?php endif ?>
        </header>
        <!--article content-->
        <div class="content-single-container-article-content">
            <?php
            the_content();
            ?>
        </div>
    </div>
</article>

<?php


?>


