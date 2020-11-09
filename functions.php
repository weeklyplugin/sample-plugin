<?php 
/***
 * 
 *  Author : Vasim Shaikh
 *  Purpose : Include a expend functionality of website
 *   
 * */ 

/**
 * Essential theme supports
 * */
function theme_setup(){
    /** automatic feed link*/
    add_theme_support( 'automatic-feed-links' );
 
    add_theme_support( 'menus' );

    /** tag-title **/
    add_theme_support( 'title-tag' );
 
    /** post formats */
    $post_formats = array('aside','image','gallery','video','audio','link','quote','status');
    add_theme_support( 'post-formats', $post_formats);
 
    /** post thumbnail **/
    add_theme_support( 'post-thumbnails' );
 
    /** HTML5 support **/
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
 
    /** refresh widgest **/
    add_theme_support( 'customize-selective-refresh-widgets' );
 
    /** custom background **/
    $bg_defaults = array(
        'default-image'          => '',
        'default-preset'         => 'default',
        'default-size'           => 'cover',
        'default-repeat'         => 'no-repeat',
        'default-attachment'     => 'scroll',
    );
    add_theme_support( 'custom-background', $bg_defaults );
 
    /** custom header **/
    $header_defaults = array(
        'default-image'          => '',
        'width'                  => 300,
        'height'                 => 60,
        'flex-height'            => true,
        'flex-width'             => true,
        'default-text-color'     => '',
        'header-text'            => true,
        'uploads'                => true,
    );
    add_theme_support( 'custom-header', $header_defaults );
 
    /** custom log **/
    add_theme_support( 'custom-logo', array(
        'height'      => 60,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ) );
 
 
 
}
add_action('after_setup_theme','theme_setup');


function list_custom_sidebar() {
    register_sidebar(
        array (
            'name' => __( 'Custom', 'your-theme-domain' ),
            'id' => 'custom-side-bar',
            'description' => __( 'Custom Sidebar', 'your-theme-domain' ),
            'before_widget' => '<div class="widget-content">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'list_custom_sidebar' );





 /*
 * Remove unwanted crap from the head section
 */

// remove junk from head
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);





/**
 *  Add Google Analytics to the footer
 */
 
function add_google_analytics() {
	echo '<script src="http://www.google-analytics.com/ga.js" type="text/javascript"></script>';
	echo '<script type="text/javascript">';
	echo 'var pageTracker = _gat._getTracker("UA-XXXXX-X");';
	echo 'pageTracker._trackPageview();';
	echo '</script>';
}
//add_action('wp_footer', 'add_google_analytics');


/**
 *  Add a favicon to your blog 
 */

function blog_favicon() {
	echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_bloginfo('wpurl').'/favicon.ico" />';
}
add_action('wp_head', 'blog_favicon');


if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'homepage-thumb' );
    set_post_thumbnail_size( 420, 110 ); // default Post Thumbnail dimensions   
}

if ( function_exists( 'add_image_size' ) ) { 
    add_image_size( 'homepage-thumb',392, 200, true ); //(cropped)
}

/***
 * 
 *  Add Gutenberg & Support Featured Images
 */

function gutenberg_setup() {
    // Support Featured Images
    add_theme_support( 'post-thumbnails');
    
    //Gutenberg
    add_theme_support( 'align-wide');
    add_theme_support('editor-styles');
    add_theme_support('wp-block-styles');
    add_theme_support( 'dark-editor-style');
    add_theme_support( 'responsive-embeds');
    }
add_action( 'after_setup_theme', 'gutenberg_setup');


/**Vasim Shaikh*/

function wp_theme_enqueue() {
    
   
   
    wp_enqueue_style( 'gsp-menu',  get_template_directory_uri() . '/css/menu-style.css','1.0.5' );
    wp_enqueue_style( 'gsp-bootstrap',  get_template_directory_uri() . '/css/bootstrap.min.css','1.0.5' );
    wp_enqueue_style( 'gsp-style', get_stylesheet_uri(),'1.0.5' );
  //  wp_enqueue_script( 'bootstrap-popper-script', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js', array('jquery'),'1.0.5',true );
    
    wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'),'1.0.5',true ); 
  
    wp_enqueue_script( 'gsp-script', get_template_directory_uri() . '/js/script.js', array('jquery','gsp-AOS-Script'),time(),true );

    
    
}
add_action( 'wp_enqueue_scripts', 'wp_theme_enqueue' );

function parentWebsiteURL(){

    return 'https://example.com/';
}

function 
AssetURL(){
    return get_template_directory_uri().'/img';
}


/*ACF options*/

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}


/**
 * Search SQL filter for matching against post title only.
 *
 * @link    http://wordpress.stackexchange.com/a/11826/1685
 *
 * @param   string      $search
 * @param   WP_Query    $wp_query
 */
function wpse_11826_search_by_title( $search, $wp_query ) {
    if ( ! empty( $search ) && ! empty( $wp_query->query_vars['search_terms'] ) ) {
        global $wpdb;

        $q = $wp_query->query_vars;
        $n = ! empty( $q['exact'] ) ? '' : '%';

        $search = array();

        foreach ( ( array ) $q['search_terms'] as $term )
            $search[] = $wpdb->prepare( "$wpdb->posts.post_title LIKE %s", $n . $wpdb->esc_like( $term ) . $n );

        if ( ! is_user_logged_in() )
            $search[] = "$wpdb->posts.post_password = ''";

        $search = ' AND ' . implode( ' AND ', $search );
    }

    return $search;
}

add_filter( 'posts_search', 'wpse_11826_search_by_title', 10, 2 );
