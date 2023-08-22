<?php
function get_filter_by_taxonomy_links($taxonomy = '', $title = '', $class = '', $query_type = 'AND')
{
//    global $wp_query, $wpdb;

    $terms = get_terms([
        'taxonomy' => $taxonomy,
        'hide_empty' => false
    ]);

    function get_events_string_url() {

        $link = get_post_type_archive_link('catalog');

        if (isset($_GET['catalog_category'])) {
            $link = add_query_arg('catalog_category', wp_unslash($_GET['catalog_category']), $link);
        }

        if (isset($_GET['events_tags'])) {
            $link = add_query_arg('events_tags', wp_unslash($_GET['events_tags']), $link);
        }

        return $link;
    }

    $fn = '';
    if (strpos($taxonomy, 'catalog') !== false) {
        $fn = "get_events_string_url";
    }
//    var_dump($fn());

    ?>

    <div>
        <h3><?php $title; ?></h3>
        <ul>
        <?php foreach ($terms as $term) : ?>
            <?php
            $link = $fn();
            $link_terms = isset($_GET[$taxonomy]) ? explode(',', $_GET[$taxonomy]) : [];
            if(in_array($term->slug, $link_terms)) {
                $key = array_search($term->slug, $link_terms);
                unset($link_terms[$key]);
                var_dump($key);
            }
            $link = add_query_arg($taxonomy, implode(',', $link_terms), $link)
            ?>
            <li><a href="<?php echo $link; ?>"><?php echo $term->name ?></a></li>
        <?php endforeach; ?>
        </ul>
    </div>

    <?php


}
