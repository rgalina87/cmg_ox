<?php

	add_filter( 'elementor_pro/custom_fonts/font_display', function( $current_value, $font_family, $data ) {
		return 'swap';
	}, 10, 3 );
	
	add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
	function my_theme_enqueue_styles() {
		wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.min.css' );
		wp_enqueue_style( 'child-style',
			get_stylesheet_directory_uri() . '/style.css',
			array( 'parent-style' )
		);
	}

	add_action( 'init', 'remove_parent_function');
	function remove_parent_function() {
		remove_action( 'wp_enqueue_scripts', 'hello_elementor_scripts_styles' );
	}

define('CHILD_THEME_OXSECURITY_WEBSITE_VERSION', '1.1.0');

$includes = [
    'includes/enqueue.php',
    'includes/nav-menus.php',
    'includes/post-types.php',
    // 'includes/taxonomies.php',
    // 'includes/custom-functions.php',
    // 'includes/polylang-strings.php',
    // 'includes/shortcodes.php'
];


array_map(function ($file) {
    locate_template($file, true);
}, $includes);