<?php
/**
 * didistudio.art functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package didistudio.art
 */
require_once get_template_directory() . '/classes/PrimaryMenu.php';
require_once get_template_directory() . '/classes/PortfolioMenu.php';
require_once get_template_directory() . '/classes/FooterMenu.php';
require_once get_template_directory() . '/inc/constants.php';

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
			'primary' => 'Топ меню',
            'portfolio-menu' => 'Меню для портфолио',
            'footer-menu' => 'Меню в подвале',
		)
	);

    require_once 'inc/primary-menu.php';

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
    wp_register_style('didistudio-art-component-archive-card-portfolio', get_template_directory_uri() . '/assets/css/components/archive.card-portfolio.css', array(), '1.0', 'all');
    wp_register_style('didistudio-art-component-article-portfolio', get_template_directory_uri() . '/assets/css/components/article-portfolio.css', array(), '1.0', 'all');
    wp_register_style('didistudio-art-component-card-logotype', get_template_directory_uri() . '/assets/css/components/card-logotype.css', array(), '1.0', 'all');
    wp_register_style('didistudio-art-component-portfolio-menu', get_template_directory_uri() . '/assets/css/components/portfolio-menu.css', array(), '1.0', 'all');
    wp_register_style('didistudio-art-component-similar-card', get_template_directory_uri() . '/assets/css/components/similar-card.css', array(), '1.0', 'all');
    // BLOCK
    wp_register_style('didistudio-art-component-slider-portfolio', get_template_directory_uri() . '/assets/css/block/slider-portfolio.css', array(), '1.0', 'all');
    wp_register_style('didistudio-art-block-services', get_template_directory_uri() . '/assets/css/block/services.css', array(), '1.0', 'all');
    wp_register_style('didistudio-art-block-progress', get_template_directory_uri() . '/assets/css/block/progress.css', array(), '1.0', 'all');
    wp_register_style('didistudio-art-similar-post', get_template_directory_uri() . '/assets/css/block/similar-post.css', array(), '1.0', 'all');
    // TAXONOMY
    wp_register_style('didistudio-art-taxonomy-portfolio-work', get_template_directory_uri() . '/assets/css/taxonomy/portfolio-work.css', array(), '1.0', 'all');
    wp_register_style('didistudio-art-taxonomy-portfolio-logotype', get_template_directory_uri() . '/assets/css/taxonomy/portfolio-logotype.css', array(), '1.0', 'all');
    // LAYOUT
    wp_register_style('didistudio-art-page-home', get_template_directory_uri() . '/assets/css/page/home.css', array(), '1.0', 'all');

	wp_enqueue_script( 'didistudio-art-js', get_template_directory_uri() . '/assets/js/script.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'swiper-js', get_template_directory_uri() . '/vendor/js/swiper-bundle.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'gsap-js', get_template_directory_uri() . '/vendor/js/gsap.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'scrolltrigger-js', get_template_directory_uri() . '/vendor/js/scrolltrigger.min.js', array(), _S_VERSION, true );

	wp_register_script( 'js-slider-portfolio', get_template_directory_uri() . '/assets/js/portfolio-slider.js', array(), _S_VERSION, true );
	wp_register_script( 'js-slider-progress', get_template_directory_uri() . '/assets/js/progress-slider.js', array(), _S_VERSION, true );

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

    acf_add_options_page(array(
        'page_title' 	=> 'Настройки блоков на главной',
        'menu_title'	=> 'Настройки блоков',
        'parent_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));
}

// ПОРТФОЛИО
add_action('init', function () {
    $labels = [
        'name' => 'Раздел',
        'singular_name' => 'Раздел',
        'menu_name' => 'Раздел',
        'all_items' => 'Все разделы',
        'edit_item' => 'Редактировать раздел',
        'view_item' => 'Посмотреть раздел',
        'update_item' => 'Сохранить раздел',
        'add_new_item' => 'Добавить новый раздел',
        'parent_item' => 'Родительский раздел',
        'search_items' => 'Поиск по разделам',
        'back_to_items' => 'Назад на страницу разделов',
    ];

    $args = [
        'labels' => $labels,
        'show_admin_column' => true,
        'hierarchical' => true,
        'rewrite' => [
            'slug' => 'portfolio-section',
        ],
    ];

    register_taxonomy('portfolio-section', ['portfolio'], $args);
});

// Регистрируем тип записи "portfolio"
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
        'not_found' => 'Ничего не найдено',
        'not_found_in_trash' => 'В корзине не найдено',
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => [
            'slug' => 'portfolio-section/%portfolio-section%',
            'with_front' => false
        ],
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => [
            'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields',
        ],
        'taxonomies' => ['portfolio-section'],
    ];

    register_post_type('portfolio', $args);
});

