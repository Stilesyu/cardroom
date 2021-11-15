<?php

if (!class_exists('cardroom_Walker_Comment')) {

    /**
     *  评论功能样式自定义
     *
     * @author stilesyu
     * @since cardroom 1.0.0
     * @date  2021/11/7
     */
    class cardroom_Walker_Comment extends Walker_Comment
    {
        protected function html5_comment($comment, $depth, $args)
        {
            $tag = ('div' === $args['style']) ? 'div' : 'li';
            ?>
            <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class($this->has_children ? 'parent' : '', $comment); ?>>
            <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
                <footer class="comment-meta">
                    <div class="comment-author vcard">
                        <?php
                        $comment_author = get_comment_author($comment);
                        $avatar = get_avatar($comment, $args['avatar_size']);
                        //评论者头像
                        if (0 !== $args['avatar_size']) {
                            echo wp_kses_post($avatar);
                        }
                        //评论者姓名
                        printf(
                            '<span class="comment-author-info">%1$s</span',
                            esc_html($comment_author)
                        );
                        $by_post_author = is_comment_by_post_author($comment);
                        if ($by_post_author) {
                            echo '</div>' . __('(作者)', 'cardroom');
                        }
                        //评论日期
                        $comment_timestamp = sprintf(__('%1$s', 'cardroom'), get_comment_date('', $comment));
                        printf(
                            '<a"><time datetime="%s" title="%s" class="comment-date">%s</time></a>',
                            esc_url(get_comment_link($comment, $args)),
                            get_comment_time('c'),
                            esc_attr($comment_timestamp)
                        );
                        ?>
                    </div>
                </footer>

                <div class="comment-content entry-content">
                    <?php
                    comment_text();
                    if ('0' === $comment->comment_approved) {
                        ?>
                        <p class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'cardroom'); ?></p>
                        <?php
                    }
                    ?>
                </div>
                <?php
                $comment_reply_link = get_comment_reply_link(
                    array_merge(
                        $args,
                        array(
                            'add_below' => 'div-comment',
                            'depth' => $depth,
                            'max_depth' => $args['max_depth']
                        )
                    )
                );
                if ($comment_reply_link) {
                    ?>
                    <footer class="comment-footer-meta">
                        <?php
                        echo $comment_reply_link;
                        if (get_edit_comment_link()) {
                            printf(
                                ' <a class="comment-edit-link" href="%s">%s</a>',
                                esc_url(get_edit_comment_link()),
                                __('编辑', 'cardroom')
                            );
                        }
                        ?>
                    </footer>
                    <?php
                }
                ?>
            </article>

            <?php
        }
    }
}
function is_comment_by_post_author($comment = null)
{

    if (is_object($comment) && $comment->user_id > 0) {

        $user = get_userdata($comment->user_id);
        $post = get_post($comment->comment_post_ID);

        if (!empty($user) && !empty($post)) {

            return $comment->user_id === $post->post_author;
        }
    }
    return false;

}