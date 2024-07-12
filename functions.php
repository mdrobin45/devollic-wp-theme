<?php
/**
 * Devollic functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Devollic
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function devollic_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Devollic, use a find and replace
		* to change 'devollic' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'devollic', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'devollic' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'devollic_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

   // Woocommerce Support
   add_theme_support( 'woocommerce' );

   add_image_size( 'product-details-thumb', 710, 331,true );
}
add_action( 'after_setup_theme', 'devollic_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function devollic_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'devollic_content_width', 640 );
}
add_action( 'after_setup_theme', 'devollic_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function devollic_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'devollic' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'devollic' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar 2', 'devollic' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'devollic' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'devollic_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function devollic_scripts() {
	wp_enqueue_style( 'devollic-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'devollic-style', 'rtl', 'replace' );
   wp_enqueue_style( 'bootstrap-css', get_template_directory_uri().'/assets/css/bootstrap.min.css', [], '5.3.3', 'all' );
   wp_enqueue_style( 'product-archive-css', get_template_directory_uri().'/assets/css/product-archive.css', [], '1.0.0', 'all' );
   wp_enqueue_style( 'navbar_style', get_template_directory_uri().'/assets/css/navbar.css', [], '1.0.0', 'all' );
   wp_enqueue_style( 'custom_css', get_template_directory_uri().'/assets/css/custom.css', [], '1.0.0', 'all' );
   wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap', false );

   if(is_product()){
      wp_enqueue_style( 'product-details-vendor-css', get_template_directory_uri().'/assets/css/product-details-vendor.css', [], '1.0.0', 'all' );
      wp_enqueue_style( 'product-details-css', get_template_directory_uri().'/assets/css/product-details.css', [], '1.0.0', 'all' );
      wp_enqueue_script( 'product-details-script', get_template_directory_uri() . '/assets/js/product-details.js', array(), _S_VERSION, true );
   }

   // Enqueue if user logged in and is this the account  page
   if(is_user_logged_in() && is_account_page()){
      wp_enqueue_style( 'account-page-style', get_template_directory_uri().'/assets/css/account-page.css', [], _S_VERSION, 'all' );
   }


   wp_enqueue_script( 'bootstrap-bundle', get_template_directory_uri() . '/assets/js/lib/bootstrap.bundle.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'devollic-image-hover-scroll', get_template_directory_uri() . '/assets/js/hover-image-scroll.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'devollic-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'fontawesome-kit', 'https://kit.fontawesome.com/62db3e136e.js', array(), _S_VERSION, true );
   

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'devollic_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Woocommerce functions
remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);
remove_action('woocommerce_shop_loop_header','woocommerce_product_taxonomy_archive_header',10);
remove_action('woocommerce_before_shop_loop','woocommerce_result_count',20);
remove_action('woocommerce_before_shop_loop','woocommerce_catalog_ordering',30);


// Path: inc/woocommerce/woocommerce-functions.php
if(class_exists('WooCommerce')){
   require get_template_directory().'/inc/woocommerce/woocommerce-functions.php';
}

/// ==============================
/// Custom ajax login form handler
/// ==============================
function ajax_login_init() {
   wp_register_script('ajax-login-script', get_template_directory_uri() . '/assets/js/custom-login-page.js', array('jquery') );
   wp_enqueue_script('ajax-login-script');

   // Localize ajax login
   wp_localize_script('ajax-login-script', 'ajax_login_object', array(
       'ajaxurl' => admin_url('admin-ajax.php'),
       'redirecturl' => home_url(),
       'loadingmessage' => __('Sending user info, please wait...')
   ));

   wp_register_script('ajax-register-script', get_template_directory_uri() . '/assets/js/custom-register-form.js', array('jquery') );
   wp_enqueue_script('ajax-register-script');

   // Localize ajax register
   wp_localize_script('ajax-register-script', 'ajax_register_object', array(
       'ajaxurl' => admin_url('admin-ajax.php'),
       'redirecturl' => home_url(),
       'loadingmessage' => __('Sending user info, please wait...')
   ));

   // Login action
   add_action('wp_ajax_nopriv_ajaxlogin', 'ajax_login'); 
   add_action('wp_ajax_ajaxlogin', 'ajax_login');

   // Register action
   add_action('wp_ajax_nopriv_ajaxregister', 'ajax_register'); 
   add_action('wp_ajax_ajaxregister', 'ajax_register');
}

if (!is_user_logged_in()) {
   add_action('init', 'ajax_login_init');
}

function ajax_login() {
   // First check the nonce, if it fails the function will break
   check_ajax_referer('ajax-login-nonce', 'security');

   // Nonce is checked, get the POST data and sign user on
   $info = array();
   $info['user_login'] = sanitize_text_field($_POST['log']);
   $info['user_password'] = sanitize_text_field($_POST['pwd']);
   $info['remember'] = isset($_POST['rememberme']) ? sanitize_text_field($_POST['rememberme']) : '';

   $user_signon = wp_signon($info, false);
   if (is_wp_error($user_signon)){
       echo json_encode(array('loggedin'=>false, 'message'=>__('Wrong username or password.')));
   } else {
       echo json_encode(array('loggedin'=>true, 'message'=>__('Login successful, redirecting...')));
   }

   die();
}

// register function
function ajax_register() {
   $username = sanitize_user($_POST['username']);
   $email = sanitize_email($_POST['email']);
   $password = sanitize_text_field($_POST['password']);

   if (username_exists($username)) {
        wp_send_json(array(
            'status' => 'error',
            'message' => 'Username already exists.'
        ));
    } elseif (email_exists($email)) {
        wp_send_json(array(
            'status' => 'error',
            'message' => 'Email already exists.'
        ));
    } 

   $user_id = wp_create_user($username, $password, $email);

   if (is_wp_error($user_id)){
       echo wp_send_json(array('status'=>'error', 'message'=>__('Registration failed!!')));
   }

   // Auto login
   wp_set_current_user($user_id);
   wp_set_auth_cookie($user_id);

   echo wp_send_json(array('status'=>'success', 'message'=>__('Registration Successful!!')));
   die();
}

/// ==============================
/// Redirect custom login page after log out instead of default login page
/// ==============================
add_action('wp_logout','custom_logout_redirect');
function custom_logout_redirect(){
   wp_redirect(home_url('/login'));
   exit;
}
