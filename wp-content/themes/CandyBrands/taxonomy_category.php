<?php get_header(); ?>

<main>
    <?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
    <div class="catalog">
        <div class="layout catalog__heading"><h2 class="h2-style">**Каталог товаров</h2></div>
        <div class="catalog__wrapper layout">
            <div class="catalog__filter-wrapper"><a href="" class="catalog__filter"> <img src="<?php bloginfo('stylesheet_directory'); ?>/img/icons/filter.svg"
                                                                                          alt="filter icon"> <span>Открыть фильтр</span>
                </a></div>
            <div class="filter filter__scroll">
                <div class="filter__wrapper">
                    <div class="filter__item">
                        <?php do_action('events_add_filter_sidebar') ?>
                        <div class="filter__head"> Бренд <span class="icon-rotate"> <svg class="icon-arrow-rotate"
                                                                                         width="39px" height="39px"> <use
                                        xlink:href="<?php bloginfo('stylesheet_directory'); ?>/img/icons/sprites.svg#icon-arrow-rotate"></use> </svg> </span></div>
                        <div class="filter__body"><label class="checkbox-button checkbox-button--black"> <input
                                    type="checkbox" name="checkbox" required="" class="checkbox-button__input"> <span
                                    class="checkbox-button__text"> <span class="checkbox-button__status"></span> <span>Кислица</span> </span>
                            </label> <label class="checkbox-button checkbox-button--black"> <input type="checkbox"
                                                                                                   name="checkbox"
                                                                                                   required=""
                                                                                                   class="checkbox-button__input">
                                <span class="checkbox-button__text"> <span class="checkbox-button__status"></span> <span>Crazy Zombie</span> </span>
                            </label> <label class="checkbox-button checkbox-button--black"> <input type="checkbox"
                                                                                                   name="checkbox"
                                                                                                   required=""
                                                                                                   class="checkbox-button__input">
                                <span class="checkbox-button__text"> <span class="checkbox-button__status"></span> <span>Моя принцесса</span> </span>
                            </label> <label class="checkbox-button checkbox-button--black"> <input type="checkbox"
                                                                                                   name="checkbox"
                                                                                                   required=""
                                                                                                   class="checkbox-button__input">
                                <span class="checkbox-button__text"> <span class="checkbox-button__status"></span> <span>Boom Boss</span> </span>
                            </label> <label class="checkbox-button checkbox-button--black"> <input type="checkbox"
                                                                                                   name="checkbox"
                                                                                                   required=""
                                                                                                   class="checkbox-button__input">
                                <span class="checkbox-button__text"> <span class="checkbox-button__status"></span> <span>Zebra</span> </span>
                            </label> <label class="checkbox-button checkbox-button--black"> <input type="checkbox"
                                                                                                   name="checkbox"
                                                                                                   required=""
                                                                                                   class="checkbox-button__input">
                                <span class="checkbox-button__text"> <span class="checkbox-button__status"></span> <span>Sweet Coda</span> </span>
                            </label> <label class="checkbox-button checkbox-button--black"> <input type="checkbox"
                                                                                                   name="checkbox"
                                                                                                   required=""
                                                                                                   class="checkbox-button__input">
                                <span class="checkbox-button__text"> <span class="checkbox-button__status"></span> <span>Другие</span> </span>
                            </label></div>
                    </div>
                    <div class="filter__item">
                        <div class="filter__head"> Тип <span class="icon-rotate"> <svg class="icon-arrow-rotate"
                                                                                       width="39px" height="39px"> <use
                                        xlink:href="<?php bloginfo('stylesheet_directory'); ?>/img/icons/sprites.svg#icon-arrow-rotate"></use> </svg> </span></div>
                        <div class="filter__body"><label class="checkbox-button checkbox-button--black"> <input
                                    type="checkbox" name="checkbox" required="" class="checkbox-button__input"> <span
                                    class="checkbox-button__text"> <span class="checkbox-button__status"></span> <span>Жевательная конфета</span> </span>
                            </label> <label class="checkbox-button checkbox-button--black"> <input type="checkbox"
                                                                                                   name="checkbox"
                                                                                                   required=""
                                                                                                   class="checkbox-button__input">
                                <span class="checkbox-button__text"> <span class="checkbox-button__status"></span> <span>Жевательная резинка</span> </span>
                            </label> <label class="checkbox-button checkbox-button--black"> <input type="checkbox"
                                                                                                   name="checkbox"
                                                                                                   required=""
                                                                                                   class="checkbox-button__input">
                                <span class="checkbox-button__text"> <span class="checkbox-button__status"></span> <span>Карамель</span> </span>
                            </label> <label class="checkbox-button checkbox-button--black"> <input type="checkbox"
                                                                                                   name="checkbox"
                                                                                                   required=""
                                                                                                   class="checkbox-button__input">
                                <span class="checkbox-button__text"> <span class="checkbox-button__status"></span> <span>Шипучая карамель</span> </span>
                            </label> <label class="checkbox-button checkbox-button--black"> <input type="checkbox"
                                                                                                   name="checkbox"
                                                                                                   required=""
                                                                                                   class="checkbox-button__input">
                                <span class="checkbox-button__text"> <span class="checkbox-button__status"></span> <span>Мармелад</span> </span>
                            </label> <label class="checkbox-button checkbox-button--black"> <input type="checkbox"
                                                                                                   name="checkbox"
                                                                                                   required=""
                                                                                                   class="checkbox-button__input">
                                <span class="checkbox-button__text"> <span class="checkbox-button__status"></span> <span>Шоколадное драже</span> </span>
                            </label> <label class="checkbox-button checkbox-button--black"> <input type="checkbox"
                                                                                                   name="checkbox"
                                                                                                   required=""
                                                                                                   class="checkbox-button__input">
                                <span class="checkbox-button__text"> <span class="checkbox-button__status"></span> <span>Сахарное драже</span> </span>
                            </label> <label class="checkbox-button checkbox-button--black"> <input type="checkbox"
                                                                                                   name="checkbox"
                                                                                                   required=""
                                                                                                   class="checkbox-button__input">
                                <span class="checkbox-button__text"> <span class="checkbox-button__status"></span> <span>Жевательное драже</span> </span>
                            </label> <label class="checkbox-button checkbox-button--black"> <input type="checkbox"
                                                                                                   name="checkbox"
                                                                                                   required=""
                                                                                                   class="checkbox-button__input">
                                <span class="checkbox-button__text"> <span class="checkbox-button__status"></span> <span>Сахарная пудра</span> </span>
                            </label> <label class="checkbox-button checkbox-button--black"> <input type="checkbox"
                                                                                                   name="checkbox"
                                                                                                   required=""
                                                                                                   class="checkbox-button__input">
                                <span class="checkbox-button__text"> <span class="checkbox-button__status"></span> <span>Маршмэллоу</span> </span>
                            </label> <label class="checkbox-button checkbox-button--black"> <input type="checkbox"
                                                                                                   name="checkbox"
                                                                                                   required=""
                                                                                                   class="checkbox-button__input">
                                <span class="checkbox-button__text"> <span class="checkbox-button__status"></span> <span>Жидкая карамель</span> </span>
                            </label> <label class="checkbox-button checkbox-button--black"> <input type="checkbox"
                                                                                                   name="checkbox"
                                                                                                   required=""
                                                                                                   class="checkbox-button__input">
                                <span class="checkbox-button__text"> <span class="checkbox-button__status"></span> <span>Спрей</span> </span>
                            </label> <label class="checkbox-button checkbox-button--black"> <input type="checkbox"
                                                                                                   name="checkbox"
                                                                                                   required=""
                                                                                                   class="checkbox-button__input">
                                <span class="checkbox-button__text"> <span class="checkbox-button__status"></span> <span>Другое</span> </span>
                            </label></div>
                    </div>
                    <div class="filter__item">
                        <div class="filter__head"> Новинки <span class="icon-rotate"> <svg class="icon-arrow-rotate"
                                                                                           width="39px" height="39px"> <use
                                        xlink:href="<?php bloginfo('stylesheet_directory'); ?>/img/icons/sprites.svg#icon-arrow-rotate"></use> </svg> </span></div>
                        <div class="filter__body"><label class="checkbox-button checkbox-button--black"> <input
                                    type="checkbox" name="checkbox" required="" class="checkbox-button__input"> <span
                                    class="checkbox-button__text"> <span class="checkbox-button__status"></span> <span>Новинки</span> </span>
                            </label> <label class="checkbox-button checkbox-button--black"> <input type="checkbox"
                                                                                                   name="checkbox"
                                                                                                   required=""
                                                                                                   class="checkbox-button__input">
                                <span class="checkbox-button__text"> <span class="checkbox-button__status"></span> <span>Скоро в продаже</span> </span>
                            </label></div>
                    </div>
                    <div class="filter__item">
                        <div class="filter__button"><a href="#"
                                                       class="button button--medium button--yellow clear-filter">Сбросить
                                фильтры</a></div>
                        <div class="filter__button"><a href="#header"
                                                       class="button button--medium button--white scrollToId">Наверх</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product">
                <div class="product__category">

                    <div class="product__heading">
                        <h3 class="h4-style">
                            <img class="icon-heading" src="<?php bloginfo('stylesheet_directory'); ?>/img/icons/icon-cl.svg" alt="">
                            Кислица
                        </h3>
                    </div>
                    <div class="product__wrapper">
                        <?php if ( have_posts() ) { while ( have_posts() ) { the_post(); ?>

                            <div class="product__item">
                                <div class="product__top">
                                    <span class="product__label">Новинка</span>
                                    <a href="<?php the_permalink(); ?>" class="product__image">
                                        <img src="<?php bloginfo('stylesheet_directory'); ?>/img/product/product-1.png" alt="<?php the_title(); ?>">
                                    </a>
                                </div>
                                <div class="product__bottom">
                                    <div class="product__article">Арт. 00000</div>
                                    <a href="<?php the_permalink(); ?>" class="product__name"><?php the_title(); ?></a>
                                </div>
                            </div>

                        <?php } } else { ?>
                            <p>Записей нет.</p>
                        <?php } ?>
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
