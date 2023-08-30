<?php

    CONST CATALOG_TYPE = 'catalog';
    CONST CATALOG_TAXONOMY = 'catalog_category';
    CONST TAXONOMY_TYPE = 'catalog_type';
    CONST TAXONOMY_NEWS = 'catalog_news';
    CONST BRAND_SLUG = 'brand';
    CONST TAXONOMY_BRANDS = 'brands';

    function getPostsBrands(): array {
        $brand = getBrandTerm();
        $brands = get_terms(
            [
                'taxonomy'      => CATALOG_TAXONOMY,
                'hide_empty'    => false,
                'parent'        => $brand->term_id,
            ]
        );

        $brandsArray = [];
        foreach ($brands as $item) {
            $brandsArray[] = $item->slug;
        }


        return $brandsArray;
    }

    function getBrandPosts($slug) {
        global $post;
        $brands = get_posts(
            [
                'post_type' => CATALOG_TYPE,
                'tax_query' => array(
                    array(
                        'taxonomy'  => CATALOG_TAXONOMY,
                        'field'     => 'slug',
                        'terms'     => $slug,
                    )
                )
            ]
        );


        foreach( $brands as $post ){
            setup_postdata( $post );
            ?>
            <div class="h3"><?php the_title(); ?></div>
            <?php
        }
        wp_reset_postdata();

//        return $brands;
    }

    function getCategorySlugUrl() {
        global $wp_query;
        $args = array_merge( $wp_query->query, array( 'post_type' => 'catalog' ) );
        query_posts( $args );
        $getCategorySlugUrl = preg_split('/[,|:]/u', $args['catalog_category'], -1, PREG_SPLIT_NO_EMPTY);
        $getCategorySlugUrl = array_reverse($getCategorySlugUrl);
        return $getCategorySlugUrl;
    }

    function getRootTerms() {

        $brands = get_terms(
            [
                'parent' => 0,
            ]
        );

        vardump($brands);

    }

    function getBrandTerm() {
        return get_term_by( 'slug', BRAND_SLUG, CATALOG_TAXONOMY );
    }

    function getTypsTerm() {
        return get_term_by( 'slug', BRAND_SLUG, CATALOG_TAXONOMY );
    }

    function getNywsTerm() {
        return get_term_by( 'slug', BRAND_SLUG, CATALOG_TAXONOMY );
    }

    function get_category_slug($slug) {
        $category = get_term_by( 'slug', $slug, CATALOG_TAXONOMY );
//        if ( $category ) {
//            _make_cat_compat( $category );
//        }
        return $category;
    }

    function getPostsBrand($posts) {
        foreach ($posts as $item) {
            $args = array(
                'post_type' => CATALOG_TYPE,
                'tax_query' => [
                    'relation' => 'AND',
                    [
                        'taxonomy' => CATALOG_TAXONOMY,
                        'field'    => 'slug',
                        'terms'    => $item,
                    ],
                ],
            );
            vardump(get_category_slug($item)->name);
            $query = new WP_Query( $args );
            while ($query->have_posts()) {
                $query->the_post();
                vardump(the_title());
            }
        }
    }




?>
