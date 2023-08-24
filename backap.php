<?php
$categories = get_categories(array(
    'taxonomy' => 'catalog_category',
    'hide_empty' => true,
    'childless' => true,
));

foreach( $categories as $category ):
    ?>

    <div class="product__category">
        <div class="product__heading">
            <h3 class="h4-style">
                <img class="icon-heading" src="<?php bloginfo('stylesheet_directory'); ?>/img/icons/icon-cl.svg" alt="">
                <?php echo $category->name ?>
            </h3>
        </div>
        <div class="product__wrapper">

            <?php
            $posts = get_posts(array(
                'post_type' => 'catalog',
                'taxonomy' => $category->taxonomy,
                'term' => $category->slug,
                'nopaging' => true,
            ));

            foreach($posts as $post):
                setup_postdata($post);

                ?>
                <div class="product__item">
                    <div class="product__top">
                        <span class="product__label">Новинка*</span>
                        <a href="#" class="product__image">
                            <img src="<?php bloginfo('stylesheet_directory'); ?>/img/product/product-1.png" alt="<?php the_title(); ?>">
                        </a>
                    </div>
                    <div class="product__bottom">
                        <div class="product__article">Арт. 111111</div>
                        <a href="#" class="product__name"><?php the_title(); ?></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php endforeach; ?>
