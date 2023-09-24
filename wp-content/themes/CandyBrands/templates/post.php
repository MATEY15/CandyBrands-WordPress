<div class="product__item">
    <div class="product__top">
        <?php
        $terms = get_the_terms(get_the_ID(), TAXONOMY_NEWS);

        if ($terms && !is_wp_error($terms)) {
            $term_names = wp_list_pluck($terms, 'name');
            $term_text = implode(', ', $term_names);
            $term_text === 'Новинки' ? $term_text = 'Новинка' : $term_text;
            ?>
            <span class="product__label"><?php echo $term_text; ?></span>
        <?php } ?>
        <a href="<?php the_permalink(); ?>" class="product__image">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
        </a>
    </div>
    <div class="product__bottom">
        <?php if(get_field('product_article')) { ?>
            <div class="product__article">Арт. <?php echo get_field('product_article'); ?></div>
        <?php } ?>
        <a href="<?php the_permalink(); ?>" class="product__name"><?php the_title(); ?></a>
    </div>
</div>