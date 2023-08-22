<?php get_header(); ?>

<main>
    <?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
    <div class="product-preview">
        <div class="product-preview__head layout">
            <h1 class="h4-style">
                <?php the_title(); ?>
            </h1>
        </div>
        <div class="product-preview__wrapper layout">
            <div class="product-preview__slide-wrapper">
                <div class="product-preview__nav">
                    <div class="product-preview__slide-item"><img src="/img/product-preview/product-preview-1.png"
                                                                  alt=""></div>
                    <div class="product-preview__slide-item"><img src="/img/product-preview/product-preview-1.png"
                                                                  alt=""></div>
                    <div class="product-preview__slide-item"><img src="/img/product-preview/product-preview-1.png"
                                                                  alt=""></div>
                    <div class="product-preview__slide-item"><img src="/img/product-preview/product-preview-1.png"
                                                                  alt=""></div>
                    <div class="product-preview__slide-item"><img src="/img/product-preview/product-preview-1.png"
                                                                  alt=""></div>
                    <div class="product-preview__slide-item"><img src="/img/product-preview/product-preview-1.png"
                                                                  alt=""></div>
                </div>
                <div class="product-preview__slide-main">
                    <div class="product-preview__slide">
                        <div class="product-preview__slide-item"><span class="product-preview__label">Новинка</span>
                            <img src="/img/product-preview/product-preview-1.png" alt=""></div>
                        <div class="product-preview__slide-item"><img src="/img/product-preview/product-preview-1.png"
                                                                      alt=""></div>
                        <div class="product-preview__slide-item"><span class="product-preview__label">Новинка</span>
                            <img src="/img/product-preview/product-preview-1.png" alt=""></div>
                        <div class="product-preview__slide-item"><img src="/img/product-preview/product-preview-1.png"
                                                                      alt=""></div>
                        <div class="product-preview__slide-item"><span class="product-preview__label">Новинка</span>
                            <img src="/img/product-preview/product-preview-1.png" alt=""></div>
                        <div class="product-preview__slide-item"><img src="/img/product-preview/product-preview-1.png"
                                                                      alt=""></div>
                    </div>
                </div>
                <div class="product-preview__info">
                    <div class="product-preview__info-item">
                        <div class="product-preview__info-img"><img
                                src="/img/product-preview/product-preview-info-1.png" alt=""></div>
                        <span> Производитель: Китай </span></div>
                    <div class="product-preview__info-item">
                        <div class="product-preview__info-img"><img
                                src="/img/product-preview/product-preview-info-2.png" alt=""></div>
                        <span> Натуральные красители </span></div>
                </div>
            </div>
            <div class="product-preview__description">
                <div class="product-preview__description-head"><p>Наименование бренда</p>
                    <h1 class="h4-style">
                        <?php the_title(); ?>
                    </h1>
                </div>
                <div class="product-preview__description-code">Арт. 000FF</div>
                <dl class="product-preview__desc">
                    <dt>Описание</dt>
                    <dd>
                        <?php the_content(); ?>
                    </dd>
                    <a href="#" class="product-preview__desc-open"> Развернуть
                        <svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.645 0.0216675L7 5.365L12.355 0.0216675L14 1.66667L7 8.66667L0 1.66667L1.645 0.0216675Z"
                                  fill="#05020C"/>
                        </svg>
                    </a>
                </dl>
                <ul class="product-preview__characteristic">
                    <li><strong>Вес:</strong> <span>20 г</span></li>
                    <li><strong>Вложение:</strong> <span>1 х 20 х 300</span></li>
                    <li><strong>Вкус(ы):</strong> <span>клубника, малина, апельсин, мандарин, ежевика, клубника</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="new-products new-products--similar">
        <div class="layout">
            <div class="new-products__heading"><h2 class="h2-style"><img class="icon-heading"
                                                                         src="/img/icons/icon-cl.svg" alt=""> Похожие
                    товары </h2>
                <div class="new-products__navigation"></div>
            </div>
            <div class="new-products__slider">
                <div class="new-products__item">
                    <div class="new-products__top"><a href="#" class="new-products__preview"
                                                      style="background-color:#afe7f3">
                            <picture>
                                <source type="image/png"
                                        srcset="/img/new-products/new-products-1-1x.png, /img/new-products/new-products-1-3x.png 3x">
                                <img src="/img/new-products/new-products-1-3x.png" width="305" alt="Candy Preview">
                            </picture>
                            <span class="new-products__arrow"> <svg class="icon-arrow-rotate" width="39px" height="39px"> <use
                                        xlink:href="/img/icons/sprites.svg#icon-arrow-rotate"></use> </svg> </span> </a> <span
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
                                        srcset="/img/new-products/new-products-2-3x.png, /img/new-products/new-products-2-3x.png 3x">
                                <img src="/img/new-products/new-products-2-3x.png" width="305" alt="Candy Preview">
                            </picture>
                            <span class="new-products__arrow"> <svg class="icon-arrow-rotate" width="39px" height="39px"> <use
                                        xlink:href="/img/icons/sprites.svg#icon-arrow-rotate"></use> </svg> </span> </a></div>
                    <div class="new-products__bottom"><p class="new-products__cat">Crazy Zombie</p> <a href=""
                                                                                                       class="new-products__title brodway-font">
                            Жевательный мармелад </a></div>
                </div>
                <div class="new-products__item">
                    <div class="new-products__top"><a href="#" class="new-products__preview"
                                                      style="background-color:#d5c2ff">
                            <picture>
                                <source type="image/png"
                                        srcset="/img/new-products/new-products-1-3x.png, /img/new-products/new-products-1-3x.png 3x">
                                <img src="/img/new-products/new-products-1-3x.png" width="305" alt="Candy Preview">
                            </picture>
                            <span class="new-products__arrow"> <svg class="icon-arrow-rotate" width="39px" height="39px"> <use
                                        xlink:href="/img/icons/sprites.svg#icon-arrow-rotate"></use> </svg> </span> </a></div>
                    <div class="new-products__bottom"><p class="new-products__cat">Crazy Zombie</p> <a href=""
                                                                                                       class="new-products__title brodway-font">
                            Жевательный мармелад </a></div>
                </div>
                <div class="new-products__item">
                    <div class="new-products__top"><a href="#" class="new-products__preview"
                                                      style="background-color:#fdc3e3">
                            <picture>
                                <source type="image/png"
                                        srcset="/img/new-products/new-products-2-3x.png, /img/new-products/new-products-2-3x.png 3x">
                                <img src="/img/new-products/new-products-2-3x.png" width="305" alt="Candy Preview">
                            </picture>
                            <span class="new-products__arrow"> <svg class="icon-arrow-rotate" width="39px" height="39px"> <use
                                        xlink:href="/img/icons/sprites.svg#icon-arrow-rotate"></use> </svg> </span> </a> <span
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
                                        srcset="/img/new-products/new-products-1-1x.png, /img/new-products/new-products-1-3x.png 3x">
                                <img src="/img/new-products/new-products-1-3x.png" width="305" alt="Candy Preview">
                            </picture>
                            <span class="new-products__arrow"> <svg class="icon-arrow-rotate" width="39px" height="39px"> <use
                                        xlink:href="/img/icons/sprites.svg#icon-arrow-rotate"></use> </svg> </span> </a> <span
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
                                        srcset="/img/new-products/new-products-2-3x.png, /img/new-products/new-products-2-3x.png 3x">
                                <img src="/img/new-products/new-products-2-3x.png" width="305" alt="Candy Preview">
                            </picture>
                            <span class="new-products__arrow"> <svg class="icon-arrow-rotate" width="39px" height="39px"> <use
                                        xlink:href="/img/icons/sprites.svg#icon-arrow-rotate"></use> </svg> </span> </a></div>
                    <div class="new-products__bottom"><p class="new-products__cat">Crazy Zombie</p> <a href=""
                                                                                                       class="new-products__title brodway-font">
                            Жевательный мармелад </a></div>
                </div>
                <div class="new-products__item">
                    <div class="new-products__top"><a href="#" class="new-products__preview"
                                                      style="background-color:#d5c2ff">
                            <picture>
                                <source type="image/png"
                                        srcset="/img/new-products/new-products-1-3x.png, /img/new-products/new-products-1-3x.png 3x">
                                <img src="/img/new-products/new-products-1-3x.png" width="305" alt="Candy Preview">
                            </picture>
                            <span class="new-products__arrow"> <svg class="icon-arrow-rotate" width="39px" height="39px"> <use
                                        xlink:href="/img/icons/sprites.svg#icon-arrow-rotate"></use> </svg> </span> </a></div>
                    <div class="new-products__bottom"><p class="new-products__cat">Crazy Zombie</p> <a href=""
                                                                                                       class="new-products__title brodway-font">
                            Жевательный мармелад </a></div>
                </div>
                <div class="new-products__item">
                    <div class="new-products__top"><a href="#" class="new-products__preview"
                                                      style="background-color:#fdc3e3">
                            <picture>
                                <source type="image/png"
                                        srcset="/img/new-products/new-products-2-3x.png, /img/new-products/new-products-2-3x.png 3x">
                                <img src="/img/new-products/new-products-2-3x.png" width="305" alt="Candy Preview">
                            </picture>
                            <span class="new-products__arrow"> <svg class="icon-arrow-rotate" width="39px" height="39px"> <use
                                        xlink:href="/img/icons/sprites.svg#icon-arrow-rotate"></use> </svg> </span> </a> <span
                            class="new-products__label">Скоро в продаже</span></div>
                    <div class="new-products__bottom"><p class="new-products__cat">Crazy Zombie</p> <a href=""
                                                                                                       class="new-products__title brodway-font">
                            Карамель на палочке с шипучкой </a></div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
