<?php

if ( ! function_exists( 'ox_register_post_types' ) ) {
    /**
     * Register Custom Post Types
     */
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
                'has_archive'   => false,
                'menu_icon'     => 'dashicons-text-page',
                'rewrite'       => [ 'slug' => __( 'glossary', 'ox' ), 'with_front' => false ],
                'supports'      => array( 'title', 'editor', 'thumbnail' ),
            ],

        ];

        foreach ( $post_types as $post_type => $args ) {
            register_post_type( $post_type, $args );
        }
    }

    add_action( 'init', 'ox_register_post_types' );
}

?>
