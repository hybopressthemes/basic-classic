<li <?php hybrid_attr( 'comment' ); ?>>

    <article>
        <header class="comment-info clearfix">
        	<span class="sr-only">
				<?php echo get_avatar( $comment, 40 ); ?>
        	</span>
			<cite <?php hybrid_attr( 'comment-author' ); ?>><?php comment_author_link(); ?></cite>
			<a <?php hybrid_attr( 'comment-permalink' ); ?>><time <?php hybrid_attr( 'comment-published' ); ?>><?php printf( __( '%1$s at %2$s', 'hybopress' ), get_comment_date(), get_comment_time() ); ?></time></a>

			<?php edit_comment_link( __( 'Edit This', 'hybopress' ), '(', ')' ); ?>
        </header><!-- .comment-meta -->

		<div <?php hybrid_attr( 'comment-content' ); ?>>
			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'hybopress' ); ?></em>
				</p>
			<?php endif; ?>
			<?php comment_text(); ?>
			<div class="reply">
				<?php hybrid_comment_reply_link(); ?>
			</div>

        </div><!-- .comment-content -->
    </article>

<?php /* No closing </li> is needed.  WordPress will know where to add it. */ ?>
