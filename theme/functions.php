<?php
//========================  Define ========================================================================//
define( 'DTDSH_THEME_VERSION', '1.0.9' );

/* =========================================
		ACTION HOOKS & FILTERS
   ========================================= */
/**--- Actions ---**/
add_action( 'after_setup_theme',  'theme_setup' );
add_action( 'wp_enqueue_scripts', 'theme_styles' );
add_action( 'wp_enqueue_scripts', 'theme_scripts' );
add_action( 'wp_head', 'theme_favicon' );
add_action( 'admin_head', 'theme_favicon' );
// expose php variables to js. just uncomment line
// below and see function theme_scripts_localize
// add_action( 'wp_enqueue_scripts', 'theme_scripts_localize', 20 );
/**--- Filters ---**/
/* =========================================
		HOOKED Functions
   ========================================= */
/**--- Actions ---**/
/**
 * Setup the theme
 *
 * @since 1.0
 */
if ( ! function_exists( 'theme_setup' ) ) {
	function theme_setup() {
		// Let wp know we want to use html5 for content
		add_theme_support( 'html5', array(
			'comment-list',
			'comment-form',
			'search-form',
			'gallery',
			'caption'
		) );
		// Let wp know we want to use post thumbnails
		add_theme_support( 'post-thumbnails' );
		// Over WordPress 4.1
		add_theme_support( 'title-tag' );
		
		// Add Custom Logo Support.
		/*
		add_theme_support( 'custom-logo', array(
			'width'       => 181, // Example Width Size
			'height'      => 42,  // Example Height Size
			'flex-width'  => true,
		) );
		*/
		// Register navigation menus for theme
		register_nav_menus( array(
			'primary' => 'Main Menu',
			'footer'  => 'Footer Menu',
		) );
		// Let wp know we are going to handle styling galleries
		/*
		add_filter( 'use_default_gallery_style', '__return_false' );
		*/
		// Stop WP from printing emoji service on the front
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		add_filter( 'use_default_gallery_style', '__return_false' );
		// Remove toolbar for all users in front end
		// show_admin_bar( false );
		remove_action( 'wp_head', 'feed_links_extra', 3 );
		remove_action( 'wp_head', 'rsd_link' );
		remove_action( 'wp_head', 'wlwmanifest_link' );
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );
		remove_action( 'wp_head', 'wp_generator' );
		// Add Custom Image Sizes
		/*
		add_image_size( 'ExampleImageSize', 1200, 450, true ); // Example Image Size
		...
		*/
		// WPML configuration
		// disable plugin from printing styles and js
		// we are going to handle all that ourselves.
		if ( ! is_admin() ) {
			define( 'ICL_DONT_LOAD_NAVIGATION_CSS', true );
			define( 'ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true );
			define( 'ICL_DONT_LOAD_LANGUAGES_JS', true );
		}
		// Contact Form 7 Configuration needs to be done
		// in wp-config.php. add the following snippet
		// under the line:
		// define( 'WP_DEBUG', false );
		//Contact Form 7 Plugin Configuration
		// define ( 'WPCF7_LOAD_JS',  false ); // Added to disable JS loading
		// define ( 'WPCF7_LOAD_CSS', false ); // Added to disable CSS loading
		// define ( 'WPCF7_AUTOP',    false ); // Added to disable adding <p> & <br> in form output
		// Register Autoloaders Loader
		$theme_dir = get_template_directory();
		include "$theme_dir/library/library-loader.php";
		include "$theme_dir/includes/includes-loader.php";
		include "$theme_dir/components/components-loader.php";

		new NInc_TOC;

		/**
		 * Custom Post Type
		 */
		include_once( "$theme_dir/post-type/init.php" );
		/**
		 * Short Codes
		 */
		// include_once( "$theme_dir/shortcodes/init.php" );
	}
}
/**
 * Register and/or Enqueue
 * Styles for the theme
 *
 * @since 1.0
 */
if ( ! function_exists( 'theme_styles' ) ) {
	function theme_styles() {
		$theme_dir = get_stylesheet_directory_uri();
		wp_enqueue_style( 'main', "//www.law-yamashita.com/wp-content/themes/ym-home/assets/css/main.css", array(), null, 'all' );
		wp_enqueue_style( 'theme', "$theme_dir/assets/css/theme.css", array( 'main' ), DTDSH_THEME_VERSION, 'all' );
	}
}
/**
 * Register and/or Enqueue
 * Scripts for the theme
 *
 * @since 1.0
 */
if ( ! function_exists( 'theme_scripts' ) ) {
	function theme_scripts() {
		$theme_dir = get_stylesheet_directory_uri();
		wp_deregister_script( 'jquery' );
		wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), null, true );
		wp_enqueue_script( 'main', "//www.law-yamashita.com/wp-content/themes/ym-home/assets/js/main.js", array( 'jquery' ), null, true );
	}
}
/**
 * Attach variables we want
 * to expose to our JS
 *
 * @since 3.12.0
 */
if ( ! function_exists( 'theme_scripts_localize' ) ) {
	function theme_scripts_localize() {
		$ajax_url_params = array();
		// You can remove this block if you don't use WPML
		if ( function_exists( 'wpml_object_id' ) ) {
			/** @var $sitepress SitePress */
			global $sitepress;
			$current_lang = $sitepress->get_current_language();
			wp_localize_script( 'main', 'i18n', array(
				'lang' => $current_lang
			) );
			$ajax_url_params['lang'] = $current_lang;
		}
		wp_localize_script( 'main', 'urls', array(
			'home'  => home_url(),
			'theme' => get_stylesheet_directory_uri(),
			'ajax'  => add_query_arg( $ajax_url_params, admin_url( 'admin-ajax.php' ) )
		) );
	}
}
// Add Favicon
function theme_favicon() {
	echo "<link rel=\"SHORTCUT ICON\" href=\"//www.law-yamashita.com/wp-content/themes/ym-home/assets/img/favicon.ico\">",
		"<link rel=\"apple-touch-icon\" href=\"//www.law-yamashita.com/wp-content/themes/ym-home/assets/img/favicon-144.png\">";
}

/**
 * リクエスト送信先パス
 */
function add_ajaxurl() {
	echo '<script>var ajaxurl = "', admin_url( 'admin-ajax.php' ), '";</script>';
}
add_action( 'wp_footer', 'add_ajaxurl', 1 );

/**
 * Ajaxで呼び出すPHP関数の作成
 */
function modal_ajax() {
	if( isset( $_POST['url'] ) && preg_match( "/^https?/", $_POST['url'] ) ) {
		$json = file_get_contents( $_POST['url'] );
		$arr_json = json_decode( $json, true );

		$content = $arr_json['content']['rendered'];
		$content = str_replace( 'class="accordion-item"', 'class="accordion-item is-active"', $content );
		$content = str_replace( 'class="accordion-content"', 'class="accordion-content" style="display:block"', $content );

		echo '<div class="contents">';
		echo '<h2 style="margin-top:0">', $arr_json['title']['rendered'], '</h2>';
		echo $content;
		echo '</div>';
		die();
	} else {
		echo '読み込みエラーです。';
		die();
	}
}
add_action( 'wp_ajax_modal_ajax', 'modal_ajax' );
add_action( 'wp_ajax_nopriv_modal_ajax', 'modal_ajax' );
