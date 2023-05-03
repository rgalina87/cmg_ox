<?php
function banner_glossary_func( $atts ){
    ob_start();
    get_template_part("partials/sections/section","banner-glossary");
    return ob_get_clean();
}
add_shortcode( 'banner_get_started', 'banner_glossary_func' );
?>