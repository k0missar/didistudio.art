<?php
/**
 * didistudio.art functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package didistudio.art
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
function didistudio_art_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on didistudio.art, use a find and replace
		* to change 'didistudio-art' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'didistudio-art', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'didistudio-art' ),
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
			'didistudio_art_custom_background_args',
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
}
add_action( 'after_setup_theme', 'didistudio_art_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function didistudio_art_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'didistudio_art_content_width', 640 );
}
add_action( 'after_setup_theme', 'didistudio_art_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function didistudio_art_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'didistudio-art' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'didistudio-art' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'didistudio_art_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function didistudio_art_scripts() {
	wp_enqueue_style( 'didistudio-art-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'swiper-css', get_template_directory_uri() . '/vendor/css/swiper-bundle.min.css', array(), _S_VERSION );

    wp_enqueue_style( 'didistudio-art-main-style', get_template_directory_uri() . '/assets/css/style.css', array(), _S_VERSION );
    // COMPONENT
    wp_register_style('didistudio-art-component-home-image', get_template_directory_uri() . '/assets/css/components/home-image.css', array(), '1.0', 'all');
    wp_register_style('didistudio-art-component-about-me', get_template_directory_uri() . '/assets/css/components/about-me.css', array(), '1.0', 'all');
    wp_register_style('didistudio-art-component-home-card-portfolio', get_template_directory_uri() . '/assets/css/components/home.card-portfolio.css', array(), '1.0', 'all');
    // BLOCK
    wp_register_style('didistudio-art-component-slider-portfolio', get_template_directory_uri() . '/assets/css/block/slider-portfolio.css', array(), '1.0', 'all');
    wp_register_style('didistudio-art-block-services', get_template_directory_uri() . '/assets/css/block/services.css', array(), '1.0', 'all');
    // LAYOUT
    wp_register_style('didistudio-art-page-home', get_template_directory_uri() . '/assets/css/page/home.css', array(), '1.0', 'all');

	wp_enqueue_script( 'didistudio-art-js', get_template_directory_uri() . '/assets/js/script.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'swiper-js', get_template_directory_uri() . '/vendor/js/swiper-bundle.min.js', array(), _S_VERSION, true );

	wp_register_script( 'js-slider-portfolio', get_template_directory_uri() . '/assets/js/portfolio-slider.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'didistudio_art_scripts' );

/*
 * Страница настроек
 */
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' 	=> 'Основные настройки',
        'menu_title'	=> 'Настройки темы',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Настройки шапки',
        'menu_title'	=> 'Шапка',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Настройки подвала',
        'menu_title'	=> 'Подвал',
        'parent_slug'	=> 'theme-general-settings',
    ));

}

/*
 * Регистрируем пользовательский тип записи Портфолио
 */
add_action('init', function () {
    $labels = [
        'name' => 'Портфолио',
        'menu_name' => 'Портфолио',
        'singular_name' => 'Портфолио',
        'add_new' => 'Добавить работу',
        'add_new_item' => 'Добавить новую работу',
        'edit_item' => 'Редактировать работу',
        'new_item' => 'Новая работа',
        'all_items' => 'Все работы',
        'view_item' => 'Посмотреть работу',
        'search_items' => 'Найти работу',
        'not_found' =>  'Ничего не найдено',
        'not_found_in_trash' => 'В корзине не найдено'
    ];
    $args = [
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => [
            'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields'
        ],
        'taxonomies' => ['genre'],
    ];
    register_post_type('portfolio', $args);
});

/*
 * Регистрируем иерархическую таксономию по портфолио
 */
add_action('init', function () {
    $labels = array(
        'name'          => 'Раздел',
        'singular_name' => 'Раздел',
        'menu_name'     => 'Раздел' ,
        'all_items'     => 'Все разделы',
        'edit_item'     => 'Редактировать раздел',
        'view_item'     => 'Посмотреть раздел',
        'update_item'   => 'Сохранить раздел',
        'add_new_item'  => 'Добавить новый раздел',
        'parent_item'   => 'Родительский раздел',
        'search_items'  => 'Поиск по разделам',
        'back_to_items' => 'Назад на страницу разделов',
        'most_used'     => 'Популярные разделы',
    );
    $args = array(
        'labels'            => $labels,
        'show_admin_column' => true,
        'hierarchical'      => true,
    );
    register_taxonomy('section', ['portfolio'], $args);
});



// ФУНКЦИЯ ДЛЯ DEV СЕРВЕРА РАЗРАБОТКИ
function change_domain_in_assets($src) {
    // Проверяем, если домен — это dev-окружение (wsl)
    if (strpos($_SERVER['HTTP_HOST'], 'wsl') !== false) {
        // Заменяем только первое вхождение 'didistudio.art' на 'didistudio.wsl'
        $src = preg_replace('/didistudio\.art/', 'didistudio.wsl', $src, 1);
    }
    return $src;
}

add_filter('style_loader_src', 'change_domain_in_assets');
add_filter('script_loader_src', 'change_domain_in_assets');
