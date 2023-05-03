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
    'includes/shortcodes.php'
];


array_map(function ($file) {
    locate_template($file, true);
}, $includes);



// localise script for glossary ajax
function js_enqueue_scripts() {
    wp_enqueue_script ("glos-ajax-handle", get_stylesheet_directory_uri() . "/assets/js/glossary-ajax.js", array('jquery'),null, true);
    wp_localize_script('glos-ajax-handle', 'glossary_ajax_script', array('ajaxurl' =>admin_url('admin-ajax.php')));
} 
add_action("wp_enqueue_scripts", "js_enqueue_scripts");




// localise script for glossary ajax
function glossary_posts_ajax() {
	$glossary_terms=wp_list_pluck(get_terms('glossary_category'), 'slug');
	//count($glossary_terms);//
	if( isset($_POST['cat'])){
		if($_POST["cat"] != "all"){
			$cat = $_POST["cat"];
		} else {
			// all
			$cat = $glossary_terms;
		}
	} 
	$args = array(
		's' => $_POST["s"],
		'post_type' => 'ox_glossary',
		'orderby' => 'act_date',
		'order' => 'DESC',
		'tax_query' => array(
		    array (
		        'taxonomy' => 'glossary_category',
		        'field' => 'slug',
		        'terms' => $cat,
		    )
		),
	);
	$the_query = new WP_Query($args);
	$i = 0;
	if ($the_query->have_posts()): while ($the_query->have_posts()): $the_query->the_post();
			$i += 1;
			$pid = get_the_ID();
			//error_log(print_r($meta,true));
			$postTerms=wp_get_post_terms( $pid, "glossary_category" );
			?>
				<!-- Glossary Item -->
				<li class="item-wrap">
					
					<!-- Post categories -->
					<ul class="item-terms">
					<?php
						foreach($postTerms as $pstTrm){
							// var_dump($pstTrm);
							?>
							<li onclick='ajaxGetCat("<?= $pstTrm->slug ?>")'><?= $pstTrm->name ?></li>
							<?php
						}						
					?>
					</ul>

					<!-- Post title -->
					<div class="item-title">
						<h3><?php echo get_the_title();?></h3>
					</div>

					<a href="<?php echo get_the_permalink(); ?>" title="">Read more</a>
					
				</li>
			<?php
		endwhile;
	endif;
	wp_reset_query();
	exit;
}  
add_action('wp_ajax_nopriv_glos_post_ajax', 'glossary_posts_ajax');
add_action('wp_ajax_glos_post_ajax', 'glossary_posts_ajax');


if( function_exists('acf_add_options_page') ) {    
    acf_add_options_page();    
}