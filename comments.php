<?php
/**
 * The template file for displaying the comments and comment form for the
 * Twenty Twenty theme.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
*/
if (post_password_required()) {
    return;
}

if ($comments) {
    ?>

    <div class="comments" id="comments">

        <?php
        $comments_number = absint(get_comments_number());
        ?>

        <div class="comments-header section-inner small max-percentage">

            <h2 class="comment-reply-title">
                <?php
                if (!have_comments()) {
                    _e('当前暂无评论，快来留下评论吧！', 'cardroom');
                } else {
                    printf(
                        _nx(
                            '全部评论(%1$s)',
                            '全部评论(%1$s)',
                            $comments_number,
                            'comments title',
                            'cardroom'
                        ),
                        number_format_i18n($comments_number),
                        get_the_title()
                    );
                }

                ?>
            </h2><!-- .comments-title -->

        </div><!-- .comments-header -->

        <div class="comments-inner section-inner thin max-percentage">
            <?php
            wp_list_comments(
                array(
                    'walker' => new cardroom_Walker_Comment(),
                    'avatar_size' => 40,
                    'style' => 'div'
                )
            );
            ?>
        </div>
    </div>
    <?php
}
if (comments_open() || pings_open()) {

    if ($comments) {
        echo '<hr class="styled-separator is-style-wide" aria-hidden="true" />';
    }

    comment_form(
        array(
            'class_form' => 'section-inner thin max-percentage',
            'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
            'title_reply_after' => '</h2>',
        )
    );
} elseif (is_single()) {
    if ($comments) {
        echo '<hr class="styled-separator is-style-wide" aria-hidden="true" />';
    }
    ?>
    <div class="comment-respond" id="respond">

        <p class="comments-closed"><?php _e('Comments are closed.', 'cardroom'); ?></p>

    </div>
    <?php
}
