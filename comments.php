<?php
/**
 * Comments.
 *
 * @package CycleTechSA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( post_password_required() ) {
	return;
}
?>
<section id="comments" class="entry-content" style="margin-top:64px">
	<?php if ( have_comments() ) : ?>
		<h2>
			<?php
			/* translators: %s: number of comments */
			echo esc_html( sprintf( _n( '%s comment', '%s comments', get_comments_number(), 'cycletechsa' ), number_format_i18n( get_comments_number() ) ) );
			?>
		</h2>
		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
				)
			);
			?>
		</ol>
		<?php the_comments_navigation(); ?>
	<?php endif; ?>

	<?php
	comment_form(
		array(
			'class_submit' => 'cts-btn cts-btn--primary',
		)
	);
	?>
</section>
