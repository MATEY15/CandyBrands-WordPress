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
                    <?php

                    if( have_rows('product_repeat_images') ): ?>
                        <?php while ( have_rows('product_repeat_images') ) : the_row(); ?>
                            <div class="product-preview__slide-item">
                                <img src="<?php the_sub_field('product_repeat_image'); ?>" alt="">
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="product-preview__slide-main">
                    <span class="product-preview__label">Новинка</span>
                    <div class="product-preview__slide">
                        <?php

                        if( have_rows('product_repeat_images') ): ?>
                            <?php while ( have_rows('product_repeat_images') ) : the_row(); ?>
                                <div class="product-preview__slide-item">
                                    <img src="<?php the_sub_field('product_repeat_image'); ?>" alt="">
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="product-preview__info">

                    <?php  if( have_rows('product_slide_content') ): ?>
                    <?php while ( have_rows('product_slide_content') ) : the_row(); ?>
                    <div class="product-preview__info-item">
                        <div class="product-preview__info-img">
                            <img src="<?php the_sub_field('product_slide_img'); ?>" alt="">
                        </div>
                        <span><?php the_sub_field('product_slide_text'); ?></span>
                    </div>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="product-preview__description">
                <div class="product-preview__description-head"><p>Наименование бренда</p>
                    <h1 class="h4-style">
                        <?php the_title(); ?>
                    </h1>
                </div>
                <?php if(get_field('product_article')) { ?>
                <div class="product-preview__description-code">Арт. <?php echo get_field('product_article'); ?></div>
                <?php } ?>
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

                <?php if(get_field('product_weight')) { ?>
                    <li><strong>Вес45:</strong> <span><?php echo get_field('product_weight'); ?></span></li>
                <?php } ?>
                <?php if(get_field('product_inside')) { ?>
                    <li><strong>Вложение:</strong> <span><?php echo get_field('product_inside'); ?></span></li>
                <?php } ?>
                <?php if(get_field('product_tastes')) { ?>
                    <li><strong>Вкус(ы):</strong> <span><?php echo get_field('product_tastes'); ?></span></li>
                <?php } ?>

                <?php  if( have_rows('product_repeat_characteristic') ): ?>
                    <?php while ( have_rows('product_repeat_characteristic') ) : the_row(); ?>
                    <li>
                        <strong><?php the_sub_field('product_repeat_name'); ?>:</strong>
                        <span><?php the_sub_field('product_repeat_char'); ?></span>
                    </li>
                    <?php endwhile; ?>
                <?php endif; ?>

                </ul>
            </div>
        </div>
    </div>


    <?php


    $current_post_id = get_the_ID();
    $related_tax = TAXONOMY_TYPE;
    $cats_tags_or_taxes = wp_get_object_terms( $current_post_id, $related_tax, array( 'fields' => 'ids' ) );

    $args = array(
        'posts_per_page' => 8,
        'tax_query' => array(
            array(
                'taxonomy' => $related_tax,
                'field' => 'id',
                'include_children' => false,
                'terms' => $cats_tags_or_taxes,
                'post__not_in' => array($current_post_id),
                'operator' => 'IN',
                'caller_get_posts'=>1
            )
        )
    );
    $relation_query = new WP_Query( $args );

    if( $relation_query->have_posts() ) : ?>
    <div class="new-products new-products--similar">
        <div class="layout">
            <div class="new-products__heading">
                <h2 class="h2-style">
                    <img class="icon-heading" src="<?php bloginfo('stylesheet_directory'); ?>/img/icons/icon-cl.svg" alt="">
                    Похожие товары
                </h2>
                <div class="new-products__navigation"></div>
            </div>
            <div class="new-products__slider">

                <?php while( $relation_query->have_posts() ) : $relation_query->the_post(); ?>

                <div class="new-products__item">
                    <div class="new-products__top">
                        <a href="<?php echo get_permalink( $relation_query->post->ID )?>" class="new-products__preview">
                            <?php
                            $thumbnail_url = wp_get_attachment_image_src( get_post_thumbnail_id($relation_query->post->ID), 'full' );
                            ?>
                            <picture>
                                <img src="<?php echo $thumbnail_url[0]; ?>" width="305" alt="<?php echo $relation_query->post->post_title; ?>">
                            </picture>
                            <span class="new-products__arrow">
                                <svg class="icon-arrow-rotate" width="39px" height="39px">
                                    <use xlink:href="<?php bloginfo('stylesheet_directory'); ?>/img/icons/sprites.svg#icon-arrow-rotate"></use>
                                </svg>
                            </span>
                        </a>
                        <?php
                        $post_type = get_post_type($relation_query->post->ID);
                        $terms = get_the_terms($relation_query->post->ID, TAXONOMY_NEWS);
                        if($terms[0]->name) {
                            ?>
                            <span class="new-products__label">
                                <?php

                                if($terms[0]->name === 'Новинки') {
                                    echo 'Новинка';
                                } else {
                                    echo $terms[0]->name;
                                }
                                ?>
                            </span>
                        <?php } ?>
                    </div>
                    <div class="new-products__bottom">
                        <?php
                        $terms = get_the_terms($relation_query->post->ID, CATALOG_TAXONOMY);
                        ?>
                        <p class="new-products__cat"><?php echo $terms[0]->name; ?></p>
                        <a href="<?php echo get_permalink( $relation_query->post->ID )?>" class="new-products__title brodway-font"><?php echo $relation_query->post->post_title; ?></a>
                    </div>
                </div>

                <?php

                        // в данном случае посты выводятся просто в виде ссылок
//                        echo '<a href="' . get_permalink( $relation_query->post->ID ) . '">' . $relation_query->post->post_title . '</a>';
                    endwhile;
                endif;

                wp_reset_postdata();

                ?>

            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
