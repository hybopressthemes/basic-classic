<li <?php hybrid_attr( 'comment' ); ?>>

    <header class="comment-meta">
		<cite <?php hybrid_attr( 'comment-author' ); ?>><?php comment_author_link(); ?></cite><br />
		<a <?php hybrid_attr( 'comment-permalink' ); ?>><time <?php hybrid_attr( 'comment-published' ); ?>><?php printf( __( '%1$s at %2$s', 'hybopress' ), get_comment_date(), get_comment_time() ); ?></time></a>
		<?php edit_comment_link(); ?>
    </header><!-- .comment-meta -->

<?php /* No closing </li> is needed.  WordPress will know where to add it. */ ?>
