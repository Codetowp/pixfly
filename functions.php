<?php
/**
 * Pixfly functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Pixfly
 */

if ( ! function_exists( 'pixfly_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function pixfly_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Pixfly, use a find and replace
		 * to change 'pixfly' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'pixfly', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'pixfly' ),
		) );
		register_nav_menus( array(
			'menu-2' => esc_html__( 'Secondary', 'pixfly' ),
		) );
        register_nav_menus( array(
			'menu-3' => esc_html__( 'Footer', 'pixfly' ),
		) );
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'pixfly_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'pixfly_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pixfly_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'pixfly_content_width', 640 );
}
add_action( 'after_setup_theme', 'pixfly_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pixfly_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'pixfly' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'pixfly' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'pixfly_widgets_init' );
// Custom Theme Image Sizes
	add_image_size( 'pixfly_blog_post', 750, 422,  array( 'top', 'center' ) );
/**
 * Enqueue css styles.
 */
function pixfly_styles(){    
	wp_enqueue_style( 'pixfly-bootstrap',get_template_directory_uri() . '/assets/css/bootstrap.css');
	wp_enqueue_style( 'pixfly-font-awesome',get_template_directory_uri() . '/assets/css/font-awesome.css');
	wp_enqueue_style( 'pixfly-owl-carousel',get_template_directory_uri() . '/assets/css/owl.carousel.css');
	wp_enqueue_style( 'pixfly-owl-theme',get_template_directory_uri() . '/assets/css/owl.theme.css');
	wp_enqueue_style( 'pixfly-animate',get_template_directory_uri() . '/assets/css/animate.css');
	wp_enqueue_style( 'pixfly-lity',get_template_directory_uri() . '/assets/css/lity.css');
	wp_enqueue_style( 'pixfly-font-google-api','https://fonts.googleapis.com/css?family=Crimson+Text:400,400i,600|Montserrat:100,200,300,300i,400,500,600,700,800,900|Lato:100,300,400,700,900');
}
add_action( 'wp_enqueue_scripts', 'pixfly_styles' );

/**
 * Enqueue scripts and styles.
 */
function pixfly_scripts() {
	wp_enqueue_style( 'pixfly-style', get_stylesheet_uri() );

	wp_enqueue_script( 'pixfly-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'pixfly-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'pixfly-modernizr', get_template_directory_uri() . '/assets/js/modernizr.custom.js', array(), '20151215', false );
	wp_enqueue_script( 'pixfly-bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.js', array(), '20151215', true ); 
	wp_enqueue_script( 'pixfly-SmoothScroll-js', get_template_directory_uri() . '/assets/js/SmoothScroll.js', array(), '20151215', true );  
	wp_enqueue_script( 'pixfly-lity-js', get_template_directory_uri() . '/assets/js/lity.js', array(), '20151215', true ); 
	wp_enqueue_script( 'pixfly-owl-carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.js', array(), '20151215', true );
	wp_enqueue_script( 'pixfly-jquery-isotope-js', get_template_directory_uri() . '/assets/js/jquery.isotope.js', array(), '20151215', true );
	wp_enqueue_script( 'pixfly-main-js', get_template_directory_uri() . '/assets/js/main.js', array(), '20151215', true ); 
	wp_enqueue_script( 'pixfly-wow-min-js', get_template_directory_uri() . '/assets/js/wow.min.js', array(), '20151215', true );    
	wp_enqueue_script( 'pixfly-classie-js', get_template_directory_uri() . '/assets/js/classie.js', array(), '20151215', true );
	wp_enqueue_script( 'pixfly-imagesloaded-js', get_template_directory_uri() . '/assets/js/imagesloaded.js', array(), '20151215', true );
	wp_enqueue_script( 'pixfly-AnimOnScroll-js', get_template_directory_uri() . '/assets/js/AnimOnScroll.js', array(), '20151215', true );  
	wp_add_inline_script('pixfly-wow-min-js','new WOW().init();');
	wp_add_inline_script('pixfly-main-js','function openNav() {document.getElementById("mySidenav").style.width = "320px";
                         document.getElementById("main-block").style.marginRight = "320px";}
                         function closeNav() {document.getElementById("mySidenav").style.width = "0";
                         document.getElementById("main-block").style.marginRight= "0";}');
}
add_action( 'wp_enqueue_scripts', 'pixfly_scripts' );

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

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
