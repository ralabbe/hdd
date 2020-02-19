<footer>
    <div class="uk-container">
        <div class="uk-child-width-1-2@s uk-child-width-1-2@m" uk-grid>
            <div>
	            <?php dynamic_sidebar( 'footer-left' ); ?>
            </div>
            <div class="uk-text-center footer-right">
                <?php echo the_custom_logo("thumbnail") ?>
                <?php dynamic_sidebar( 'footer-right' ); ?>
                <hr>
                <p>&copy; <?php echo date("Y"); ?> HDD of Florida LLC</p>
            </div>
        </div>
    </div>
</footer>

<div id="offcanvas-slide" uk-offcanvas="overlay: true; flip: true">
    <div class="uk-offcanvas-bar text-white">
        <a class="uk-offcanvas-close" uk-close></a>
        <?php  wp_nav_menu( array('menu' => 'Main-Top', 'menu_class' => 'uk-navbar-nav uk-invisible@m','depth'=> 2, 'container'=> false, 'walker'=> new Navbar_Menu_Walker)); ?>
    </div>
</div>

<?php
    wp_footer();
?>
</body>
</html>