add_filter('post_type_link', function ($post_link, $post) {
    if ($post->post_type === 'portfolio') {
        $terms = get_the_terms($post->ID, 'portfolio-section');
        if ($terms && !is_wp_error($terms)) {
            $post_link = str_replace('%portfolio-section%', $terms[0]->slug, $post_link);
        } else {
            $post_link = str_replace('%portfolio-section%', 'uncategorized', $post_link);
        }
    }
    return $post_link;
}, 10, 2);

add_action('init', function () {
    add_rewrite_rule(
        '^portfolio-section/([^/]+)/([^/]+)/?$',
        'index.php?portfolio=$matches[2]',
        'top'
    );
});

/*
 * Регистрируем пользовательский тип записи Услуги
 */
add_action('init', function () {
    $labels = [
        'name' => 'Раздел',
        'singular_name' => 'Раздел',
        'menu_name' => 'Раздел',
        'all_items' => 'Все разделы',
        'edit_item' => 'Редактировать раздел',
        'view_item' => 'Посмотреть раздел',
        'update_item' => 'Сохранить раздел',
        'add_new_item' => 'Добавить новый раздел',
        'parent_item' => 'Родительский раздел',
        'search_items' => 'Поиск по разделам',
        'back_to_items' => 'Назад на страницу разделов',
    ];

    $args = [
        'labels' => $labels,
        'show_admin_column' => true,
        'hierarchical' => true,
        'rewrite' => [
            'slug' => 'service-section',
        ],
    ];

    register_taxonomy('service-section', ['service'], $args);
});

add_action('init', function () {
    $labels = [
        'name' => 'Услуги',
        'menu_name' => 'Услуги',
        'singular_name' => 'Услуги',
        'add_new' => 'Добавить услугу',
        'add_new_item' => 'Добавить новую услугу',
        'edit_item' => 'Редактировать услугу',
        'new_item' => 'Новая услуга',
        'all_items' => 'Все услуги',
        'view_item' => 'Посмотреть услугу',
        'search_items' => 'Найти услугу',
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
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => [
            'title'
        ],
        'taxonomies' => ['service-section'],
    ];
    register_post_type('service', $args);
});

// Добавляем поле в админку при редактировании терма
add_action('service-section_edit_form_fields', function ($term) {
    $value = get_term_meta($term->term_id, 'sort_order', true);
    ?>
    <tr class="form-field">
        <th scope="row"><label for="sort_order">Сортировка</label></th>
        <td>
            <input type="number" name="sort_order" id="sort_order" value="<?php echo esc_attr($value); ?>" />
            <p class="description">Чем меньше значение — тем выше в списке.</p>
        </td>
    </tr>
    <?php
});

// Сохраняем значение при обновлении терма
add_action('edited_service-section', function ($term_id) {
    if (isset($_POST['sort_order'])) {
        update_term_meta($term_id, 'sort_order', intval($_POST['sort_order']));
    }
});

/*
 * Регистрируем пользовательский тип записи Достижения
 */
add_action('init', function () {
    $labels = [
        'name' => 'Достижения',
        'menu_name' => 'Достижения',
        'singular_name' => 'Достижения',
        'add_new' => 'Добавить достижение',
        'add_new_item' => 'Добавить новое достижение',
        'edit_item' => 'Редактировать достижение',
        'new_item' => 'Новое достижение',
        'all_items' => 'Все достижения',
        'view_item' => 'Посмотреть достижение',
        'search_items' => 'Найти достижение',
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
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => [
            'title', 'excerpt', 'custom-fields'
        ],
    ];
    register_post_type('progress', $args);
});

