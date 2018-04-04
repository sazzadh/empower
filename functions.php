<?php
/**
 * Empower Setup
===================================*/
if(!function_exists('empower_setup')){
	function empower_setup() {
		load_theme_textdomain( 'empower' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array('comment-form', 'comment-list', 'gallery', 'caption'));
		add_theme_support( 'customize-selective-refresh-widgets' );
		
		// Set the default content width.
		$GLOBALS['content_width'] = apply_filters( 'empower_content_width', 1080 );
		
		
		$register_nav_menus = array();
		$register_nav_menus['primary'] = __( 'Primary', 'empower' );
		if(apply_filters('empower_active_secondary_menu', false)){
			$register_nav_menus['secondary'] = __( 'Secondary', 'empower' );
		}
		if(apply_filters('empower_active_footer_menu', false)){
			$register_nav_menus['footer'] = __( 'Footer', 'empower' );
		}
		register_nav_menus($register_nav_menus);
		
		add_theme_support( 'custom-logo', array(
			'width'       => apply_filters( 'empower_logo_width', 200 ),
			'height'      => apply_filters( 'empower_logo_height', 50 ),
			'flex-width'  => true,
		) );
		
		
		add_image_size('empower_blog', 800, 400, true);
		
	}
}
add_action( 'after_setup_theme', 'empower_setup' );


if(!function_exists('empower_early_setup')){
	function empower_early_setup(){
		add_filter('empower_active_header_top', '__return_true');
		add_filter('empower_active_header', '__return_true');
		add_filter('empower_active_header_bottom', '__return_true');
		add_filter('empower_active_phone', '__return_true');
		add_filter('empower_active_email', '__return_true');
		add_filter('empower_active_address', '__return_true');
		add_filter('empower_active_hours', '__return_true');
		add_filter('empower_active_social_icons', '__return_true');
		add_filter('empower_active_footer', '__return_true');
		add_filter('empower_active_header_widget', '__return_true');
		//add_filter('empower_active_secondary_menu', '__return_true');
		add_filter('empower_active_footer_menu', '__return_true');
		add_filter('empower_active_contact_text', '__return_true');
	}
}
add_action( 'after_setup_theme', 'empower_early_setup', 1);




/**
 * Empower Tweak
===================================*/
// Enable shortcodes in text widgets
add_filter('widget_text','do_shortcode');




/**
 * Register sidebar
===================================*/
if(!function_exists('empower_widgets_init')){
	function empower_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Primary', 'empower' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'empower' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<strong class="widget-title">',
			'after_title'   => '</strong>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Pages Sidebar', 'empower' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'empower' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<strong class="widget-title">',
			'after_title'   => '</strong>',
		));
		if(apply_filters('empower_active_header_widget', false)){
			register_sidebar( array(
				'name'          => esc_html__( 'Header', 'empower' ),
				'id'            => 'header-1',
				'description'   => esc_html__( 'Add widgets here.', 'empower' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<strong class="widget-title">',
				'after_title'   => '</strong>',
			));
		}
		if(apply_filters('empower_active_footer', false)){
			register_sidebar( array(
				'name'          => esc_html__( 'Footer 1', 'empower' ),
				'id'            => 'footer-1',
				'description'   => esc_html__( 'Add widgets here.', 'empower' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<strong class="widget-title">',
				'after_title'   => '</strong>',
			));
			register_sidebar( array(
				'name'          => esc_html__( 'Footer 2', 'empower' ),
				'id'            => 'footer-2',
				'description'   => esc_html__( 'Add widgets here.', 'empower' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<strong class="widget-title">',
				'after_title'   => '</strong>',
			));
			register_sidebar( array(
				'name'          => esc_html__( 'Footer 3', 'empower' ),
				'id'            => 'footer-3',
				'description'   => esc_html__( 'Add widgets here.', 'empower' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<strong class="widget-title">',
				'after_title'   => '</strong>',
			));
			register_sidebar( array(
				'name'          => esc_html__( 'Footer 4', 'empower' ),
				'id'            => 'footer-4',
				'description'   => esc_html__( 'Add widgets here.', 'empower' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<strong class="widget-title">',
				'after_title'   => '</strong>',
			));
		}
	}
}
add_action( 'widgets_init', 'empower_widgets_init' );



/**
 * Enqueue scripts and styles.
==========================================================*/
if(!function_exists('empower_scripts')){
	function empower_scripts() {
	
		/*== magnific-popup ==*/
		wp_enqueue_style( 'empower-magnific-popup', get_template_directory_uri() . '/assets/magnific-popup/magnific-popup.css' );
		wp_enqueue_script( 'empower-magnific-popup', get_template_directory_uri() . '/assets/magnific-popup/jquery.magnific-popup.js', array('jquery'), '1.1.0', false );
		
		/*== flexibility ==*/
		wp_enqueue_script( 'empower-flexibility', get_template_directory_uri() . '/assets/flexibility.js', array('jquery'), '1.0', false );
		
		/*== Theme ==*/
		wp_enqueue_style( 'empower', get_stylesheet_uri() );
		wp_enqueue_script( 'empower-js', get_template_directory_uri() . '/assets/empower.js', array('jquery'), '1.0', false );
		
		/*== Comments ==*/
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}	
	}
}
add_action( 'wp_enqueue_scripts', 'empower_scripts' );




/**
 * Including other scripts
==========================================================*/
include('inc/template-tags.php');
include('inc/css-generator.php');
include('inc/customizer.php');