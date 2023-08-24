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

<!--// Have post-->

<?php if ( have_posts() ) { while ( have_posts() ) { the_post(); ?>

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

<?php } } else { ?>
    <p>Записей нет.</p>
<?php } ?>

<!--;-->

<?php
    $args1 = array(
    'cat' => $get_category[0], $get_category[1],
    'post_type' => 'catalog',
    'posts_per_page' => -1
    );
 query_posts($args1); ?>
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
