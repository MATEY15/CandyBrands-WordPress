<?php
add_action('pre_get_posts', 'events_base_filter');

function events_base_filter($query) {

    if (is_admin() || !$query->is_main_query()) {
        return;
    }

    if (!$query->is_post_type_archive('catalog')) {
        return;
    }

    if (isset($_GET['catalog_category'])) {
        $tax_query = $query->get('tax_query');
        $tax_query = is_array($tax_query) ? $tax_query : [];
        $tax_query[] = [
            'taxonomy' => 'catalog_category',
            'field' => 'slug',
            'terms' => explode(',', $_GET['catalog_category'])
        ];

        $query->set('tax_query', $tax_query);
//         var_dump($query->tax_query->queried_terms);
    }

//    if (isset($_GET['events_tags'])) {
//        $tax_query = $query->get('tax_query');
//        $tax_query = is_array($tax_query) ? $tax_query : [];
//        $tax_query[] = [
//            'taxonomy' => 'events_tags',
//            'field' => 'slug',
//            'terms' => explode(',', $_GET['events_tags'])
//        ];
//
//        $query->set('tax_query', $tax_query);
//        // var_dump($query->tax_query->queried_terms);
//    }
}
