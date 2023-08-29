<?php

add_action('wp_enqueue_scripts', 'style_theme');
add_action('wp_footer', 'scripts_theme');
add_action( 'after_setup_theme', 'theme_register_nav_menu' );
//add_action( 'after_setup_theme', 'menu_names' );

function theme_register_nav_menu() {
    register_nav_menu( 'top', 'menu_header' );
    register_nav_menu( 'footer1', 'menu_footer1' );
    register_nav_menu( 'footer2', 'menu_footer2' );
    register_nav_menu( 'footer3', 'menu_footer3' );
}

function menu_names($name) {
    $theme_locations = get_nav_menu_locations();
    $menu_obj = get_term( $theme_locations[$name], 'nav_menu' );
    return $menu_obj->name;
}

/* Настройки темы */
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' 	=> 'Основные настройки',
        'menu_title'	=> 'Настройки темы',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));

}

function style_theme() {
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css');
}
function scripts_theme() {
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js');
}

// свой класс построения меню:
class My_Walker_Nav_Menu extends Walker_Nav_Menu {

    // add classes to ul sub-menus
    function start_lvl( &$output, $depth = 0, $args = NULL ) {
        // depth dependent classes
        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
        $display_depth = ( $depth + 1); // because it counts the first submenu as 0
        $classes = array(
            'header__sub-menu__list',
            ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
            ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
            'menu-depth-' . $display_depth
        );
        $class_names = implode( ' ', $classes );

        // build html
        $output .= "\n" . $indent . '<div class="header__sub-menu"><ul class="' . $class_names . '">' . "\n";
    }

    // add main/sub classes to li's and links
    function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
        global $wp_query;

        // Restores the more descriptive, specific name for use within this method.
        $item = $data_object;

        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

        // depth dependent classes
        $depth_classes = array(
            ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
            ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
            ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
            'menu-item-depth-' . $depth
        );
        $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

        // passed classes
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

        // build html
        $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

        // link attributes
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

        $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            apply_filters( 'the_title', $item->title, $item->ID ),
            $args->link_after,
            $args->after
        );

        // build html
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

}
function my_nav_menu( $args ) {

    $args = array_merge( [
        'container'       => null,
        'container_id'    => null,
        'container_class' => null,
        'menu_class'      => 'header__menu-list',
        'echo'            => false,
        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth'           => 10,
        'walker'          => new My_Walker_Nav_Menu()
    ], $args );

    echo wp_nav_menu( $args );
}

/* Breadcrumbs */


require_once get_stylesheet_directory() . '/utilities/breadcrumbs.php';
require_once get_stylesheet_directory() . '/utilities/post-types.php';
require_once get_stylesheet_directory() . '/utilities/category-filter/category-filter.php';
require_once get_stylesheet_directory() . '/utilities/category-filter/filter-functions.php';
require_once get_stylesheet_directory() . '/utilities/category-filter/filter-posts.php';


// хук для регистрации
add_action( 'init', 'create_taxonomy' );
function create_taxonomy(){

    // список параметров: wp-kama.ru/function/get_taxonomy_labels
    register_taxonomy( 'brands', [ 'products' ], [
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => [
            'name'              => 'Бренд',
            'singular_name'     => 'Бренд',
            'search_items'      => 'Найти бренды',
            'all_items'         => 'Все бренды',
            'view_item '        => 'Смотреть бренд',
            'parent_item'       => 'Родительсякий бренд',
            'parent_item_colon' => 'Родительсякий бренд:',
            'edit_item'         => 'Редактировать бренд',
            'update_item'       => 'Обновить бренд',
            'add_new_item'      => 'Добавить новый бренд',
            'new_item_name'     => 'Имя бренда',
            'menu_name'         => 'Бренд',
            'back_to_items'     => '← Вернуться в Бренд',
        ],
        'description'           => '', // описание таксономии
        'public'                => true,
        // 'publicly_queryable'    => null, // равен аргументу public
        // 'show_in_nav_menus'     => true, // равен аргументу public
        // 'show_ui'               => true, // равен аргументу public
        // 'show_in_menu'          => true, // равен аргументу show_ui
        // 'show_tagcloud'         => true, // равен аргументу show_ui
        // 'show_in_quick_edit'    => null, // равен аргументу show_ui
        'hierarchical'          => true,

        'rewrite'               => true,
        //'query_var'             => $taxonomy, // название параметра запроса
        'capabilities'          => array(),
        'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
        'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
        'show_in_rest'          => true, // добавить в REST API
        'rest_base'             => null, // $taxonomy
        // '_builtin'              => false,
        //'update_count_callback' => '_update_post_term_count',
    ] );
}

/* HРегистрация типа Продукт */
add_action( 'init', 'register_post_types' );
function register_post_types(){

    register_post_type( 'products', [
        'label'  => null,
        'labels' => [
            'name'               => 'Продукты', // основное название для типа записи
            'singular_name'      => 'Продукт', // название для одной записи этого типа
            'add_new'            => 'Добавить продукт', // для добавления новой записи
            'add_new_item'       => 'Добавление продуктов', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование продукта', // для редактирования типа записи
            'new_item'           => 'Добавить продукт', // текст новой записи
            'view_item'          => 'Смотреть продукт', // для просмотра записи этого типа.
            'search_items'       => 'Искать продукты', // для поиска по этим типам записи
            'not_found'          => 'Не найдено продуктов', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено продукты в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Продукты', // название меню
        ],
        'description'            => 'Продукты для сайта',
        'public'                 => true,
         'publicly_queryable'  => true, // зависит от public
         'exclude_from_search' => false, // зависит от public
         'show_ui'             => true, // зависит от public
         'show_in_nav_menus'   => true, // зависит от public
        'show_in_menu'           => true, // показывать ли в меню админки
        // 'show_in_admin_bar'   => null, // зависит от show_in_menu
        'show_in_rest'        => true, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => 1,
        'menu_icon'           => null,
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor', 'thumbnail', 'custom-fields' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => ['brands'],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ] );

}

//function vardump($var) {
//    echo '<pre>';
//    var_dump($var);
//    echo '</pre>';
//}
//
//add_filter('query_vars', function ($vars) {
////    var_dump($vars);
////    vardump($vars);
//});
require_once get_stylesheet_directory() . '/utilities/category-filter/category-filter.php';

add_action( 'events_add_filter_sidebar', 'add_filter_archive_event' );
function add_filter_archive_event() {
//    global $wp;
    echo get_filter_by_taxonomy_links( 'catalog_category', 'По категории', '', 'AND' );
    // echo get_filter_by_taxonomy_forms('events_category', false, 'По категории', 'AND');
}
