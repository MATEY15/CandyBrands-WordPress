<?php
/*
Template Name: Home Page
*/
?>
<?php get_header(); ?>

<main>
    <div class="candy-preview">
        <div class="candy-preview__wrapper layout">
            <div class="candy-preview__image-wrapper">
                <div class="candy-preview__image">
                    <picture>
                        <source type="image/png" media="(max-width: 480px)"
                                srcset="<?php echo get_field('image__preview_1x_mobile'); ?> 1x, <?php echo get_field('image__preview_3x_mobile'); ?> 3x">
                        <source type="image/png"
                                srcset="<?php echo get_field('image__preview_1x'); ?>, <?php echo get_field('image__preview_3x'); ?> 3x">
                        <img src="<?php echo get_field('image__preview_3x'); ?>" width="1172" alt="Candy Preview" class="candy-preview__img"></picture>
                </div>
            </div>
            <div class="candy-preview__content">
                <h1>
                    <?php echo get_field('title_preview'); ?>
                </h1>
                <p>
                    <?php echo get_field('description_preview'); ?>
                </p>
                <a href="<?php echo get_field('link-button___preview'); ?>" class="button button--medium button--yellow"><?php echo get_field('button___preview'); ?></a>
            </div>
        </div>
    </div>
    <div class="new-products">
        <div class="layout">
            <div class="new-products__heading"><h2 class="h2-style"><img class="icon-heading"
                                                                         src="<?php echo bloginfo('stylesheet_directory'); ?>/img/icons/icon-cl.svg" alt=""> Новинки
                </h2>
                <div class="new-products__navigation"></div>
            </div>
            <div class="new-products__slider">
                <div class="new-products__item">
                    <div class="new-products__top"><a href="#" class="new-products__preview"
                                                      style="background-color:#afe7f3">
                            <picture>
                                <source type="image/png"
                                        srcset="<?php echo bloginfo('stylesheet_directory'); ?>/img/new-products/new-products-1-1x.png, <?php echo bloginfo('stylesheet_directory'); ?>/img/new-products/new-products-1-3x.png 3x">
                                <img src="<?php echo bloginfo('stylesheet_directory'); ?>/img/new-products/new-products-1-3x.png" width="305" alt="Candy Preview">
                            </picture>
                            <span class="new-products__arrow"> <svg class="icon-arrow-rotate" width="39px" height="39px"> <use
                                        xlink:href="<?php echo bloginfo('stylesheet_directory'); ?>/img/icons/sprites.svg#icon-arrow-rotate"></use> </svg> </span> </a> <span
                            class="new-products__label">Новинка</span></div>
                    <div class="new-products__bottom"><p class="new-products__cat">Crazy Zombie</p> <a href=""
                                                                                                       class="new-products__title brodway-font">
                            Карамель на палочке с шипучкой </a></div>
                </div>
                <div class="new-products__item">
                    <div class="new-products__top"><a href="#" class="new-products__preview"
                                                      style="background-color:#ffd78a">
                            <picture>
                                <source type="image/png"
                                        srcset="<?php echo bloginfo('stylesheet_directory'); ?>/img/new-products/new-products-2-3x.png, <?php echo bloginfo('stylesheet_directory'); ?>/img/new-products/new-products-2-3x.png 3x">
                                <img src="<?php echo bloginfo('stylesheet_directory'); ?>/img/new-products/new-products-2-3x.png" width="305" alt="Candy Preview">
                            </picture>
                            <span class="new-products__arrow"> <svg class="icon-arrow-rotate" width="39px" height="39px"> <use
                                        xlink:href="<?php echo bloginfo('stylesheet_directory'); ?>/img/icons/sprites.svg#icon-arrow-rotate"></use> </svg> </span> </a></div>
                    <div class="new-products__bottom"><p class="new-products__cat">Crazy Zombie</p> <a href=""
                                                                                                       class="new-products__title brodway-font">
                            Жевательный мармелад </a></div>
                </div>
                <div class="new-products__item">
                    <div class="new-products__top"><a href="#" class="new-products__preview"
                                                      style="background-color:#d5c2ff">
                            <picture>
                                <source type="image/png"
                                        srcset="<?php echo bloginfo('stylesheet_directory'); ?>/img/new-products/new-products-1-3x.png, <?php echo bloginfo('stylesheet_directory'); ?>/img/new-products/new-products-1-3x.png 3x">
                                <img src="<?php echo bloginfo('stylesheet_directory'); ?>/img/new-products/new-products-1-3x.png" width="305" alt="Candy Preview">
                            </picture>
                            <span class="new-products__arrow"> <svg class="icon-arrow-rotate" width="39px" height="39px"> <use
                                        xlink:href="<?php echo bloginfo('stylesheet_directory'); ?>/img/icons/sprites.svg#icon-arrow-rotate"></use> </svg> </span> </a></div>
                    <div class="new-products__bottom"><p class="new-products__cat">Crazy Zombie</p> <a href=""
                                                                                                       class="new-products__title brodway-font">
                            Жевательный мармелад </a></div>
                </div>
                <div class="new-products__item">
                    <div class="new-products__top"><a href="#" class="new-products__preview"
                                                      style="background-color:#fdc3e3">
                            <picture>
                                <source type="image/png"
                                        srcset="<?php echo bloginfo('stylesheet_directory'); ?>/img/new-products/new-products-2-3x.png, <?php echo bloginfo('stylesheet_directory'); ?>/img/new-products/new-products-2-3x.png 3x">
                                <img src="<?php echo bloginfo('stylesheet_directory'); ?>/img/new-products/new-products-2-3x.png" width="305" alt="Candy Preview">
                            </picture>
                            <span class="new-products__arrow"> <svg class="icon-arrow-rotate" width="39px" height="39px"> <use
                                        xlink:href="<?php echo bloginfo('stylesheet_directory'); ?>/img/icons/sprites.svg#icon-arrow-rotate"></use> </svg> </span> </a> <span
                            class="new-products__label">Скоро в продаже</span></div>
                    <div class="new-products__bottom"><p class="new-products__cat">Crazy Zombie</p> <a href=""
                                                                                                       class="new-products__title brodway-font">
                            Карамель на палочке с шипучкой </a></div>
                </div>
                <div class="new-products__item">
                    <div class="new-products__top"><a href="#" class="new-products__preview"
                                                      style="background-color:#afe7f3">
                            <picture>
                                <source type="image/png"
                                        srcset="<?php echo bloginfo('stylesheet_directory'); ?>/img/new-products/new-products-1-1x.png, <?php echo bloginfo('stylesheet_directory'); ?>/img/new-products/new-products-1-3x.png 3x">
                                <img src="<?php echo bloginfo('stylesheet_directory'); ?>/img/new-products/new-products-1-3x.png" width="305" alt="Candy Preview">
                            </picture>
                            <span class="new-products__arrow"> <svg class="icon-arrow-rotate" width="39px" height="39px"> <use
                                        xlink:href="<?php echo bloginfo('stylesheet_directory'); ?>/img/icons/sprites.svg#icon-arrow-rotate"></use> </svg> </span> </a> <span
                            class="new-products__label">Новинка</span></div>
                    <div class="new-products__bottom"><p class="new-products__cat">Crazy Zombie</p> <a href=""
                                                                                                       class="new-products__title brodway-font">
                            Карамель на палочке с шипучкой </a></div>
                </div>
                <div class="new-products__item">
                    <div class="new-products__top"><a href="#" class="new-products__preview"
                                                      style="background-color:#ffd78a">
                            <picture>
                                <source type="image/png"
                                        srcset="<?php echo bloginfo('stylesheet_directory'); ?>/img/new-products/new-products-2-3x.png, <?php echo bloginfo('stylesheet_directory'); ?>/img/new-products/new-products-2-3x.png 3x">
                                <img src="<?php echo bloginfo('stylesheet_directory'); ?>/img/new-products/new-products-2-3x.png" width="305" alt="Candy Preview">
                            </picture>
                            <span class="new-products__arrow"> <svg class="icon-arrow-rotate" width="39px" height="39px"> <use
                                        xlink:href="<?php echo bloginfo('stylesheet_directory'); ?>/img/icons/sprites.svg#icon-arrow-rotate"></use> </svg> </span> </a></div>
                    <div class="new-products__bottom"><p class="new-products__cat">Crazy Zombie</p> <a href=""
                                                                                                       class="new-products__title brodway-font">
                            Жевательный мармелад </a></div>
                </div>
                <div class="new-products__item">
                    <div class="new-products__top"><a href="#" class="new-products__preview"
                                                      style="background-color:#d5c2ff">
                            <picture>
                                <source type="image/png"
                                        srcset="<?php echo bloginfo('stylesheet_directory'); ?>/img/new-products/new-products-1-3x.png, <?php echo bloginfo('stylesheet_directory'); ?>/img/new-products/new-products-1-3x.png 3x">
                                <img src="<?php echo bloginfo('stylesheet_directory'); ?>/img/new-products/new-products-1-3x.png" width="305" alt="Candy Preview">
                            </picture>
                            <span class="new-products__arrow"> <svg class="icon-arrow-rotate" width="39px" height="39px"> <use
                                        xlink:href="<?php echo bloginfo('stylesheet_directory'); ?>/img/icons/sprites.svg#icon-arrow-rotate"></use> </svg> </span> </a></div>
                    <div class="new-products__bottom"><p class="new-products__cat">Crazy Zombie</p> <a href=""
                                                                                                       class="new-products__title brodway-font">
                            Жевательный мармелад </a></div>
                </div>
                <div class="new-products__item">
                    <div class="new-products__top"><a href="#" class="new-products__preview"
                                                      style="background-color:#fdc3e3">
                            <picture>
                                <source type="image/png"
                                        srcset="<?php echo bloginfo('stylesheet_directory'); ?>/img/new-products/new-products-2-3x.png, <?php echo bloginfo('stylesheet_directory'); ?>/img/new-products/new-products-2-3x.png 3x">
                                <img src="<?php echo bloginfo('stylesheet_directory'); ?>/img/new-products/new-products-2-3x.png" width="305" alt="Candy Preview">
                            </picture>
                            <span class="new-products__arrow"> <svg class="icon-arrow-rotate" width="39px" height="39px"> <use
                                        xlink:href="<?php echo bloginfo('stylesheet_directory'); ?>/img/icons/sprites.svg#icon-arrow-rotate"></use> </svg> </span> </a> <span
                            class="new-products__label">Скоро в продаже</span></div>
                    <div class="new-products__bottom"><p class="new-products__cat">Crazy Zombie</p> <a href=""
                                                                                                       class="new-products__title brodway-font">
                            Карамель на палочке с шипучкой </a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="new-generation">
        <div class="new-generation__wrapper layout">
            <div class="new-generation__content">
                <h2 class="h2-style">
                    <img class="icon-heading" src="<?php echo bloginfo('stylesheet_directory'); ?>/img/icons/icon-cl.svg" alt="">
                    <?php echo get_field('novoye_pokoleniye_title'); ?>
                </h2>
                <div class="new-generation__content-text">
                    <div class="image-border new-generation__image">
                        <div class="image-border__wrapper">
                            <picture>
                                <source type="image/png" srcset="<?php echo get_field('novoye_pokoleniye_image-1x'); ?> 1x, <?php echo get_field('novoye_pokoleniye_image-3x'); ?> 3x">
                                <img src="<?php echo get_field('novoye_pokoleniye_image-3x'); ?>" width="503" alt="<?php echo get_field('novoye_pokoleniye_title'); ?>">
                            </picture>
                        </div>
                    </div>
                    <div class="new-generation__tagline">
                        <p>
                            <?php echo get_field('novoye_pokoleniye_desc'); ?>
                        </p>
                    </div>
                </div>
                <div class="new-generation__description brodway-font">
                    <p class="">
                        <?php echo get_field('novoye_pokoleniye_quote'); ?>
                    </p>
                </div>
            </div>
            <div class="image-border new-generation__image">
                <div class="image-border__wrapper">
                    <picture>
                        <source type="image/png" srcset="<?php echo get_field('novoye_pokoleniye_image-1x'); ?> 1x, <?php echo get_field('novoye_pokoleniye_image-3x'); ?> 3x">
                        <img src="<?php echo get_field('novoye_pokoleniye_image-3x'); ?>" width="503" alt="<?php echo get_field('novoye_pokoleniye_title'); ?>">
                    </picture>
                </div>
            </div>
        </div>
    </div>
    <?php if( get_field('video_if_show') ): ?>
    <div class="video-preview">
        <div class="video-preview__marquee" data-slide="left">
            <div class="video-preview__marquee-item brodway-font">
                <span>
                    <img class="icon-marquee" src="<?php echo bloginfo('stylesheet_directory'); ?>/img/icons/icon-cl.svg" alt="">
                    Кислица
                </span>
                <span>
                    <img class="icon-marquee" src="<?php echo bloginfo('stylesheet_directory'); ?>/img/icons/icon-cl.svg" alt="">
                    Candy with hype
                </span>
                <span>
                    <img class="icon-marquee" src="<?php echo bloginfo('stylesheet_directory'); ?>/img/icons/icon-cl.svg" alt="">
                    Кислица
                </span>
                <span>
                    <img class="icon-marquee" src="<?php echo bloginfo('stylesheet_directory'); ?>/img/icons/icon-cl.svg" alt="">
                    Candy with hype
                </span>
                <span>
                    <img class="icon-marquee" src="<?php echo bloginfo('stylesheet_directory'); ?>/img/icons/icon-cl.svg" alt="">
                    Кислица
                </span>
                <span>
                    <img class="icon-marquee" src="<?php echo bloginfo('stylesheet_directory'); ?>/img/icons/icon-cl.svg" alt="">
                    Candy with hype
                </span>
            </div>
        </div>
        <div class="video-preview__wrapper layout">
            <div class="video-preview__present">
                <div class="video-preview__main-wrapper"><a href="#" class="video-preview__main-close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                            <path d="M12.8 38L10 35.2L21.2 24L10 12.8L12.8 10L24 21.2L35.2 10L38 12.8L26.8 24L38 35.2L35.2 38L24 26.8L12.8 38Z" fill="#ffffff"></path>
                        </svg>
                    </a>
                    <video class="video-preview__main" controls preload="auto" width="100%" height="100%">
                        <source src="<?php echo get_field('video_file'); ?>"/>
                    </video>
                </div>
                <div class="video-preview__present-image">
                    <picture>
                        <source type="image/png" srcset="<?php echo get_field('video_baner_1x'); ?> 1x, <?php echo get_field('video_baner_3x'); ?> 3x">
                        <img src="<?php echo get_field('video_baner_3x'); ?>" width="1280" alt="Candy Preview">
                    </picture>
                </div>
                <div class="video-preview__button-wrapper"><a href="#" class="video-popup video-preview__button"> <span> <svg
                                width="61" height="60" viewBox="0 0 61 60" fill="none" xmlns="http://www.w3.org/2000/svg"> <path
                                    d="M30.5 10L26.975 13.525L40.925 27.5H10.5V32.5H40.925L26.975 46.475L30.5 50L50.5 30L30.5 10Z"
                                    fill="#05020C"/> </svg> </span> </a></div>
            </div>
        </div>
        <div id="video-popup" class="video-popup-block mfp-hide">
            <video controls preload="auto" width="100%" height="100%">
                <source src="/video/video.mp4?31c04c69"/>
            </video>
        </div>
        <div class="video-preview__marquee" data-slide="right">
            <div class="video-preview__marquee-item brodway-font"><span> <img class="icon-marquee"
                                                                              src="<?php echo bloginfo('stylesheet_directory'); ?>/img/icons/icon-cl.svg" alt=""> Кислица </span>
                <span> <img class="icon-marquee" src="<?php echo bloginfo('stylesheet_directory'); ?>/img/icons/icon-cl.svg" alt=""> Candy with hype </span>
                <span> <img class="icon-marquee" src="<?php echo bloginfo('stylesheet_directory'); ?>/img/icons/icon-cl.svg" alt=""> Кислица </span> <span> <img
                        class="icon-marquee" src="<?php echo bloginfo('stylesheet_directory'); ?>/img/icons/icon-cl.svg" alt=""> Candy with hype </span> <span> <img
                        class="icon-marquee" src="<?php echo bloginfo('stylesheet_directory'); ?>/img/icons/icon-cl.svg" alt=""> Кислица </span> <span> <img
                        class="icon-marquee" src="<?php echo bloginfo('stylesheet_directory'); ?>/img/icons/icon-cl.svg" alt=""> Candy with hype </span></div>
        </div>
    </div>
    <?php endif; ?>

    <?php if( get_field('about_if_show') ): ?>
    <div class="about">
        <div class="about__wrapper layout">
            <div class="image-border image-border--left about__image">
                <div class="image-border__wrapper">
                    <picture>
                        <source type="image/png" srcset="<?php echo get_field('about_image_1x'); ?> 1x, <?php echo get_field('about_image_3x'); ?> 3x">
                        <img src="<?php echo get_field('about_image_3x'); ?>" width="502" alt="<?php echo get_field('about_title'); ?>">
                    </picture>
                </div>
            </div>
            <div class="about__content">
                <h3 class="h2-style">
                    <img class="icon-heading" src="<?php echo bloginfo('stylesheet_directory'); ?>/img/icons/icon-cl.svg" alt="">
                    <?php echo get_field('about_title'); ?>
                </h3>
                <div class="about__content-text">
                    <?php echo get_field('about_desc'); ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if( get_field('brands_if_show') ): ?>
    <div class="brands">
        <div class="layout">
            <div class="brands__heading">
                <h3 class="h2-style"><?php echo get_field('brands_title'); ?></h3>
            </div>
            <div class="brands__wrapper">

                <?php  if( have_rows('brands_reapet') ): ?>
                    <?php while ( have_rows('brands_reapet') ) : the_row(); ?>

                        <?php
                            $link = get_sub_field('brands_link');
                        ?>

                        <?php  if( $link ): ?>
                            <a href="<?php the_sub_field('brands_link'); ?>" target="_blank" class="brands__item">
                                <picture>
                                    <source type="image/png" srcset="<?php the_sub_field('brands_image_1x'); ?> 1x, <?php the_sub_field('brands_image_3x'); ?> 3x">
                                    <img src="<?php the_sub_field('brands_image_3x'); ?>" width="198" alt="<?php the_sub_field('brands_alt'); ?>">
                                </picture>
                            </a>
                        <?php else: ?>
                            <span class="brands__item">
                                <picture>
                                    <source type="image/png" srcset="<?php the_sub_field('brands_image_1x'); ?> 1x, <?php the_sub_field('brands_image_3x'); ?> 3x">
                                    <img src="<?php the_sub_field('brands_image_3x'); ?>" width="198" alt="<?php the_sub_field('brands_alt'); ?>">
                                </picture>
                            </span>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if( get_field('question_if_show') ): ?>
    <div class="question">
        <div class="layout">
            <div class="question__heading">
                <h3 class="h2-style">
                    <img class="icon-heading" src="<?php echo bloginfo('stylesheet_directory'); ?>/img/icons/icon-cl.svg" alt="">
                    <?php echo get_field('question_title'); ?>
                </h3>
            </div>
            <div class="question__wrapper">

                <?php  if( have_rows('question_repeat') ): ?>
                    <?php while ( have_rows('question_repeat') ) : the_row(); ?>
                    <div class="accordion__item">
                        <div class="accordion__title">
                            <?php the_sub_field('question_what'); ?>
                            <span class="icon-rotate">
                                <svg class="icon-arrow-rotate" width="39px" height="39px">
                                    <use xlink:href="<?php echo bloginfo('stylesheet_directory'); ?>/img/icons/sprites.svg#icon-arrow-rotate"></use>
                                </svg>
                            </span>
                        </div>
                        <div class="accordion__description">
                            <p><?php the_sub_field('question_mess'); ?></p>
                        </div>
                    </div>
                    <?php endwhile; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if( get_field('casecart_if_show') ): ?>
    <div class="case-cart">
        <div class="case-cart__wrapper layout">

            <?php  if( have_rows('casecart_add_row') ): ?>
                <?php while ( have_rows('casecart_add_row') ) : the_row(); ?>

                <div class="case-cart__item">

                    <?php  if( have_rows('casecart_add_item') ): ?>
                        <?php while ( have_rows('casecart_add_item') ) : the_row(); ?>
                            <?php
                                $color = get_sub_field('casecart_style');
                                $height = get_sub_field('casecart_block_big');
                            ?>
                    <a href="<?php the_sub_field('casecart_link'); ?>"
                       class="case-cart__preview <?php  if( $color === 'black' ): ?>case-cart__preview--cblack<?php else: ?>case-cart__preview--cwhite<?php endif; ?> <?php  if( $height ): ?>case-cart__preview--big<?php endif; ?>"
                       style="
                               background-image: url(<?php the_sub_field('casecart_image'); ?>);
                               background-color: <?php the_sub_field('casecart_color'); ?>;
                               "
                    >
                        <span class="icon-rotate"> <svg class="icon-arrow-rotate" width="39px" height="39px">
                                <use xlink:href="<?php echo bloginfo('stylesheet_directory'); ?>/img/icons/sprites.svg#icon-arrow-rotate"></use>
                            </svg>
                        </span>
                        <p class="case-cart__sub-title"><?php the_sub_field('casecart_sub_title'); ?></p>
                        <h4 class="case-cart__title"><?php the_sub_field('casecart_title'); ?></h4>
                    </a>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

    <div class="contact">
        <div class="contact__wrapper layout">
            <div class="contact__content">
                <div class="contact__heading"><h3 class="h2-style"><img class="icon-heading"
                                                                        src="<?php echo bloginfo('stylesheet_directory'); ?>/img/icons/icon-cl.svg" alt=""> Контакты
                    </h3></div>
                <p> Воспользуйтесь формой обратной связи на экране справа, если хотите </p>
                <ul>
                    <li>задать вопрос</li>
                    <li>оставить отзыв о нашей работе и продукции</li>
                    <li>направить предложение.</li>
                </ul>
                <p> Или свяжитесь с нами любым удобным вам способом: </p>
                <div class="contact__main">
                    <div class="contact__main-item"><h5>Почта</h5> <a href="mailto:">feedback@candybrands.ru</a></div>
                    <div class="contact__main-item"><h5>Телефон</h5> <a href="tel:+7 (499) 302-17-73">+7 (499)
                            302-17-73</a></div>
                    <div class="contact__main-item"><h5>Адрес</h5>
                        <p> г. Москва, ул. Бутлерова 17 <br> м. Калужская, БЦ "Neo Geo" </p></div>
                    <div class="contact__main-item"><h5>Реквизиты</h5>
                        <p> Ознакомиться с реквизитами компании <br> можно, нажав на кнопку <br> ниже: </p></div>
                    <a href="#" class="button button--medium button--white">Скачать реквизиты</a></div>
            </div>
            <div class="contact__call">
                <div class="contact__call-heading"><h4 class="h4-style">Свяжитесь со мной</h4>
                    <p> Оставьте свои контакты и мы свяжемся с Вами <br>в течение 3-х рабочих дней </p></div>
                <form action="" class="contact__form">
                    <div class="contact__form-item input-wrapper"><label>Имя</label> <input name="name" type="text"
                                                                                            placeholder="Например, Иван">
                    </div>
                    <div class="contact__form-item input-wrapper"><label>Телефон</label> <input name="phone" type="tel"
                                                                                                placeholder="+7 (999) 999-99-99">
                    </div>
                    <div class="contact__form-item input-wrapper"><label>Почта</label> <input name="email" type="email"
                                                                                              placeholder="email.test@mail.ru">
                        <div class="input-wrapper__error">Не корректный телефон</div>
                    </div>
                    <div class="contact__form-item input-wrapper"><label>Комментарий</label> <textarea type="text"
                                                                                                       placeholder="Напишите дополнительные комментарии"></textarea>
                    </div>
                    <div class="contact__form-button">
                        <button class="button button--medium button--yellow">Отправить</button>
                    </div>
                    <label class="checkbox-button"> <input type="checkbox" name="checkbox" required=""
                                                           class="checkbox-button__input"> <span
                            class="checkbox-button__text"> <span class="checkbox-button__status"></span> <span> Я соглашаюсь с <a
                                    href="#">условиями</a> и даю свое <a href="#">согласие на&nbsp;обработку</a> персональных данных </span> </span>
                    </label></form>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
