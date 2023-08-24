<?php
function get_filter_by_taxonomy_links($taxonomy = '', $title = '', $class = '', $query_type = 'AND')
{
//    global $wp_query, $wpdb;

    $parentCategory = get_terms([
        'taxonomy'   => $taxonomy,
        'hide_empty' => false,
        'parent' => 0,
    ]);
    $terms = get_terms([
        'taxonomy' => $taxonomy,
        'hide_empty' => false,
        'childless' => true,
    ]);

    function vardump($var) {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }

//    vardump($parentCategory);

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

    <?php foreach ($parentCategory as $term) : ?>
        <?php
            $top_term_id = $term->term_id;
            $top_term_name = $term->name;
            $top_term_tax = $term->taxonomy;
            $childCategory = get_terms([
                'taxonomy'   => $top_term_tax,
                'parent' => $top_term_id,
                'child_of' => $top_term_id,
                'hide_empty' => false,
            ]);
        ?>
        <div class="filter__item">
            <div class="filter__head">
                <?php echo $term->name ?>
                <span class="icon-rotate">
                    <svg class="icon-arrow-rotate" width="39px" height="39px">
                        <use xlink:href="<?php bloginfo('stylesheet_directory'); ?>/img/icons/sprites.svg#icon-arrow-rotate"></use>
                    </svg>
                </span>
            </div>
            <div class="filter__body">
                <?php foreach ($childCategory as $item) : ?>
                <?php
                    $link = $fn();
                    $link_terms = isset($_GET[$taxonomy]) ? explode(',', $_GET[$taxonomy]) : [];

                    if(in_array($item->slug, $link_terms)) {
                        $key = array_search($item->slug, $link_terms);
                        unset($link_terms[$key]);
                    }
                    else {
                        $link_terms[] = $item->slug;
                    }
//            var_dump($link_terms); // "skoro-v-prodazhe"
                    $link = add_query_arg($taxonomy, implode(',', $link_terms), $link);
//            var_dump($link);
                    ?>
                    <label class="checkbox-button checkbox-button--black">
                        <input type="checkbox" name="checkbox" required="" class="checkbox-button__input">
                        <span class="checkbox-button__text">
                            <span class="checkbox-button__status"></span>
                            <span><?php echo $item->name ?></span>
                        </span>
                    </label>
<!--                    <li>-->
<!--                        <a href="--><?php //echo $link; ?><!--">--><?php //echo $item->name ?><!--</a>-->
<!--                    </li>-->
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>

    <div style="display: block;">
        <h3><?php $title; ?></h3>
        <ul class="go-ajax">
        <?php foreach ($terms as $term) : ?>
            <?php
            $link = $fn();
            $link_terms = isset($_GET[$taxonomy]) ? explode(',', $_GET[$taxonomy]) : [];

            var_dump($term->parent);

            if(in_array($term->slug, $link_terms)) {
                $key = array_search($term->slug, $link_terms);
                unset($link_terms[$key]);
            }
            else {
                $link_terms[] = $term->slug;
            }
//            var_dump($link_terms); // "skoro-v-prodazhe"
            $link = add_query_arg($taxonomy, implode(',', $link_terms), $link);
//            var_dump($link);
            ?>
            <li>
                <a href="<?php echo $link; ?>"><?php echo $term->name ?></a>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>

    <?php


}
