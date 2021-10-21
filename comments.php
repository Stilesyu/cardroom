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