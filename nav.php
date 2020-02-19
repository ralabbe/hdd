<nav class="uk-position-fixed uk-width-1-1">
    <div class=" uk-container">
        <div class="uk-navbar-container uk-margin-auto" uk-navbar="mode: click">
            <div class="uk-navbar-left">
                <?php echo the_custom_logo() ?>
            </div>
            <div class="uk-navbar-right">
                <!-- Mobile Nav -->
                <div class="uk-hidden@m">
                    <ul class="uk-navbar-nav">
                        <li class="uk-margin-remove">
                            <a href="#offcanvas-slide" uk-navbar-toggle-icon uk-toggle role="img" aria-label="Navigation Hamberger Icon"></a>
                        </li>
                    </ul>
                </div>
                <div class="dual-nav">
                    <?php wp_nav_menu( array('menu' => 'Main-Top', 'menu_class' => 'uk-navbar-nav uk-visible@m','depth'=> 2, 'container'=> false, 'walker'=> new Navbar_Menu_Walker)); ?>
                </div>
            </div>
        </div>
    </div>
</nav>


<nav class="uk-position-static uk-invisible uk-width-1-1">
    <div class=" uk-container">
        <div class="uk-navbar-container uk-margin-auto" uk-navbar="mode: click">
            <div class="uk-navbar-left">
                <?php echo the_custom_logo() ?>
            </div>
            <div class="uk-navbar-right">
                <!-- Mobile Nav -->
                <div class="uk-hidden@m">
                    <ul class="uk-navbar-nav">
                        <li class="uk-margin-remove">
                            <a href="#offcanvas-slide" uk-navbar-toggle-icon uk-toggle role="img" aria-label="Navigation Hamberger Icon"></a>
                        </li>
                    </ul>
                </div>
                <div class="dual-nav">
                    <?php wp_nav_menu( array('menu' => 'Main-Top', 'menu_class' => 'uk-navbar-nav uk-visible@m','depth'=> 2, 'container'=> false, 'walker'=> new Navbar_Menu_Walker)); ?>
                </div>
            </div>
        </div>
    </div>
</nav>