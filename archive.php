<?php
    get_header();
?>

<main>
    <?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
    <div class="catalog">
        <div class="layout catalog__heading">
            <h2 class="h2-style">Каталог товаров</h2>
        </div>
        <div class="catalog__wrapper layout">
            <div class="catalog__filter-wrapper">
                <a href="" class="catalog__filter">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/img/icons/filter.svg" alt="filter icon">
                    <span>Открыть фильтр</span>
                </a>
            </div>
            <div class="filter filter__scroll">
                <div class="filter__wrapper">
                    <?php
                        do_action('events_add_filter_sidebar');
                    ?>

                    <div class="filter__item">
                        <div class="filter__button">
                            <a href="#" class="button button--medium button--yellow clear-filter">Сбросить фильтры</a>
                        </div>
                        <div class="filter__button">
                            <a href="#header" class="button button--medium button--white scrollToId">Наверх</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product">
                <?php

                function getRequest() {
                    $result = [];
                    foreach (TAXONOMYES as $taxonomyUrl) {
                        $result[] = [
                            'name' => $taxonomyUrl,
                            'slug' => explode(",", $_GET[$taxonomyUrl])
                        ];
                    }
                    return $result;
                };
                $getRequest = getRequest(); // Получение каталогов

                $createRequirements = [];

                $getTerms = getTerms(TAXONOMYES);

                $checkedTaxonomyView = CATALOG_TAXONOMY;
                function checkedTaxonomyView($tax) {
                    global $checkedTaxonomyView;
                    $checkedTaxonomyView = $tax;
                }
                checkedTaxonomyView(TAXONOMY_TYPE);


                function createFilterRequest($request) {
                    foreach ($request as $item) {
                        if($item['slug'][0]) {
                            $createRequirements[] = [
                                'taxonomy' => $item['name'],
                                'term' => $item['slug']
                            ];
                            if($item['name'] === CATALOG_TAXONOMY) {
                                checkedTaxonomyView(TAXONOMY_TYPE);
                            }
                            if($item['name'] === TAXONOMY_TYPE or $item['name'] === TAXONOMY_NEWS) {
                                checkedTaxonomyView(CATALOG_TAXONOMY);
                            }
                        }
                    }
                    return $createRequirements;
                }
                $resultSort = createFilterRequest($getRequest);

//                vardump($resultSort);
                echo "<br>";
                vardump('----------------*-------------');
                echo "<br>";

                function getAllTaxonomies($taxonomy) {
                    $terms = [];
                    $categories = get_categories( [
                        'taxonomy'     => $taxonomy,
                        'type'         => 'post',
                        'order'        => 'ASC',
                    ] );
                    $slugs = array_map(function($term) {
                        return $term->slug;
                    }, $categories);
                    return $slugs;
                }

                if($resultSort) {
                    foreach ($resultSort as $item) {
                        if($item["taxonomy"] === CATALOG_TAXONOMY) {
                            createBlockFilterBrand($item["term"], $resultSort);
                        }
                        if($item["taxonomy"] === TAXONOMY_TYPE) {
                            createBlockFilter($item["term"], getAllTaxonomies(CATALOG_TAXONOMY));
                        }
                    }
                }

                function createBlockFilter($cat, $arr) {
                    foreach ($arr as $item) {
                        vardump($item);
                        wp_reset_query();
                        $query = array(
                            'posts_per_page' => -1,
                            'post_type' => CATALOG_TYPE,
                            'tax_query' => array()
                        );
                        $query['tax_query'] = array(
                            'relation' => 'AND',
                        );
                        $query['tax_query'][] =  array(
                            'taxonomy' => TAXONOMY_TYPE,
                            'terms' => $cat,
                            'field' => 'slug',
                        );
                        foreach($arr as $param) {
                            $query['tax_query'][] =  array(
                                'taxonomy' => CATALOG_TAXONOMY,
                                'terms' => $item,
                                'field' => 'slug',
                            );
                        }

//                        vardump($query);

                        $productQuery = new WP_Query($query);
                        if($productQuery->have_posts()) {
                            while ( $productQuery->have_posts() ) {
                                $productQuery->the_post();
                                echo get_field('product_article');
                                echo the_title();
                                echo "<br>";
                            }
                        }
                        echo "<br>";
                        echo "<br>";


                        $big = 999999999; // need an unlikely integer
                        echo paginate_links(
                            array(
                                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                                'format' => '?paged=%#%',
                                'current' => max(
                                    1,
                                    get_query_var('paged')
                                ),
                                'total' => $query->max_num_pages //$q is your custom query
                            )
                        );
                        wp_reset_postdata();

                    }
                }

                function createBlockFilterBrand($cat, $arr) {
                    foreach ($cat as $item) {
                        vardump($item);
                        wp_reset_query();
                        $query = array(
                            'posts_per_page' => -1,
                            'post_type' => CATALOG_TYPE,
                            'tax_query' => array()
                        );
                        $query['tax_query'] = array(
                            'relation' => 'AND',
                        );
                        $query['tax_query'][] =  array(
                            'taxonomy' => CATALOG_TAXONOMY,
                            'terms' => $item,
                            'field' => 'slug',
                        );
                        foreach($arr as $param) {
                            if($param["taxonomy"] === TAXONOMY_TYPE || $param["taxonomy"] === TAXONOMY_NEWS) {
                                $query['tax_query'][] =  array(
                                    'taxonomy' => $param["taxonomy"],
                                    'terms' => $param["term"],
                                    'field' => 'slug',
                                );
                            }
                        }

                        $productQuery = new WP_Query($query);
                        if($productQuery->have_posts()) {
                            while ( $productQuery->have_posts() ) {
                                $productQuery->the_post();
                                echo get_field('product_article');
                                echo the_title();
                                echo "<br>";
                            }
                        }
                        echo "<br>";
                        echo "<br>";


                        $big = 999999999; // need an unlikely integer
                        echo paginate_links(
                            array(
                                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                                'format' => '?paged=%#%',
                                'current' => max(
                                    1,
                                    get_query_var('paged')
                                ),
                                'total' => $productQuery->max_num_pages //$q is your custom query
                            )
                        );
                        wp_reset_postdata();

                    }
                }

                echo "<br>";
                vardump('----------------*-------------');
                echo "<br>";


