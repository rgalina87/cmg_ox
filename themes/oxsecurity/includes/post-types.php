<?php


/**
 * Register Custom Taxonomies
 */
function ox_register_custom_taxonomies(){
    // Add new taxonomy, make it hierarchical (like categories)
     $labels = array(
         'name'              => _x( 'Categories', 'taxonomy general name', 'ox' ),
         'singular_name'     => _x( 'category', 'taxonomy singular name', 'ox' ),
         'search_items'      => __( 'Search Glossary categories', 'ox' ),
         'all_items'         => __( 'All Glossary categories', 'ox' ),
         'edit_item'         => __( 'Edit Review Source', 'ox' ),
         'update_item'       => __( 'Update Review Source', 'ox' ),
         'add_new_item'      => __( 'Add New Source', 'ox' ),
         'not_found'         => __( 'No Glossary categories Found!', 'ox' ),
     );
     $args = array(
         'hierarchical'      => true, // Like Category Taxonomy. False is like Tag taxonomy.
         'labels'            => $labels,
         'show_ui'           => true,
         'show_admin_column' => true,
         'show_in_rest'      => true,
         'has_archive'       => true,
         'rewrite'           => array('slug' => 'glossary-cat')
     );
     register_taxonomy( 'glossary_category', array( 'ox_glossary' ), $args ); 
 }
 add_action('init', 'ox_register_custom_taxonomies');


/**
 * Register Custom Post Types
 */
if ( ! function_exists( 'ox_register_post_types' ) ) {
    function ox_register_post_types() {

        $post_types = [

            'ox_lp' => [
                'label'         => __( 'Landing Page', 'ox' ),
                'labels'        => [
                    'name'          => __( 'Landing Pages', 'ox' ),
                    'singular_name' => __( 'Landing Page', 'ox' ),
                ],
                'public'        => true,
                'menu_position' => 42,
                'has_archive'   => false,
                'menu_icon'     => 'dashicons-megaphone',
                'rewrite'       => [ 'slug' => __( 'lp', 'ox' ), 'with_front' => false ],
                'supports'      => [ 'title', 'editor', 'thumbnail' ],
            ],

            'ox_glossary' => [
                'label'         => __( 'Glossary', 'ox' ),
                'labels'        => [
                    'name'          => __( 'Glossary', 'ox' ),
                    'singular_name' => __( 'Glossary', 'ox' ),
                ],
                'public'        => true,
                'menu_position' => 42,
                'has_archive'   => true,
                'menu_icon'     => 'dashicons-text-page',
                'rewrite'       => array( 'slug' => 'glossary', 'with_front' => false ),
                'supports'      => array( 'title', 'editor', 'thumbnail' ),

                'taxonomies'    => array( 'glossary_category' ),
            ],

        ];

        foreach ( $post_types as $post_type => $args ) {
            register_post_type( $post_type, $args );
        }
    }

    add_action( 'init', 'ox_register_post_types' );
}
?>
