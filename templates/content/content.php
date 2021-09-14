<?php
/* ------------------------------------------------------------------------- *
 *  The template used to display articles on your main page.
/* ------------------------------------------------------------------------- */

// Custom Post Classes
$classes = array(
    'content-container-article'
);

$classes = join(' ', $classes);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
    <!--show post thumbnail-->
    <figure class="content-container-article-thumbnail<?php if (!has_post_thumbnail()) echo ' no-thumbnail'; ?>">
        <?php
        if (is_sticky()) :
            echo '<span' . __('Sticky Post', 'card_room') . '</span>';
        endif;
        if (has_post_thumbnail()) :
            echo '<a href="' . get_permalink() . '">';
            the_post_thumbnail('thumbnail');
            echo '</a>';
        else :
            echo '<a href="' . esc_url(get_permalink()) . '"><img src="' . get_template_directory_uri() . '/images/no-thumbnail.png" alt="' . __('未找到照片', 'cardroom') . '" /></a>';
        endif;
        do_action('ac_action_content_thumbnail_after'); // After thumbnail action
        ?>
    </figure>
    <div class="content-container-article-content">
        <?php the_title('<h2 class="content-container-article-content-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
        <?php
        //Extract the first paragraph of the article.If the number of words in the content is greater than 50, then 50 characters will be intercepted
        $excerpt = get_the_excerpt();
        $excerpt = wp_trim_words($excerpt, 100, "...");
        if (isset($excerpt[50])) {
            $excerpt = mb_substr($excerpt, 0, 50, "utf-8") . '...';
        }
        echo $excerpt;
        ?>
        <footer class="content-container-article-footer">
            <div>
                <!--author-->
                <a><?php echo get_the_author() ?></a>
                <!--date-->
                <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('M d, Y'); ?></time>
            </div>
            <?php if (!is_category()) { ?><span><em
                    style="font-style: normal"><?php _e('Category:', 'cardroom'); ?></em> <?php output_first_category(); ?>
                </span><?php } ?>
        </footer>
    </div>
</article>