// Страницы-блоки
function register_content_blocks_post_type() {
    $labels = array(
        'name'               => 'Блоки',
        'singular_name'      => 'Блок',
        'menu_name'          => 'Блоки контента',
        'name_admin_bar'     => 'Блок',
        'add_new'            => 'Добавить блок',
        'add_new_item'       => 'Добавить новый блок',
        'new_item'           => 'Новый блок',
        'edit_item'          => 'Редактировать блок',
        'view_item'          => 'Просмотр блока',
        'all_items'          => 'Все блоки',
        'search_items'       => 'Поиск блоков',
        'parent_item_colon'  => '',
        'not_found'          => 'Блоки не найдены.',
        'not_found_in_trash' => 'В корзине блоков нет.',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-layout', // Иконка из админки
        'capability_type'    => 'page', // ВАЖНО: поведение как у страниц
        'hierarchical'       => false, // Нет вложенности
        'supports'           => array('title', 'editor', 'thumbnail'), // Поддерживаемые поля
        'has_archive'        => false, // Нет архива
        'rewrite'            => array('slug' => 'block', 'with_front' => false),
        'show_in_rest'       => true, // Для Gutenberg и REST API
    );

    register_post_type('content_block', $args);
}
add_action('init', 'register_content_blocks_post_type');

function format_phone($phone) {
    // Удаляем все лишние символы
    $phone = preg_replace('/[^0-9]/', '', $phone);

    // Если номер начинается с 7 и длина 11 символов, форматируем
    if (strlen($phone) === 11 && $phone[0] === '7') {
        return '+7 (' . substr($phone, 1, 3) . ') ' . substr($phone, 4, 3) . ' ' . substr($phone, 7, 2) . ' ' . substr($phone, 9, 2);
    }

    // Если формат не совпадает — возвращаем без изменений
    return $phone;
}

function custom_posts_pagination() {
    global $wp_query;
    $big = 999999999; // уникальное число для замены

    $current_page = max(1, get_query_var('paged'));
    $total_pages = $wp_query->max_num_pages;

    if ($total_pages <= 1) return;

    $output = '<nav class="pagination">';

    // Назад
    if ($current_page > 1 && $current_page < $total_pages) {
        $output .= '<a class="pagination__numbers pagination__prev" href="' . get_pagenum_link($current_page - 1) . '">Назад</a>';
    }

    // Страницы
    $start = max(1, $current_page - 1);
    $end = min($total_pages, $current_page + 1);

    for ($i = $start; $i <= $end; $i++) {
        if ($i == $current_page) {
            $output .= '<span class="pagination__numbers pagination__numbers--current">' . $i . '</span>';
        } else {
            $output .= '<a class="pagination__numbers" href="' . get_pagenum_link($i) . '">' . $i . '</a>';
        }
    }

    // Дальше
    if ($current_page < $total_pages && $current_page > 1) {
        $output .= '<a class="pagination__numbers pagination__next" href="' . get_pagenum_link($current_page + 1) . '">Дальше</a>';
    }

    // Спец: если первая страница — только "Дальше"
    if ($current_page == 1) {
        $output = '<nav class="pagination">';
        for ($i = 1; $i <= min(3, $total_pages); $i++) {
            if ($i == $current_page) {
                $output .= '<span class="pagination__numbers pagination__numbers--current">' . $i . '</span>';
            } else {
                $output .= '<a class="pagination__numbers" href="' . get_pagenum_link($i) . '">' . $i . '</a>';
            }
        }
        if ($total_pages > 1) {
            $output .= '<a class="pagination__numbers pagination__next" href="' . get_pagenum_link(2) . '">Дальше</a>';
        }
    }

    // Спец: если последняя страница — только "Назад"
    if ($current_page == $total_pages && $total_pages > 1) {
        $output = '<nav class="pagination">';
        if ($total_pages > 1) {
            $output .= '<a class="pagination__numbers pagination__prev" href="' . get_pagenum_link($current_page - 1) . '">Назад</a>';
        }
        for ($i = max(1, $total_pages - 2); $i <= $total_pages; $i++) {
            if ($i == $current_page) {
                $output .= '<span class="pagination__numbers pagination__numbers--current">' . $i . '</span>';
            } else {
                $output .= '<a class="pagination__numbers" href="' . get_pagenum_link($i) . '">' . $i . '</a>';
            }
        }
    }

    $output .= '</nav>';
    echo $output;
}
