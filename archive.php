<?php
    get_header();

    $view = 'Работает';
?>

<main>
    <?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
    <div class="catalog">
        <div class="layout catalog__heading">
            <h2 class="h2-style">Archive Каталог товаров</h2>
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
                    getPostsBrands();
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

                // 1 get Brands

//                vardump(getCategorySlugUrl());
//                vardump(get_the_category());


                if(!getCategorySlugUrl()) {
                    getPostsBrand(getPostsBrands());
                } else {
//                    vardump(getCategorySlugUrl());
                    vardump('2');
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


                $allTaxonomy = [
                    [
                        'name' => 'brand' ,
                        'slug' => [
                            'crazy-zombie1',
                            'Кислица1',
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

                $resultAttachmentTaxonomy = [];
                function attachmentTaxonomy($array, $taxonomy) {
                    foreach ($array as $item) {
                        foreach ($taxonomy as $value) {
                            if($item['name'] === 'brand') {
                                $resultAttachmentTaxonomy[] = [$value];
                            }
                            if($item['name'] === 'types') {
                                $resultAttachmentTaxonomy[] = [$value];
                            }
                        }
                    }
                    vardump($resultAttachmentTaxonomy);
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
//                            vardump($value);
                            if($item === $value) {
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
                    vardump($resultCheckTaxonomy);
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

                $requirements = array(
                    array(
                        'taxonomy' => CATALOG_TAXONOMY,
                        'term' => ['crazy-zombie1']
                    ),
                    array(
                        'taxonomy' => TAXONOMY_TYPE,
                        'term' => ['zhevatelnaya-konfeta']
                    ),

                );

                function fruit_query_mult_tax($array){
                    wp_reset_query();
                    $query = array('post_type' => CATALOG_TYPE,
                        'tax_query' => array()
                    );

                    $query['tax_query'] = array(
                        'relation' => 'AND',
                    );
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
                $result = fruit_query_mult_tax($queryArgs);

                while ($result->have_posts()) {
                    $result->the_post();
                    vardump(the_title());
                }




//                vardump($args);


//                $args = array(
//                    'post_type' => CATALOG_TYPE,
//                    'tax_query' => [
//                        'relation' => 'AND',
//                        [
//                            'taxonomy' => CATALOG_TAXONOMY,
//                            'field'    => 'slug',
//                            'terms'    => getCategorySlugUrl(),
////                            'operator' => 'OR'
//                        ],
//                        [
//                            'taxonomy' => CATALOG_TAXONOMY,
//                            'field'    => 'slug',
//                            'terms'    => array('novinki'),
////                            'operator' => 'AND'
//                        ],
//                        [
//                            'taxonomy' => CATALOG_TAXONOMY,
//                            'field'    => 'slug',
//                            'terms'    => array('zhevatelnaya-konfeta'),
////                            'operator' => 'AND'
//                        ],
//
//                    ],
//                );


//                    vardump(get_category_slug("kislitsa")->name);
//                $query = new WP_Query( $args );
//                while ($query->have_posts()) {
//                    $query->the_post();
//                    vardump(the_title());
//                }

//                vardump(getPostsBrands());

//                $ggg = getBrandPosts('kislitsa');
//                vardump($ggg);
                echo '<br><br><br><br><br><br>';
//                getBrandPosts();
//                $getAllPostsBrand = getPostsBrands();
//                foreach ($getAllPostsBrand as $item) {
//                    vardump($item);
//                    vardump(getBrandPosts($item));
//                }


                    echo '-------------------------------------- END ------------------------------------';

                    ?>


                <?php
//                global $wp_query;
//                $tax_query = isset($wp_query->query_vars['tax_query']) ? $wp_query->query_vars['tax_query'] : array();
//
//                $tax_query = new WP_Tax_Query($tax_query);
//
//                vardump($tax_query);

                // 1
                // При выборе фильтра “бренд” и “тип”  заголовок остается с брендом.
                // Пользователь видит отображение продуктов выбранной категории и бренда.

                // 2
                // При выборе фильтра “бренд” (фильтр “тип” не выбран), заголовок
                //c брендом заменяется на заголовок с типом товара (Жевательные конфеты ) (т.к. бренд определён пользователем).
                //Далее идут блоки с категориями, которые есть у бренда. Если у бренда нет какой то из ,перечисленных в фильтрах, категории - она не отображается среди товаров

                // 3
                // При выборе фильтра “тип” (фильтр “бренд” не выбран), заголовок c брендом.
                //Пользователь видит бренды (заголовок), а в блоке с продуктами видит продукты соответствующие выбранному типу (категории)

                // 4
                // При выборе фильтра “новинки” или “скоро в продаже” Пользователь видит только новинки или товары из категории “скоро в продаже”.
                //Отображаются категории, которые имеют новинки или раздел “скоро в продаже”


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

                        <?php while($query -> have_posts()) : $query -> the_post(); ?>
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

                vardump($get_category);

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
                    echo '<br>';
                    echo '//////////////////////////////////';

                    // if...
                    if($totalpost > 0) {
                        echo $totalpost;
                ?>

                <div class="product__category">

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
