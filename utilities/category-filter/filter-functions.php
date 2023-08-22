<?php
function get_filter_by_taxonomy_links($taxonomy = '', $title = '', $class = '', $query_type = 'AND')
{
    global $wp_query, $wpdb;

    $terms = get_terms([
        'taxonomy' => $taxonomy,
        'hide_empty' => false
    ]);

    ?>

    <div>
        <h3><?php $title; ?></h3>
        <?php foreach ($terms as $term) : ?>
            <?php var_dump($term); ?>
        <?php endforeach; ?>
    </div>

    <?php
}
