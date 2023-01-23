<?php 
/**
* Question One
* Using the appropriate WP Rocket's hook, write a code snippet to clear SuperHoster's cache after WP Rocket's cache is cleared.
*/

function clear_super_host_cache_before_wp_rocket_cache(){
    purge_superhoster_cache()
}
add_filter( 'before_rocket_clean_domain', 'clear_super_host_cache_before_wp_rocket_cache', 999 );

/**
* Question Two
* Using WP Rocket's respective filter, write a code snippet or a small plugin to remove that exclusion and allow the delay of the script.
*/
function remove_exclusion_recaptcha_js_from_wp_rocket_cache( $files ) {
    $files = array_diff( $files, array( 'recaptcha/api.js' ) );
    return $files;
}
add_filter( 'rocket_lazyload_exclude', 'remove_exclusion_recaptcha_js_from_wp_rocket_cache', 999 );

