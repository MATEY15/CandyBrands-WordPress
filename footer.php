<div class="footer">
    <div class="layout">
        <div class="footer__head"><a href="<?php home_url(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/logo-footer.svg" alt="Logo"></a></div>
        <div class="footer__body">
            <div class="footer__description"><p> Текст с политикой конфиденциальности. Мы любим свое дело и ежедневно
                    делимся своей любовью. </p></div>
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
                <div class="footer__menu-item"><h4>ООО «Кэндифлоу»</h4>
                    <ul>
                        <li>ИНН 5034062413</li>
                        <li>КПП 503401001</li>
                        <li>ОГРН 1225000071020</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="overlay"></div>
<?php wp_footer(); ?>
</body>
</html>
