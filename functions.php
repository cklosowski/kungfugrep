<?php
remove_filter( 'paperback_footer_text', 'paperback_filter_footer_text' );

function kfg_add_fs_footer( $text ) {
	return '<div class="center footer"><i class="fa fa-coffee"></i> <i class="fa fa-code"></i> <i class="fa fa-heart"></i> - <a href="https://filament-studios.com">Filament Studios</a></div>';
}
add_filter( 'paperback_footer_text', 'kfg_add_fs_footer', 10, 1 );

function kfg_enqueue_scripts() {
	wp_register_script( 'share-counts', get_stylesheet_directory_uri() . '/scripts/share-counts.js' );
	wp_enqueue_script( 'share-counts' );
}
add_action( 'wp_enqueue_scripts', 'kfg_enqueue_scripts' );

function kfg_alter_tag_title( $title ) {
	$title = str_replace( 'Tag: ', 'Chris on&hellip;', $title );
	$title = str_replace( 'Category:', 'Categorized as', $title );

	return $title;
}
add_filter( 'get_the_archive_title', 'kfg_alter_tag_title', 10, 1 );

function kfg_additional_js() {
	if ( ! wp_is_mobile() &&  is_single() ) :
?>
<style>
.kfg-subscribe {
  position: fixed;
  bottom: -35px;
  width: auto;
  height: 35px;
  left: 15%;
  color: #fff;
  background-color: #1796c6;
  padding: 3px 10px 0 10px;
  z-index: 9999;
}
.kfg-subscribe a {
  text-decoration: none;
  color: #fff;
}
</style>
<a href="#" id="subscribe-tip">
<div class="kfg-subscribe">
Psst&hellip;Got a second <i class="fa fa-question-circle" aria-hidden="true"></i>
</div>
</a>
<script>
jQuery(document).ready(function ($) {
var trigger_pos   = 350;
var scroll_target = $('.kfg-subscribe');
var limit         = $('.nav-post').offset().top;

$('#subscribe-tip').click( function() {
        $('html, body').animate({
          scrollTop: $('.footer-widgets').offset().top
        }, 750);

	return false;
});

$(window).on('scroll', function() {
    var y_scroll_pos = window.pageYOffset;
    
    if(y_scroll_pos >= trigger_pos && y_scroll_pos <= limit) {
        scroll_target.animate({
            bottom: -1,
         }, 50);

	scroll_target.addClass('kfg-has-displayed');
    } else {
	if ( scroll_target.hasClass('kfg-has-displayed') ) {
            scroll_target.animate({
                bottom: -35,
            }, 50);
        }
    }
});
});
</script>
<?php
	endif;
}
add_action( 'wp_footer', 'kfg_additional_js', 999 );

add_filter( 'edd_start_session', '__return_false' );
remove_filter('pre_user_description', 'wp_filter_kses');

/**
 * Author post widget
 *
 * @since 1.0
 */
function paperback_author_box() {
        global $post, $current_user;
        $author = get_userdata( $post->post_author );
        ?>
        <div class="author-profile">
                <span class="author-profile-avatar">
		<?php echo get_avatar( get_the_author_meta( 'user_email' ), 75 ); ?>
		</span>

                <div class="author-profile-info">
                        <h3 class="author-profile-title">
                                <?php esc_html_e( 'Posted by', 'paperback' ); ?>
                                <?php echo esc_html( get_the_author() ); ?></h3>

                        <?php if ( empty( $author->description ) && $post->post_author == $current_user->ID ) { ?>
                                <div class="author-description">
                                        <p>
                                        <?php
                                                $profileString = sprintf( wp_kses( __( 'Complete your author profile info to be shown here. <a href="%1$s">Edit your profile &rarr;</a>', 'paperback' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'profile.php' ) ) );
                                                echo $profileString;
                                        ?>
                                        </p>
                                </div>
                        <?php } else if ( $author->description ) { ?>
                                <div class="author-description">
                                        <p><?php the_author_meta( 'description' ); ?></p>
                                </div>
                        <?php } ?>

                        <div class="author-profile-links">
                                <?php if ( $author->user_url ) { ?>
                                        <?php printf( '<a href="%s"><i class="fa fa-external-link-square"></i> %s</a>', $author->user_url, __( 'Website', 'paperback' ) ); ?>
                                <?php } ?>
                        </div>
                </div><!-- .author-drawer-text -->
        </div><!-- .author-profile -->

<?php
}

function kfg_the_content( $content ) {

	if ( ! is_single() ) {
		return $content;
	}

	return '<p style="text-align: center;"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Kung fu Grep Top post -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6027744636789441"
     data-ad-slot="4894849757"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></p>' . $content;

}
add_filter( 'the_content', 'kfg_the_content', 10, 1 );
