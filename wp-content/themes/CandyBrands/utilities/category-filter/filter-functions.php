<?php
function get_filter_by_taxonomy_links($taxonomy = '', $title = '', $class = '', $query_type = 'AND')
{
//    global $wp_query, $wpdb;

    $getTerms = getTerms(TAXONOMYES);

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

    function get_events_string_url() {

        $link = get_post_type_archive_link('catalog');

        foreach (TAXONOMYES as $taxonomyUrl) {
            if (isset($_GET[$taxonomyUrl])) {
//                $link = add_query_arg($taxonomyUrl, wp_unslash($_GET[$taxonomyUrl]), $link);
                if ($_GET[$taxonomyUrl] != '') {
                    $link = add_query_arg($taxonomyUrl, wp_unslash($_GET[$taxonomyUrl]), $link);
                } else {
                    $link = remove_query_arg($taxonomyUrl, $link);
                }
            }
        }


        return $link;
    }

    $fn = '';
    foreach (TAXONOMYES as $taxonomyUrl) {
        if (strpos($taxonomyUrl, 'catalog') !== false) {
            $fn = "get_events_string_url";
        }
    }

    ?>
    <?php foreach ($getTerms as $term) { ?>
        <div class="filter__item">
            <div class="filter__head">
                <?php echo $term['name']; ?>
                <span class="icon-rotate">
                    <svg class="icon-arrow-rotate" width="39px" height="39px">
                        <use xlink:href="<?php bloginfo('stylesheet_directory'); ?>/img/icons/sprites.svg#icon-arrow-rotate"></use>
                    </svg>
                </span>
            </div>
            <div class="filter__body">
            <?php foreach ($term['terms'] as $item) { ?>
                <?php
                $link = $fn();
                $link_terms = isset($_GET[$term['slug']]) ? explode(',', $_GET[$term['slug']]) : [];

                if(in_array($item->slug, $link_terms)) {
                    $key = array_search($item->slug, $link_terms);
                    unset($link_terms[$key]);
                }
                else {
                    $link_terms[] = $item->slug;
                }

                if(!$link_terms) {
                    $link = remove_query_arg($term['slug'], $link);
                } else {
                    $link = add_query_arg($term['slug'], implode(',', $link_terms), $link);
                }

//                $link = add_query_arg($term['slug'], implode(',', $link_terms), $link);
                ?>
<!--                <label class="checkbox-button checkbox-button--black">-->
<!--                    <input type="checkbox" name="checkbox" required="" class="checkbox-button__input">-->
<!--                    <span class="checkbox-button__text">-->
<!--                            <span class="checkbox-button__status"></span>-->
<!--                            <span>--><?php //echo $item->name ?><!--</span>-->
<!--                        </span>-->
<!--                </label>-->
                                    <li>
                                        <a href="<?php echo $link; ?>"><?php echo $item->name ?></a>
                                    </li>
            <?php } ?>
            </div>
        </div>
    <?php } ?>


    <?php


}