//                function createTaxQuery($getCategory) {
//                    wp_reset_query();
//                    $query = array(
//                        'posts_per_page' => -1,
//                        'post_type' => CATALOG_TYPE,
//                        'tax_query' => array()
//                    );
//
//                    $query['tax_query'] = array(
//                        'relation' => 'AND',
//                    );
//                    foreach($getCategory as $param){
//                        $query['tax_query'][] =  array(
//                            'taxonomy' => $param["taxonomy"],
//                            'terms' => $param["term"],
//                            'field' => 'slug',
//                        );
//                    }
//                    return $query;
//                }

//                $query = new WP_Query( createTaxQuery($resultSort) );
//                while ( $query->have_posts() ) {
//                    $query->the_post();
//
//                    echo the_title();
//                    echo "<br>";
//                }

//                $big = 999999999; // need an unlikely integer
//                echo paginate_links(
//                    array(
//                        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
//                        'format' => '?paged=%#%',
//                        'current' => max(
//                            1,
//                            get_query_var('paged')
//                        ),
//                        'total' => $query->max_num_pages //$q is your custom query
//                    )
//                );

//                wp_reset_postdata();


                echo "<br>";
                vardump('----------------*-------------');
                echo "<br>";


                $requirementsBrand = array( // Для бренда передать TAXONOMY_TYPE
                    array(
                        'taxonomy' => CATALOG_TAXONOMY,
                        'term' => getAllBrands()
                    )
                );

                function getAllBrands() {
                    $terms = [];
                    $categories = get_categories( [
                        'taxonomy'     => CATALOG_TAXONOMY,
                        'type'         => 'post',
                        'order'        => 'ASC',
                    ] );
                    $slugs = array_map(function($term) {
                        return $term->slug;
                    }, $categories);
                    return $slugs;
                }

                $requirementsType = array( // Для Типа
//                    array(
//                        'taxonomy' => CATALOG_TAXONOMY,
//                        'term' => ['crazy-zombie', 'kislitsa', 'my-printsessa'],
//                    ),
                    array(
                        'taxonomy' => CATALOG_TAXONOMY,
                        'term' => ['caramel', 'zhevatelnaya-konfeta', 'zhevatelnaya-rezinka'], // Сортировка по всем категориям
                    ),
                );

                $requirementsNews = array( // Для новинки
                    array(
                        'taxonomy' => TAXONOMY_NEWS,
                        'term' => ['news-product']
                    )
                );

                function fruit_query_mult_tax($array, $relation){
                    wp_reset_query();
                    $query = array(
                        'posts_per_page' => -1,
                        'post_type' => CATALOG_TYPE,
                        'tax_query' => array()
                    );

                    $query['tax_query'] = array(
                        'relation' => $relation,
                    );
//                    vardump($array);
                    foreach($array as $param){
                        $query['tax_query'][]=  array(
                            'taxonomy' => $param["taxonomy"],
                            'terms' => $param["term"],
                            'field' => 'slug',
                        );
                    }

                    $result = new WP_Query($query);
                    return $result;

                }

                $result = null;
                if($resultSort !== null) {
                    vardump($resultSort);
                    $result = fruit_query_mult_tax($resultSort, 'AND');
                } else {
                    $checkedTaxonomyView = CATALOG_TAXONOMY;
                    $result = fruit_query_mult_tax($requirementsBrand, 'AND');
                }

                if($result) {

                // Создаем массив для группировки постов по категориям
                $posts_by_category = [];

                // Группируем посты по категориям
                foreach ($result->posts as $post) {
                    $post_categories = get_the_terms( $post->ID , $checkedTaxonomyView); // Сюда тип для фильтра
                    if (!empty($post_categories)) {
                        foreach ($post_categories as $category) {
                            $posts_by_category[$category->term_id][] = $post;
                        }
                    }
                }

//                vardump($posts_by_category);

                if($posts_by_category) {
                // Выводим посты по категориям
                $count = 2;
                foreach ($posts_by_category as $category_id => $category_posts) {
                    $categoryName = get_term( $category_id , $checkedTaxonomyView); // Сюда тип для фильтра
                    ?>

                    <div class="product__category">
                        <div class="product__heading">
                            <h3 class="h4-style">
                                <img class="icon-heading" src="<?php bloginfo('stylesheet_directory'); ?>/img/icons/icon-cl.svg" alt="">
                                <?php echo $categoryName->name; ?>
                            </h3>
                        </div>
                        <div class="product__wrapper">
                            <?php foreach ($category_posts as $post) {
                                setup_postdata($post);
                                ?>
                                <div class="product__item">
                                    <div class="product__top">
                                        <?php
                                            $terms = get_the_terms(get_the_ID($post->ID), TAXONOMY_NEWS);

                                            if ($terms && !is_wp_error($terms)) {
                                                $term_names = wp_list_pluck($terms, 'name');
                                                $term_text = implode(', ', $term_names);
                                                $term_text === 'Новинки' ? $term_text = 'Новинка' : $term_text;
                                        ?>
                                        <span class="product__label"><?php echo $term_text; ?></span>
                                        <?php } ?>
                                        <a href="<?php the_permalink(); ?>" class="product__image">
                                            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                                        </a>
                                    </div>
                                    <div class="product__bottom">
                                    <?php if(get_field('product_article')) { ?>
                                        <div class="product__article">Арт. <?php echo get_field('product_article'); ?></div>
                                    <?php } ?>
                                        <a href="<?php the_permalink(); ?>" class="product__name"><?php the_title(); ?></a>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                        <div class="product__button">
                            <a href="#" class="button button--medium button--yellow load-more-posts" data-page="1">Показать еще</a>
                        </div>
                    </div>

                <?php }
                } else { ?>
                    <div class="product__error">
                        <h3 class="h4-style">По вашему запросу ничего не найдено =(</h3>
                        <a href="#" class="button button--medium button--white">Сбросить фильтры</a>
                    </div>
                <?php }

                } else { ?>
                    <div class="product__error">
                        <h3 class="h4-style">По вашему запросу ничего не найдено =(</h3>
                        <a href="#" class="button button--medium button--white">Сбросить фильтры</a>
                    </div>
                <?php } ?>

                <?php
                //                foreach ($posts_by_category as $category_id => $category_posts) {
                //                    $categoryName = get_term( $category_id , CATALOG_TAXONOMY);
                //                    vardump($categoryName->name);
                //                    foreach ($category_posts as $post) {
                //                        setup_postdata($post);
                //                        the_title();
                //                        echo '<br>';
                //                    }
                //                }

                // Сбрасываем запрос

                wp_reset_postdata();

                ?>


                <?php














                // Get Brands
                if(!getCategorySlugUrl()) {
//                    getPostsBrand(getPostsBrands());
                } else {
//                    vardump(getCategorySlugUrl());
//                    vardump('2');
                }
                    function getPostsBrandType($postsBrand, $postType) {
                        $args = array(
                            'post_type' => CATALOG_TYPE,
                            'tax_query' => [
                                'relation' => 'AND',
                                [
                                    'taxonomy' => CATALOG_TAXONOMY,
                                    'field'    => 'slug',
                                    'terms'    => $postsBrand,
                                ],
                                [
                                    'taxonomy' => TAXONOMY_TYPE,
                                    'field'    => 'slug',
                                    'terms'    => $postType,
                                ],
                            ],
                        );

//                        vardump($args['post_type']);
//                        vardump($args['tax_query']);

//                        $query = new WP_Query( $args );
//                        while ($query->have_posts()) {
//                            $query->the_post();
//                            vardump(the_title());
//                        }

//                        vardump(get_category_slug($item)->name);

                    }
                    getPostsBrandType(['crazy-zombie1'], ['zhevatelnaya-konfeta', 'zhevatelnaya-rezinka']);




//                vardump($brands['name']);

                $selectTaxonomy = [
                    'brands' => ['crazy-zombie1'],
                    'types' => ['zhevatelnaya-konfeta']
                ];

                foreach ($selectTaxonomy as $key => $value) {
//                    vardump($key . ": " . $value);

                    if($key === 'brands') {
//                        vardump('1');
                    } else {
//                        vardump('false');
                    }

                }

                // 1. Сбрать массив всех категорий
                // 2. Собрать пост данные
                //  - Перебрать/Собрать в 2-3 массива с сортировкой, для перебора
                // 3. *Получить все типы при выборе бренда


                $allTaxonomy = [
                    [
                        'name' => 'brand' ,
                        'slug' => [
                            'crazy-zombie1',
                            'kislitsa1',
                            'my-printsessa1',
                        ]
                    ],
                    [
                        'name' => 'types' ,
                        'slug' => [
                            'zhevatelnaya-konfeta',
                            'zhevatelnaya-rezinka',
                            'caramel'
                        ]
                    ]
                ];

                $postTaxonomy = [
                    'crazy-zombie1',
                    'zhevatelnaya-konfeta',
                    'zhevatelnaya-rezinka' // ???????????????????????
                ];

                $rPostTaxonomy = [
                    'brand' => ['crazy-zombie1'],
                    'type' => ['zhevatelnaya-konfeta', 'zhevatelnaya-rezinka']
                ];

                // Статус при котором перебирается нужная категория
                $statusSelectGetPost = 'brand';

                $category = get_term_by('slug', 'crazy-zombie1', CATALOG_TAXONOMY);
//                vardump($category);
//                vardump('uuuuuuuuu');

                $resultAttachmentTaxonomy = [];
                function attachmentTaxonomy($array, $taxonomy) {
                    foreach ($array as $item) {
                        foreach ($taxonomy as $value) {
                            if($item['name'] === 'brand') {
                                $resultAttachmentTaxonomy[] = [$value];
                            }
                            if($item['name'] === 'types' && !$resultAttachmentTaxonomy ) {
                                $resultAttachmentTaxonomy[] = [$value];
                            } else {

                            }
                        }
                    }
//                    vardump($resultAttachmentTaxonomy);
                }
                attachmentTaxonomy($allTaxonomy, $postTaxonomy);

                $queryArgs = [];
                foreach ($allTaxonomy as $item) {
                    if($item['name'] === 'brand') {
                        $queryArgs[] = queryArgsFn($postTaxonomy, $item['slug'], CATALOG_TAXONOMY);
                    }
                    if($item['name'] === 'types') {
                        $queryArgs[] = queryArgsFn($postTaxonomy, $item['slug'], TAXONOMY_TYPE);
                    }
                }
//                    vardump($queryArgs);

                function queryArgsFn($taxonomy, $array, $customTaxonomy) {
                    foreach ($array as $item) {
                        foreach ($taxonomy as $value) {
                            if($item === $value) {
//                            vardump($value);
//                                return [
//                                    'taxonomy' => $customTaxonomy,
//                                    'term' => [$value]
//                                ];
                            }
                        }
                    }
                }
//                vardump($queryArgs);


                $resultCheckTaxonomy = [];
                function checkTaxonomy($getPost, $tax) {
                    foreach ($tax[0] as $value) {
                        foreach ($getPost as $post) {
                            if($value === $post) {
                                $resultCheckTaxonomy[] = $post;
                            }
                        }
                    }
//                    vardump($resultCheckTaxonomy);
                }
//                    checkTaxonomy($checkTaxonomy, $brands);


//                $resultCheck = [];
//                foreach ($allTaxonomy as $item) {
//                    foreach ($checkTaxonomy as $check) {
//                        if($item === $check) {
//                            $resultCheck[] = $check;
//                        }
//                    }
//                }
//                vardump($resultCheck);

//

                // Category for filters

//                $catalog = 'catalog';
//                $taxonomy = 'catalog_category';
//
//                $getParentCategory = get_terms([
//                    'taxonomy' => $taxonomy,
//                    'hide_empty' => false,
//                    'parent' => 0,
//                ]);
////                vardump($getParentCategory);
//
//                $getChildCategory = get_terms([
//                    'taxonomy' => $taxonomy,
//                    'hide_empty' => false,
//                    'childless' => true,
//                ]);
//
//                foreach ($getChildCategory as $cat) :
//                    if($cat->count > 0) {
//                        $getCategory[] = $cat->slug;
//                    }
//                endforeach;



                // Получить все названия дочерних категорий

                $getAllCategory = get_terms([
                    'taxonomy'   => 'catalog_category',
                    'hide_empty' => false,
                    'childless' => true,
                ]);
                $getCategory = [];
                foreach ($getAllCategory as $cat) :
//                    vardump($cat);
                    if($cat->count > 0) {
                        $getCategory[] = $cat->slug;
                    }
                endforeach;
                ?>

                <?php

                $catalog = 'catalog';
                $taxonomy = 'catalog_category';

                // Получить все родительские категории NEW*

                $brand = 'brand';


                $parentCategory = get_terms([
                    'taxonomy'   => $taxonomy,
                    'hide_empty' => false,
                    'parent' => 0,
                ]);

                $getChildCategory = [];
                foreach ($parentCategory as $childCat) :
//                    vardump($childCat);
                    $children = get_term_children( $childCat->term_taxonomy_id, $taxonomy );
                    $getChildCategory[] = [
                        'category_name' => $childCat->name,
                        'category_slug' => $childCat->slug,
                        'category_id' => $childCat->term_id,
                        'children_category' => $children
                    ];
                endforeach;

//                vardump($getChildCategory);
                $childrenCategory = [];
                foreach ($getChildCategory as $child) :
                    $childrenCategory[] = [
                        'category_name' => $child['category_name'],
                        'category_slug' => $child['category_slug'],
                        'children_category' => $child['children_category'],
                    ];
                endforeach;

//                vardump($childrenCategory);

                $brandCategory = [];
                foreach ($childrenCategory as $child) :

                    if($child['category_slug'] === $brand) {
                        foreach ($child['children_category'] as $item) :
                            $category = get_term( $item );
                            $brandCategory[] = $category;
                        endforeach;
                    }

                endforeach;


                foreach ($brandCategory as $item) :
//                    vardump($item);

                    $args = array(
                        'post_type' => 'catalog',
                        'tax_query' => array(
                            array(
                                'taxonomy' => $taxonomy,
                                'field'    => 'term_id',
                                'terms'    => $item->term_id,
                            ),
                        ),
                    );

                    $query = new WP_Query($args);

                    if ( $query->have_posts() ): ?>

<!--                        <h2>--><?php //echo $item->name ; ?><!--</h2>-->

                        <?php
                        while($query -> have_posts()) : $query -> the_post();
                        ?>
<!--                            <p><a href="--><?php //the_permalink(); ?><!--">--><?php //the_title(); ?><!--</a></p>-->

                        <?php
                        endwhile;
                    endif;

                endforeach;




                ?>



                <?php

                global $wp_query;
                $args = array_merge( $wp_query->query, array( 'post_type' => 'catalog' ) );
                query_posts( $args );
//                vardump($args);

                $get_category = preg_split('/[,|:]/u', $args['catalog_category'], -1, PREG_SPLIT_NO_EMPTY);
                $path_category = [];
                $get_category = array_reverse($get_category);

//                vardump($get_category);

//                 vardump($getCategory);
                 if(!sizeof($get_category)) {
                     $get_category = $getCategory;
                 }
//                 vardump($get_category);

                foreach ($get_category as $item) :

                    // WP_Query
                    $query = new WP_Query( [ 'catalog_category' => $item ] );
                    $totalpost = $query->found_posts;
//                    vardump($query);
//                    echo '<br>';
//                    echo '//////////////////////////////////';

                    // if...
                    if($totalpost > 0) {
//                        echo $totalpost;
                ?>

                <div class="product__category" style="display: none;">

                    <div class="product__heading">
                        <h3 class="h4-style">
                            <img class="icon-heading" src="<?php bloginfo('stylesheet_directory'); ?>/img/icons/icon-cl.svg" alt="">
                            <?php
                                $term = get_term_by('slug', $item, 'catalog_category');
                                echo $term->name;
                            ?>
                        </h3>
                    </div>
                    <div class="product__wrapper">

                        <?php



                            while ( $query->have_posts() ) {$query->the_post();

                        ?>

                            <div class="product__item">
                                <div class="product__top">
                                    <span class="product__label">Новинка</span>
                                    <a href="<?php the_permalink(); ?>" class="product__image">
                                        <img src="<?php bloginfo('stylesheet_directory'); ?>/img/product/product-1.png" alt="<?php the_title(); ?>">
                                    </a>
                                </div>
                                <div class="product__bottom">
                                    <div class="product__article">Арт. 00001</div>
                                    <a href="<?php the_permalink(); ?>" class="product__name"><?php the_title(); ?></a>
                                </div>
                            </div>

                        <?php }
                            wp_reset_postdata();
                        ?>


                    </div>

                <?php if($totalpost > 5) { ?>
                    <div class="product__button">
                        <a href="#" class="button button--medium button--yellow">Показать еще</a>
                    </div>
                <?php } ?>

                </div>
                <?php } endforeach; ?>

                <div class="product__category" style="display:none;">
                    <div class="product__heading"><h3 class="h4-style"><img class="icon-heading"
                                                                            src="<?php bloginfo('stylesheet_directory'); ?>/img/icons/icon-cl.svg" alt=""> Crazy
                            Zombie </h3></div>
                    <div class="product__wrapper">
                        <div class="product__item">
                            <div class="product__top"><span class="product__label">Новинка</span> <a href="#"
                                                                                                     class="product__image">
                                    <img src="<?php bloginfo('stylesheet_directory'); ?>/img/product/product-1.png" alt="Жевательная резинка"> </a></div>
                            <div class="product__bottom">
                                <div class="product__article">Арт. 00000</div>
                                <a href="#" class="product__name"> Карамель на палочке с шипучей карамелью </a></div>
                        </div>
                        <div class="product__item">
                            <div class="product__top"><span class="product__label">Новинка</span> <a href="#"
                                                                                                     class="product__image">
                                    <img src="<?php bloginfo('stylesheet_directory'); ?>/img/product/product-1.png" alt="Жевательная резинка"> </a></div>
                            <div class="product__bottom">
                                <div class="product__article">Арт. 00000</div>
                                <a href="#" class="product__name"> Карамель на палочке с шипучей карамелью </a></div>
                        </div>
                        <div class="product__item">
                            <div class="product__top"><span class="product__label">Новинка</span> <a href="#"
                                                                                                     class="product__image">
                                    <img src="<?php bloginfo('stylesheet_directory'); ?>/img/product/product-1.png" alt="Жевательная резинка"> </a></div>
                            <div class="product__bottom">
                                <div class="product__article">Арт. 00000</div>
                                <a href="#" class="product__name"> Карамель на палочке с шипучей карамелью </a></div>
                        </div>
                        <div class="product__item">
                            <div class="product__top"><span class="product__label">Новинка</span> <a href="#"
                                                                                                     class="product__image">
                                    <img src="<?php bloginfo('stylesheet_directory'); ?>/img/product/product-1.png" alt="Жевательная резинка"> </a></div>
                            <div class="product__bottom">
                                <div class="product__article">Арт. 00000</div>
                                <a href="#" class="product__name"> Карамель на палочке с шипучей карамелью </a></div>
                        </div>
                        <div class="product__item">
                            <div class="product__top"><span class="product__label">Новинка</span> <a href="#"
                                                                                                     class="product__image">
                                    <img src="<?php bloginfo('stylesheet_directory'); ?>/img/product/product-1.png" alt="Жевательная резинка"> </a></div>
                            <div class="product__bottom">
                                <div class="product__article">Арт. 00000</div>
                                <a href="#" class="product__name"> Карамель на палочке с шипучей карамелью </a></div>
                        </div>
                        <div class="product__item">
                            <div class="product__top"><span class="product__label">Новинка</span> <a href="#"
                                                                                                     class="product__image">
                                    <img src="<?php bloginfo('stylesheet_directory'); ?>/img/product/product-1.png" alt="Жевательная резинка"> </a></div>
                            <div class="product__bottom">
                                <div class="product__article">Арт. 00000</div>
                                <a href="#" class="product__name"> Карамель на палочке с шипучей карамелью </a></div>
                        </div>
                    </div>
                    <div class="product__button"><a href="#" class="button button--medium button--yellow">Показать
                            еще</a></div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
