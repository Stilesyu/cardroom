<?php
/* ------------------------------------------------------------------------- *
 *  The template used to display articles on your main page.
/* ------------------------------------------------------------------------- */

// Custom Post Classes
$classes = array(
    'featured-posts-area-article'
);

$classes = join(' ', $classes);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
    <!--show post thumbnail-->
    <figure class="featured-posts-area-post-thumbnail<?php if (!has_post_thumbnail()) echo ' no-thumbnail'; ?>">
        <?php
        if (is_sticky()) :
            echo '<span class="sticky-badge">' . __('Sticky Post', 'justwrite') . '</span>';
        endif;
        if (has_post_thumbnail()) :
            the_post_thumbnail('ac-post-thumbnail');
        else :
            echo '<img src="' . get_template_directory_uri() . '/images/no-thumbnail.png" alt="' . __('No Thumbnail', 'justwrite') . '" />';
        endif;
        do_action('ac_action_content_thumbnail_after'); // After thumbnail action
        ?>
    </figure>
    <div class="featured-posts-area-post-content">
        <?php the_title('<h2 class="featured-posts-area-post-content-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
        <?php the_excerpt(); ?>
        <footer class="featured-posts-area-post-footer">
            <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('M d, Y'); ?></time>
            <?php if( ! is_category() ) { ?><span class="featured-posts-area-post-content-category"><em style="font-style: normal"><?php _e( 'Category:', 'cardroom' ); ?></em> <?php output_first_category(); ?></span><?php } ?>
        </footer>
    </div>
</article>