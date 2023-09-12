<div class="footer">
    <div class="layout">
        <div class="footer__head"><a href="<?php home_url(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/logo-footer.svg" alt="Logo"></a></div>
        <div class="footer__body">
            <div class="footer__description">
                <p>
                    <?php echo get_field('footer_politics', 'options' ); ?>
                </p>
            </div>
            <div class="footer__menu">
                <div class="footer__menu-item">
                    <h4><?php echo menu_names('footer1'); ?></h4>
                    <?php wp_nav_menu( [
                        'theme_location'  => 'footer1',
                    ] ); ?>
                </div>
                <div class="footer__menu-item">
                    <h4><?php echo menu_names('footer2'); ?></h4>
                    <?php wp_nav_menu( [
                        'theme_location'  => 'footer2',
                    ] ); ?>
                </div>
                <div class="footer__menu-item">
                    <h4><?php echo menu_names('footer3'); ?></h4>
                    <?php wp_nav_menu( [
                        'theme_location'  => 'footer3',
                    ] ); ?>
                </div>
                <?php
                    $info_company = get_field('info_company', 'options' );
                    if( $info_company !== "" ):
                ?>
                <div class="footer__menu-item">
                    <?php echo get_field('info_company', 'options' ); ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="overlay"></div>
<?php wp_footer(); ?>
<script>

    jQuery(document).ready(function ($) {
        var allButtons = $('.product__button button.button');
        allButtons.each(function (item) {
            console.log(item)
        })
        $('.product__button a').on('click', function (e) {
            e.preventDefault();
            var $hiddenItems = $('.product__item--hide');
            if ($hiddenItems.length > 0) {
                var itemsToShow = 6; // Количество постов для отображения при каждом клике
                $hiddenItems.slice(0, itemsToShow).removeClass('product__item--hide');
                if ($hiddenItems.length <= itemsToShow) {
                    $(this).hide(); // Скрываем кнопку "Показать еще", если не осталось скрытых постов
                }
            }
        });
    });

    // jQuery( function( $ ){
    //     let eventRequest = null;
    //     let url;
    //     $(document.body).on('click', '.go-ajax a', function (e) {
    //         e.preventDefault();
    //         url = $(this).attr('href');
    //         $('.catalog__wrapper').addClass('AJAX');
    //         $(document.body).trigger('event_filter_ajax_request', url)
    //     });
    //     $(document.body).on('event_filter_ajax_request', function (e, url, el) {
    //         console.log(url);
    //         let content = $('.catalog__wrapper');
    //         if(url.slice(-1) === '?') {
    //             url = url.slice(0, -1);
    //         }
    //         url = url.replace(/%2C/, ',');
    //         if(eventRequest) {
    //             eventRequest.abort();
    //         }
    //         $.get(url, function (res) {
    //             content.replaceWith($(res).find('.catalog__wrapper'));
    //             $('.catalog__wrapper').removeClass('AJAX');
    //         }, 'html');
    //     });
    // });


    // jQuery( function( $ ){
    //     $( '.product__button .button' ).click( function(){
    //         alert( 'Если это работает, уже неплохо' );
    //     });
    // });
</script>
</body>
</html>
