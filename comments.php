<div class="comments-container">
   <div class="comment-container-center">
       <?php
       if ( have_comments() ) : ?>
           <h3 class="comments-container-title">
               <?php
               // part 3
               printf( _n( '全部评论(0)', '全部评论(%1$s)', get_comments_number(), 'comments title'),
                   get_comments_number());
               ?>
           </h3>
           <ul class="comment-container-list">
               <?php
               // part 4
               wp_list_comments( array(
                   'callback'      => 'bootstrap_comment_callback',
               ));
               ?>
           </ul>
       <?php endif; ?>
       <?php
       if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
           <p class="no-comments">
               <?php _e( '评论已关闭.' ); ?>
           </p>
       <?php endif; ?>
       <?php
       $args = array(
           'title_reply' => esc_html__( '按钮', 'ashe' ),
           'comment_field' => '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Comment', 'ashe' ) . '</label><textarea name="comment" id="comment" cols="45" rows="8"  maxlength="65525" required="required" spellcheck="false"></textarea></p>',
           'label_submit' => esc_html__( 'Post Comment', 'ashe' )
       );
       comment_form();
       ?>
   </div>
</div>


<?php
/**
 * 自定义评论格式
 * @author stilesyu
 * @since cardroom 1.0.0
 * @date  2021/10/24
 */
function bootstrap_comment_callback( $comment, $args, $depth ){
    $GLOBALS['comment'] = $comment; ?>
<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
        <div class="comment-container">
            <div class="comment-container-list-comment-info">
                <?php if ( 0 != $args['avatar_size'] ): ?>
                    <div class="comment-container-list-author-img">
                        <a href="<?php echo get_comment_author_url(); ?>"><?php echo get_avatar( $comment, $args['avatar_size'] ); ?></a>
                    </div>
                    <div class="comment-container-list-author-comment-info">
                        <?php printf( '<h4 class="comment-container-list-author-comment-info-author">%s</h4>', get_comment_author_link() ); ?>
                        <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>">
                            <time datetime="<?php comment_time( 'c' ); ?>">
                                <?php printf( _x( '%1$s', '1: date' ), get_comment_date() ); ?>
                            </time>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
            <div class="media-body">
                <?php if ( '0' == $comment->comment_approved ) : ?>
                    <p class="comment-awaiting-moderation label label-info"><?php _e( 'Your comment is awaiting moderation.' ); ?></p>
                <?php endif; ?>
                <div class="comment-content">
                    <?php comment_text(); ?>
                </div>
                <ul class="list-inline">
                    <?php edit_comment_link( __( 'Edit' ), '<li class="edit-link">', '</li>' ); ?>
                    <?php
                    comment_reply_link( array_merge( $args, array(
                        'add_below' => 'div-comment',
                        'depth'     => $depth,
                        'max_depth' => $args['max_depth'],
                        'before'    => '<li class="reply-link">',
                        'after'     => '</li>'
                    ) ) );
                    ?>
                </ul>
            </div>
        </div>
    <?php
}
?>