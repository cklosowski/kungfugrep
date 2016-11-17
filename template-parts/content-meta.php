<?php
/**
 * The template part for displaying the post meta information
 *
 * @package Paperback
 */

// Get the post tags
$post_tags = get_the_tags();

if ( class_exists( 'Easy_Digital_Downloads' ) ) {
    $download_tags = get_the_term_list( get_the_ID(), 'download_tag', '', _x(', ', '', 'paperback' ), '' );
    $download_cats = get_the_term_list( get_the_ID(), 'download_category', '', _x(', ', '', 'paperback' ), '' );
} else {
    $download_tags = '';
    $download_cats = '';
}
?>

	<?php if ( is_single() && ( has_category() || ! empty( $post_tags ) || ! empty( $download_tags ) || ! empty( $download_cats ) ) ) { ?>
		<p style="text-align: center;">
		<span class="sponsored">Sponsored by:</span>
		<?php $random = rand( 0, 1 ); ?>
		<?php if ( empty( $random ) ) : ?>
			<?php if ( ! wp_is_mobile() ) : ?>
				<a href="https://postpromoterpro.com/?ref=1" title="Post Promoter Pro"><img src="https://postpromoterpro.com/wp-content/uploads/2016/06/728x90-1.png" alt="Post Promoter Pro" /></a>
			<?php else: ?>
				<a href="https://postpromoterpro.com/?ref=1" title="Post Promoter Pro"><img src="https://postpromoterpro.com/wp-content/uploads/2016/06/234x60-white-grad.png" alt="Post Promoter Pro" /></a>
			<?php endif; ?>
		<?php else: ?>
			<a href="https://www.siteground.com/index.htm?afcode=ffb91852be1bd8209142cb63ca4ea265
"><img src="https://ua.siteground.com/img/banners/application/wordpress/468x60.gif" alt="Web Hosting" width="468" height="60" border="0"></a>
		<?php endif; ?>
		</p>

		<div class="entry-meta">
			<ul class="meta-list">

				<!-- Categories -->
				<?php if ( has_category() || ! empty( $download_cats ) ) { ?>

					<li class="meta-cat">
						<span><?php _e( 'Posted in:', 'paperback' ); ?></span>

						<?php
						// Get the EDD categories
						if ( 'download' == get_post_type() && $download_cats ) {
							echo $download_cats;
						} else {
							// Get the standard post categories
							the_category( ', ' );
						}
						?>
					</li>

				<?php } ?>

				<!-- Tags -->
				<?php if ( $post_tags || ! empty( $download_tags ) ) { ?>

					<li class="meta-tag">
						<span><?php _e( 'Tagged in:', 'paperback' ); ?></span>

						<?php
						// Get the EDD tags
						if ( 'download' == get_post_type() && $download_tags ) {
							echo $download_tags;
						} else {
							// Get the standard post tags
							the_tags( '' );
						}
						?>
					</li>

				<?php } ?>

			</ul><!-- .meta-list -->
		</div><!-- .entry-meta -->
	<?php } ?>
