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


<!--Last work-->

<?php

global $wp_query;
$args = array_merge( $wp_query->query, array( 'post_type' => 'catalog' ) );
query_posts( $args );
//                vardump($args);

$get_category = preg_split('/[,|:]/u', $args['catalog_category'], -1, PREG_SPLIT_NO_EMPTY);
$path_category = [];
$get_category = array_reverse($get_category);

//                 vardump($getCategory);
if(!sizeof($get_category)) {
    $get_category = $getCategory;
}
//                 vardump($get_category);

foreach ($get_category as $item) :

    // WP_Query
    $query = new WP_Query( [ 'catalog_category' => $item ] );
    $totalpost = $query->found_posts;
    vardump($query);
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



<!--is video -->

<form method="get">

    <?php foreach ($getAllCategory as $cat) : ?>

        <label class="checkbox-button checkbox-button--black">
            <input type="checkbox" name="filter[<?php echo $taxonomy ?>][]" value="<?php echo $cat->term_id ?>" class="checkbox-button__input">
            <span class="checkbox-button__text">
                            <span class="checkbox-button__status"></span>
                            <span><?php echo $cat->name ?></span>
                        </span>
        </label>

    <?php
//                    vardump($cat);
//                    if($cat->count > 0) {
//                        $getCategory[] = $cat->slug;
//                    }
    endforeach; ?>
    <button>Send</button>
</form>

<?php

if(isset($_REQUEST['filter'])) {
    global $wp_query;

    $query = Array(
        'tax_query' => Array(
            'relation' => 'AND',
        ),
    );
    if( isset($_REQUEST['filter'][$taxonomy]) && is_array($_REQUEST['filter'][$taxonomy]) ) {
        $categoryes = Array();
        foreach ($_REQUEST['filter'][$taxonomy] as $category)
            $categoryes[] = intval($category);

        $query['tax_query'][] = Array(
            'taxonomy' => $taxonomy,
            'field' => 'term_id',
            'terms' => $categoryes
        );
        unset($categoryes);
    }

//                    $query = array_merge($wp_query->$query, $query);

    query_posts($query);

//                    vardump($query);

    if (have_posts()) {
        while (have_posts()) {
            vardump(the_post());

        } }
}

?>
