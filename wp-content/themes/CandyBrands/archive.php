<?php
get_header();
?>

<main>
    <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
    <div class="catalog">
        <div class="layout catalog__heading">
            <h2 class="h2-style">Каталог товаров</h2>
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
                $taxonomy = 'catalog_category';
                if (checkVal($_GET['catalog_category']) && checkVal($_GET['catalog_type'])) {
                    $taxonomy = 'catalog_category';
                } else if (checkVal($_GET['catalog_category'])) {
                    $taxonomy = 'catalog_type';
                } else if (checkVal($_GET['catalog_news'])) {
                    $taxonomy = 'catalog_news';
                }
                $taxonomyTerms = get_terms([
                    'taxonomy' => $taxonomy,
                    'hide_empty' => true
                ]);
                $query = [
                    'post_type' => 'catalog',
                    'posts_per_page' => 2, // тут нужно менять количество постов на одной странице
                    'tax_query' => [
                        'relation' => 'AND'
                    ]
                ];
                if (checkVal($_GET['catalog_category'])) {
                    $query['tax_query'][] = [
                        'taxonomy' => 'catalog_category',
                        'field' => 'slug',
                        'terms' => explode(',', $_GET['catalog_category'])
                    ];
                }
                if (checkVal($_GET['catalog_type'])) {
                    $query['tax_query'][] = [
                        'taxonomy' => 'catalog_type',
                        'field' => 'slug',
                        'terms' => explode(',', $_GET['catalog_type'])
                    ];
                }
                if (checkVal($_GET['catalog_news'])) {
                    $query['tax_query'][] = [
                        'taxonomy' => 'catalog_news',
                        'field' => 'slug',
                        'terms' => explode(',', $_GET['catalog_news'])
                    ];
                }
                if (checkVal($taxonomyTerms)) {
                    foreach ($taxonomyTerms as $term) {
                        $termQuery = [
                            'taxonomy' => $term->taxonomy,
                            'field' => 'term_id',
                            'terms' => [$term->term_id]
                        ];
                        $newQuery = $query;
                        $newQuery['tax_query'][] = $termQuery;
                        $result = new WP_Query($newQuery);
                        if (!checkVal($result) || !$result->have_posts())
                            continue;
                        $maxNumPages = (int)$result->max_num_pages;
                        ?>

                        <div class="product__category">
                            <div class="product__heading">
                                <h3 class="h4-style">
                                    <img class="icon-heading"
                                         src="<?php bloginfo('stylesheet_directory'); ?>/img/icons/icon-cl.svg"
                                         alt="">
                                    <?php echo $term->name; ?>
                                </h3>
                            </div>
                            <div class="product__wrapper">
                                <?php
                                while ($result->have_posts()) {
                                    $result->the_post();
                                    get_tmpl('post');
                                }
                                wp_reset_query();
                                ?>
                            </div>
                            <?php if ($maxNumPages > 1): ?>
                                <div class="product__button">
                                    <a href="#" class="button button--medium button--yellow load-more-posts" data-page="1"
                                       data-query="<?php echo htmlspecialchars(json_encode($newQuery), ENT_QUOTES, 'UTF-8'); ?>">
                                        Показать еще
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>

                    <?php }
                } else { ?>
                    <div class="product__error">
                        <h3 class="h4-style">По вашему запросу ничего не найдено =(</h3>
                        <a href="#" class="button button--medium button--white">Сбросить фильтры</a>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</main>

<script>
    jQuery(document).ready(function ($){
        $(".load-more-posts").click(function (e){
            e.preventDefault();
            let loader = $('body'),
                button = $(this),
                details = $(this).data('query'),
                page = +$(this).attr('data-page'),
                container = $(this).closest('.product__category').find('.product__wrapper');
            if(loader.hasClass('loading')){
                return;
            }
            loader.addClass('loading');
            $.ajax({
                data : {action : "load_products_via_ajax", page, details},
                method: "POST",
                url : "<?= admin_url('admin-ajax.php'); ?>"
            }).done(function (response){
                loader.removeClass('loading');
                if(response.output){
                    container.append(response.output)
                }
                if(response.show_button){
                    button.show();
                } else {
                    button.hide();
                }

                button.attr('data-page', page + 1);
            })
        })
    })
</script>

<?php get_footer(); ?>
