<?php
/**
 *
 * @author Stilesyu
 * @since card room 1.0.0
 */

?>

<div class="sidebar-relation-post-container">
    <div class="sidebar-relation-post-container-center">
        <header class="sidebar-relation-post-container-header">相关推荐</header>
        <ul>
            <?php
            global $post;
            $cats = wp_get_post_categories($post->ID);
            if ($cats) {
                $args = array(
                    'category__in' => array( $cats[0] ),
                    'post__not_in' => array( $post->ID ),
                    'showposts' => 6,
                    'ignore_sticky_posts' => 1
                );
                query_posts($args);

                if (have_posts()) {
                    while (have_posts()) {
                        the_post(); update_post_caches($posts); ?>
                        <li>
                            <div class="sidebar-relation-container-post">
                                <div class="sidebar-relation-container-post-left">
                                    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                                </div>
                                <div class="sidebar-relation-container-post-right">
                                    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                }
                else {
                    echo '<li>暂无相关文章</li>';
                }
                wp_reset_query();
            }
            else {
                echo '<li>暂无相关文章</li>';
            }
            ?>
        </ul>
    </div>
</div>