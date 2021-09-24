<div class="comments-container">
    <?php
    if ( have_comments() ) : ?>
        <h3 class="comments-container-title">
            <?php
            // part 3
            printf( _n( '全部评论(0)', '全部评论(%1$s)', get_comments_number(), 'comments title'),
                get_comments_number());
            ?>
        </h3>
        <ul class="comment-list">
            <?php
            // part 4
            wp_list_comments( array(
                'short_ping'  => true,
                'avatar_size' => 50,
            ) );
            ?>
        </ul>
    <?php endif; ?>
    <?php
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="no-comments">
            <?php _e( '评论已关闭.' ); ?>
        </p>
    <?php endif; ?>
    <?php comment_form(); ?>
</div>