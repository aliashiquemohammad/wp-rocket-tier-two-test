<?php 
/**
* Question One
* Using the appropriate WP Rocket's hook, write a code snippet to clear SuperHoster's cache after WP Rocket's cache is cleared.
*/

function clear_super_host_cache_before_wp_rocket_cache(){
    purge_superhoster_cache()
}
add_action( 'before_rocket_clean_domain', 'clear_super_host_cache_before_wp_rocket_cache', 999 );

/**
* Question Two
* Using WP Rocket's respective filter, write a code snippet or a small plugin to remove that exclusion and allow the delay of the script.
*/
function remove_exclusion_recaptcha_js_from_wp_rocket_cache( $files ) {
    $files = array_diff( $files, array( 'recaptcha/api.js' ) );
    return $files;
}
add_filter( 'rocket_lazyload_exclude', 'remove_exclusion_recaptcha_js_from_wp_rocket_cache', 999 );

/** 
* Question Three 1
*
* Which URLs are purged when that function runs?
* 
* Answer: 
*
* The URLs affected with rocket_clean_post() function include:
* - Post Permalink
* - Pagination
* - Associated Taxonomy Terms
* - Associated Author 

/** 
* Question Three 2
*
* A customer reported an issue that requires you to debug that function. How would you log the URLs that are purged when rocket_clean_post() runs?
* 
* Answer: 
*
* There are various methods for grabbing purge URLs, but I have used one of the hooks that are in the WP Rocket plugin.
*/
function debug_error_log_for_post_purge_urls( $post, $purge_urls ){
	
	error_log( 'Purged URLs: ' . implode( ', ', $purge_urls ) );
}
add_action( 'after_rocket_clean_post', 'debug_error_log_for_post_purge_urls', 999, 2 );

// Furthermore, to log these purge URLs, I have used an error_log() function so that we can directly see it in our error log file. 

