<?php
/**
 * @package Hello_World
 * @version 0.0.1
 */
/*
Plugin Name: Hello World
Plugin URI: 
Description: Let's learn plugin development
Author: Alex Moore
Version: 0.0.1
Author URI: 
*/

// Get the content we want to display. We'll just say 'hello world'
function get_hello_world() {
	return 'hello world';
}

// Echo our content to the screen.
function hello_world() {
	$hello = get_hello_world();

	$lang   = '';
	if ( 'en_' !== substr( get_user_locale(), 0, 3 ) ) {
		$lang = ' lang="en"';
	}

	printf(
		'<p id="hello-world"><span class="screen-reader-text">%s </span><span dir="ltr"%s>%s</span></p>',
		__( $hello ),
		$lang,
		$hello
	);
}

// listen for the admin_notices action, then call our hello_world function.
add_action( 'admin_notices', 'hello_world' );

// Make it look nice
function world_css() {
	echo "
	<style type='text/css'>
	#hello-world {
		float: right;
		padding: 5px 10px;
		margin: 0;
		font-size: 12px;
		line-height: 1.6666;
	}
	.rtl #hello-world {
		float: left;
	}
	.block-editor-page #hello-world {
		display: none;
	}
	@media screen and (max-width: 782px) {
		#hello-world,
		.rtl #hello-world {
			float: none;
			padding-left: 0;
			padding-right: 0;
		}
	}
	</style>
	";
}

// Listen for the admin_head action, then call our world_css function.
add_action( 'admin_head', 'world_css' );
