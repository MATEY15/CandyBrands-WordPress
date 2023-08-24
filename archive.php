<?php get_header(); ?>

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
                    <?php do_action('events_add_filter_sidebar') ?>

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


                <div class="product__category">

                    <div class="product__heading">
                        <h3 class="h4-style">
                            <img class="icon-heading" src="<?php bloginfo('stylesheet_directory'); ?>/img/icons/icon-cl.svg" alt="">
                            Name - 123
                        </h3>
                    </div>
                    <div class="product__wrapper">

                        <?php
                        global $wp_query;
                        $args = array_merge( $wp_query->query, array( 'post_type' => 'catalog' ) );
                        query_posts( $args );


                        $get_category = preg_split('/[,|:]/u', $args['catalog_category'], -1, PREG_SPLIT_NO_EMPTY);
                        $path_category = null;
                        vardump(count($get_category));

                        foreach ($get_category as $item) :
                            if($get_category > 0) {}
//                            $path_category =
                            vardump($item);
                        endforeach;


                        $args = array(
                            'cat' => $get_category[0], $get_category[1],
                            'post_type' => 'catalog',
                            'posts_per_page' => -1
                        ); ?>
<!--                        --><?php //query_posts($args); ?>
                        <div class="news_anons">
                            <?php while (have_posts()) : the_post(); ?>
                                <article class="news_anons__item">
                                    <div class="image">
                                    </div>
                                    <div class="news_anons__info">
                                        <div class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
                                        <br><br>
                                    </div>
                                </article>
                            <?php endwhile; ?>
                        </div>
                        <?php wp_reset_query(); ?>

<!--                        if ( have_posts() ) { while ( have_posts() ) { the_post(); ?>-->
<!---->
<!--                            <div class="product__item">-->
<!--                                <div class="product__top">-->
<!--                                    <span class="product__label">Новинка</span>-->
<!--                                    <a href="--><?php //the_permalink(); ?><!--" class="product__image">-->
<!--                                        <img src="--><?php //bloginfo('stylesheet_directory'); ?><!--/img/product/product-1.png" alt="--><?php //the_title(); ?><!--">-->
<!--                                    </a>-->
<!--                                </div>-->
<!--                                <div class="product__bottom">-->
<!--                                    <div class="product__article">Арт. 00001</div>-->
<!--                                    <a href="--><?php //the_permalink(); ?><!--" class="product__name">--><?php //the_title(); ?><!--</a>-->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                        --><?php //} } else { ?>
<!--                            <p>Записей нет.</p>-->
<!--                        --><?php //} ?>
                    </div>

                    <div class="product__button"><a href="#" class="button button--medium button--yellow">Показать
                            еще</a></div>
                    <hr>
                </div>


                <div class="product__category">
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
