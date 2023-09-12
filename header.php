<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta property="og:url" content="https://url/"/>
    <meta property="og:title" content="CandyBrands"/>
    <meta property="og:description" content=""/>
    <meta property="og:type" content="website"/>
    <link rel="canonical" href="https://url/"/>
    <link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/img/favicon/favicon.ico?b155d972" type="image/x-icon">
    <link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/img/favicon/apple-touch-icon.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/img/favicon/apple-touch-icon-72x72.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/img/favicon/apple-touch-icon-144x144.png" type="image/x-icon">
    <title>CandyBrands</title>
    <meta name="description" content="">
    <meta name="keywords" content=""/>

    <?php wp_head(); ?>

</head>
<body>
<header class="header" id="header">
    <div class="header__wrapper layout">
        <div class="header__menu">
            <?php my_nav_menu( [ 'theme_location'  => 'top' ] ); ?>
        </div>
        <div class="header__logo">
            <a class="logo" href="<?php echo get_home_url(); ?>">
                <img id="main-logo" src="<?php bloginfo('stylesheet_directory'); ?>/img/logo.svg" alt="CandyBrands">
                <span class="logo-icon">
                    <svg width="29" height="14" viewBox="0 0 29 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M26.3197 11.2828L22.4512 7.21574L26.3197 3.14868L28.235 4.95436L26.0858 7.21574L28.235 9.47712L26.3197 11.2828Z" fill="#FCAC10"/>
                        <path d="M2.24931 11.2828L0.333984 9.47712L2.48314 7.21574L0.333984 4.95436L2.24931 3.14868L6.11779 7.21574L2.24931 11.2828Z" fill="#FCAC10"/>
                        <path d="M14.2849 14C10.4096 14 7.25977 10.8581 7.25977 7C7.25977 3.14195 10.413 0 14.2849 0C18.1603 0 21.3101 3.14195 21.3101 7C21.3101 10.8581 18.1603 14 14.2849 14ZM14.2849 0.544791C10.7122 0.544791 7.80651 3.44004 7.80651 7C7.80651 10.56 10.7122 13.4552 14.2849 13.4552C17.8577 13.4552 20.7634 10.56 20.7634 7C20.7634 3.44004 17.8577 0.544791 14.2849 0.544791Z" fill="#FCAC10"/>
                        <path d="M14.2844 0.54126C14.0265 0.54126 13.7754 0.561818 13.5244 0.589228V13.4003C13.7754 13.4277 14.0265 13.4483 14.2844 13.4483C17.8606 13.4483 20.7628 10.5599 20.7628 6.99305C20.7628 3.42623 17.8606 0.54126 14.2844 0.54126Z" fill="#E5007E"/>
                    </svg>
                </span>
            </a>
        </div>
        <div class="header__search">
            <div class="search">
                <svg class="icon-search" width="16px" height="16px">
                    <use xlink:href="<?php bloginfo('stylesheet_directory'); ?>/img/icons/sprites.svg#icon-search"></use>
                </svg>
            </div>
            <?php
                $load_link = get_field('load_catalog', 'options' );
                if( $load_link !== "" ):
            ?>
            <div class="download-katalog">
                <a href="<?php echo get_field('load_catalog_link', 'options' ); ?>" class="download-katalog__link" download>
                    <svg class="icon-download" width="18px" height="18px">
                        <use xlink:href="<?php bloginfo('stylesheet_directory'); ?>/img/icons/sprites.svg#icon-download"></use>
                    </svg>
                    <?php echo get_field('load_catalog', 'options' ); ?>
                </a>
            </div>
            <?php endif; ?>
        </div>
        <div class="header__burger">
            <span class="header__burger--open"> <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg"> <rect width="20" height="2" rx="1" fill="#FCAC10"/> <rect y="7" width="20" height="2" rx="1" fill="#FCAC10"/>
                    <rect y="14" width="20" height="2" rx="1" fill="#FCAC10"/>
                </svg>
            </span>
            <span class="header__burger--close">
                <svg class="icon-close2" width="20px" height="20px">
                    <use xlink:href="<?php bloginfo('stylesheet_directory'); ?>/img/icons/sprites.svg#icon-close2"></use>
                </svg>
            </span>
        </div>
    </div>
    <div class="mobile-menu">
        <div class="layout">
            <div class="mobile-menu__wrapper">
                <div class="mobile-menu__item">
                    <h4>Каталог</h4>
                    <ul class="mobile-menu__list">
                        <li><a href="/new">Новинки</a></li>
                        <li><a href="/new">Ассортимент</a></li>
                    </ul>
                </div>
                <div class="mobile-menu__item"><h4>Мы</h4>
                    <ul class="mobile-menu__list">
                        <li><a href="/promo">Промо ролик</a></li>
                        <li><a href="/about">О нас</a></li>
                        <li><a href="/">Контакты</a></li>
                    </ul>
                </div>
                <div class="mobile-menu__item"><h4>Купить</h4>
                    <ul class="mobile-menu__list">
                        <li><a href="/">Сотрудничество</a></li>
                        <li><a href="/">Wildberries</a></li>
                    </ul>
                </div>
            </div>
            <div class="mobile-menu__info header__search">
                <div class="search">
                    <form action="" class="search__form">
                        <div class="search__form-item">
                            <input class="search__form-input" type="text" placeholder="Поиск...">
                            <button class="search__form-button">
                                <svg class="icon-search" width="16px" height="16px">
                                    <use xlink:href="<?php bloginfo('stylesheet_directory'); ?>/img/icons/sprites.svg#icon-search"></use>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
                <?php
                $load_link = get_field('load_catalog', 'options' );
                if( $load_link !== "" ):
                    ?>
                    <div class="download-katalog">
                        <a href="<?php echo get_field('load_catalog_link', 'options' ); ?>" class="download-katalog__link" download>
                            <svg class="icon-download" width="18px" height="18px">
                                <use xlink:href="<?php bloginfo('stylesheet_directory'); ?>/img/icons/sprites.svg#icon-download"></use>
                            </svg>
                            <?php echo get_field('load_catalog', 'options' ); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>
