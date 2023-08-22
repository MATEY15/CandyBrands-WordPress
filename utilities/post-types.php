<?php
add_action('init', 'candy_register_post_types');

function candy_register_post_types() {

    register_post_type( 'catalog', [
        'label'  => null,
        'labels' => [
            'name'               => 'Каталог', // основное название для типа записи
            'singular_name'      => 'Каталог', // название для одной записи этого типа
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
        'menu_icon'           => 'dashicons-products',
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor', 'thumbnail', 'custom-fields' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => ['brands'],
        'has_archive'         => true,
        'rewrite' => [
            'slug' => 'catalog',
        ],
        'query_var' => true,
    ] );

    register_taxonomy( 'catalog_category', [ 'catalog' ], [
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => [
            'name'              => 'Категории',
            'singular_name'     => 'Категории',
            'search_items'      => 'Найти Категории',
            'all_items'         => 'Все Категории',
            'view_item '        => 'Смотреть Категорию',
            'parent_item'       => 'Родительсякая Категория',
            'parent_item_colon' => 'Родительсякая Категория:',
            'edit_item'         => 'Редактировать Категорию',
            'update_item'       => 'Обновить Категорию',
            'add_new_item'      => 'Добавить новую Категорию',
            'new_item_name'     => 'Имя Категории',
            'menu_name'         => 'Категории',
            'back_to_items'     => '← Вернуться в Категорию',
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

    register_taxonomy('events_tags', ['catalog'], [
        'labels' => [
            'name'              => _x('Теги', 'Теги события админка', 'oceanwp'),
            'singular_name'     => _x('Тег', 'Теги события админка', 'oceanwp'),
            'menu_name'         => _x('Теги', 'Теги события админка', 'oceanwp'),
            'search_items'      => _x('Искать Теги', 'Теги события админка', 'oceanwp'),
            'all_items'         => _x('Все Теги', 'Теги события админка', 'oceanwp'),
            'parent_item'       => _x('Родитель Теги', 'Теги события админка', 'oceanwp'),
            'parent_item_colon' => _x('Родитель Теги:', 'Теги события админка', 'oceanwp'),
            'edit_item'         => _x('Редактировать Теги', 'Теги события админка', 'oceanwp'),
            'update_item'       => _x('Обновить Тег', 'Теги события админка', 'oceanwp'),
            'add_new_item'      => _x('Добавить новый Тег', 'Теги события админка', 'oceanwp'),
            'new_item_name'     => _x('Новое имя Тега', 'Теги события админка', 'oceanwp'),
        ],
        'public'                => true,
        'show_in_rest' => true,
        'hierarchical'          => true,
        'update_count_callback' => '_update_post_term_count',
        'rewrite' => ['slug' => 'events_tags'],
        'meta_box_cb' => 'post_tags_meta_box',
        'show_admin_column' => true

    ]);
}
