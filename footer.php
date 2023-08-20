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
</body>
</html>
