<?php
/**
 * Vefstofan functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Vefstofan
 */

if ( ! function_exists( 'vefstofan_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function vefstofan_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Vefstofan, use a find and replace
	 * to change 'vefstofan' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'vefstofan', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'vefstofan' ),
		'footer' => esc_html__( 'Footer Menu', 'vefstofan' ),
		'social' => esc_html__( 'Social Menu', 'vefstofan' ),
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
	add_theme_support( 'custom-background', apply_filters( 'vefstofan_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'vefstofan_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function vefstofan_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'vefstofan_content_width', 640 );
}
add_action( 'after_setup_theme', 'vefstofan_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function vefstofan_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'vefstofan' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'vefstofan' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'vefstofan_widgets_init' );

// disable content editor for particular pages templates
function wpcs_disable_content_editor() {

    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;

    if( !isset( $post_id ) ) return;

    $template_file = get_post_meta($post_id, '_wp_page_template', true);

    if ( $template_file == 'template-parts/page-card-triple.php' || $template_file == 'template-parts/page-card-double.php' || $template_file == 'page-landingpage-base.php' ) {
        remove_post_type_support( 'page', 'editor' );
    }

}
add_action( 'admin_init', 'wpcs_disable_content_editor' );

/**
 * Enqueue scripts and styles.
 */
function vefstofan_scripts() {
	//wp_enqueue_style( 'vefstofan-style', get_stylesheet_uri() );

	// wp_register_style( 'fontcustom', (get_bloginfo('template_directory') . "/_/css/fontcustom/fontcustom.css"), false, filemtime(get_template_directory() . "/_/css/fontcustom/fontcustom.css"));
	// wp_enqueue_style( 'fontcustom' );

	// wp_register_style( 'basic', (get_bloginfo('template_directory') . "/_/css/site.min.css"), false, filemtime(get_template_directory() . "/_/css/site.min.css"));
	// wp_enqueue_style( 'basic' );

	wp_enqueue_script( 'vefstofan-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'vefstofan-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'vefstofan_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * ACF fields
 */
 if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_cards-double-card-content',
		'title' => 'Cards > Double Card Content',
		'fields' => array (
			array (
				'key' => 'field_5804c2d6777d2',
				'label' => 'Column 1',
				'name' => 'double_content_1',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_5804c2f0777d3',
				'label' => 'Column 2',
				'name' => 'double_content_2',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-parts/page-card-double.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	// register_field_group(array (
	// 	'id' => 'acf_cards-global-styles',
	// 	'title' => 'Cards > Global Styles',
	// 	'fields' => array (
	// 		array (
	// 			'key' => 'field_5808d3dc27e9c',
	// 			'label' => 'Background image & color',
	// 			'name' => '',
	// 			'type' => 'tab',
	// 		),
	// 		array (
	// 			'key' => 'field_5808d3fb27e9d',
	// 			'label' => 'Background color',
	// 			'name' => 'background_color',
	// 			'type' => 'select',
	// 			'choices' => array (
	// 				'background-white' => 'White',
	// 				'background-grey' => 'Grey',
	// 				'background-black' => 'Black',
	// 			),
	// 			'default_value' => '',
	// 			'allow_null' => 0,
	// 			'multiple' => 0,
	// 		),
	// 		array (
	// 			'key' => 'field_5808d45427e9e',
	// 			'label' => 'Background image',
	// 			'name' => 'background_image',
	// 			'type' => 'image',
	// 			'save_format' => 'url',
	// 			'preview_size' => 'thumbnail',
	// 			'library' => 'all',
	// 		),
	// 		array (
	// 			'key' => 'field_5808d46827e9f',
	// 			'label' => 'Text alignment & color',
	// 			'name' => '',
	// 			'type' => 'tab',
	// 		),
	// 		array (
	// 			'key' => 'field_5808b42586fda',
	// 			'label' => 'Text color',
	// 			'name' => 'text_color',
	// 			'type' => 'select',
	// 			'choices' => array (
	// 				'text-black' => 'Black',
	// 				'text-white' => 'White',
	// 			),
	// 			'default_value' => '',
	// 			'allow_null' => 0,
	// 			'multiple' => 0,
	// 		),
	// 		array (
	// 			'key' => 'field_5808d47e27ea0',
	// 			'label' => 'Text alignment',
	// 			'name' => 'text_alignment',
	// 			'type' => 'select',
	// 			'choices' => array (
	// 				'left' => 'Left',
	// 				'center' => 'Center',
	// 				'right' => 'Right',
	// 			),
	// 			'default_value' => '',
	// 			'allow_null' => 0,
	// 			'multiple' => 0,
	// 		),
	// 		array (
	// 			'key' => 'field_580902fa52c87',
	// 			'label' => 'Card format',
	// 			'name' => '',
	// 			'type' => 'tab',
	// 		),
	// 		array (
	// 			'key' => 'field_580902eb52c86',
	// 			'label' => 'Card ratio',
	// 			'name' => 'card_format',
	// 			'type' => 'select',
	// 			'choices' => array (
	// 				'false' => 'Normal (Adjusts to content)',
	// 				'col-fixed-landscape' => 'Landscape (3:4)',
	// 				'col-fixed-hd' => 'HD (16:9)',
	// 				'col-fixed-portrait' => 'Portrait (4:3)',
	// 				'col-fixed-square' => 'Square (1:1)',
	// 			),
	// 			'default_value' => '',
	// 			'allow_null' => 0,
	// 			'multiple' => 0,
	// 		),
	// 	),
	// 	'location' => array (
	// 		array (
	// 			array (
	// 				'param' => 'page_template',
	// 				'operator' => '!=',
	// 				'value' => 'page-landingpage-base.php',
	// 				'order_no' => 0,
	// 				'group_no' => 0,
	// 			),
	// 		),
	// 	),
	// 	'options' => array (
	// 		'position' => 'acf_after_title',
	// 		'layout' => 'no_box',
	// 		'hide_on_screen' => array (
	// 		),
	// 	),
	// 	'menu_order' => 0,
	// ));
	register_field_group(array (
		'id' => 'acf_cards-triple-card-content',
		'title' => 'Cards > Triple Card Content',
		'fields' => array (
			array (
				'key' => 'field_5804c32b6087f',
				'label' => 'Column 1',
				'name' => 'triple_content_1',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_5804c33960880',
				'label' => 'Column 2',
				'name' => 'triple_content_2',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_5804c34060881',
				'label' => 'Column 3',
				'name' => 'triple_content_3',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-parts/page-card-triple.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

// SVG upload

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
