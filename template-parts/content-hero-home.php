<?php
/**
 * The template displays the hero header
 *
 * @package Paperback
 */
?>

<div class="hero-wrapper homepage-hero">

	<div class="hero-posts">
		<?php $image_class = has_post_thumbnail() ? 'with-featured-image hero-post' : 'without-featured-image hero-post'; ?>

			<div id="post-<?php the_ID(); ?>" class="without-featured-image hero-post">

				<!-- Get the hero background image -->
				<?php
				// Get header opacity from Appearance > Customize > Header & Footer Image
				$header_opacity = get_theme_mod( 'paperback_hero_opacity', '0.5' ); ?>

					<div class="site-header-bg-wrap">
						<div class="header-opacity">
							<div class="header-gradient"></div>
							<div class="site-header-bg background-effect" style="background-color: #3a0d3f; opacity: <?php echo esc_attr( $header_opacity ); ?>;"></div>
						</div>
					</div><!-- .site-header-bg-wrap -->


				<div class="container hero-container">
					<!-- Hero title -->
					<div class="hero-text">
						<h2>Get Started</h2>
						My name is Chris Klosowski, and I focus on WordPress development. I'm here to help you level up your game on&hellip;
						<br /><br />
						<a href="/tag/wordpress/"><button><i class="fa fa-wordpress" aria-hidden="true"></i> WordPress</button></a>
						<a href="/tag/easy-digital-downloads/"><button><i class="fa fa-shopping-cart" aria-hidden="true"></i> eCommerce</i></button></a>
						<a href="/tag/software-development/"><button><i class="fa fa-code" aria-hidden="true"></i> Development</i></button></a>
						<?php //the_excerpt(); ?>
					</div><!-- .photo-overlay -->
				</div><!-- .container -->
			</div>

	</div><!-- .hero-posts -->

</div><!-- .hero-wrapper -->
