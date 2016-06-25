<?php
remove_filter( 'paperback_footer_text', 'paperback_filter_footer_text' );

function kfg_add_fs_footer( $text ) {
	return '<div class="center footer"><i class="fa fa-coffee"></i> <i class="fa fa-code"></i> <i class="fa fa-heart"></i> - <a href="https://filament-studios.com">Filament Studios</a></div>';
}
add_filter( 'paperback_footer_text', 'kfg_add_fs_footer', 10, 1 );

function kfg_alter_tag_title( $title ) {
	$title = str_replace( 'Tag: ', 'Chris on&hellip;', $title );
	$title = str_replace( 'Category:', 'Categorized as', $title );

	return $title;
}
add_filter( 'get_the_archive_title', 'kfg_alter_tag_title', 10, 1 );

function kfg_add_itunes_js() {
?>
<script type='text/javascript'>var _merchantSettings=_merchantSettings || [];_merchantSettings.push(['AT', '1000lcjX']);(function(){var autolink=document.createElement('script');autolink.type='text/javascript';autolink.async=true; autolink.src= ('https:' == document.location.protocol) ? 'https://autolinkmaker.itunes.apple.com/js/itunes_autolinkmaker.js' : 'http://autolinkmaker.itunes.apple.com/js/itunes_autolinkmaker.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(autolink, s);})();</script>
<?php
}
//add_action( 'wp_footer', 'kfg_add_itunes_js', 999 );

