    <!-- OFF CANVAS ASIDE Whole Website -->
    <!-- In the off-canvas-content DIV goes the whole page content -->
    <div class="off-canvas-content" data-off-canvas-content>
        <aside class="off-canvas position-left" id="offCanvas" data-off-canvas data-transition="overlap">
            <div class="grid-container-fluid">
                <div class="grid-x grid-padding-x grid-padding-y align-center align-middle">
                    <!-- Empty cell/s used  for spacing-->
                    <div class="cell"></div>
                    <div class="cell"></div>
                    <?php get_search_form() ?>
                    <div class="cell">
                        <!-- ASIDE menu -->
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'side-menu',
                            'menu_class' => 'multilevel-accordion-menu vertical menu text-center',
                            'container'      => false,
                            'items_wrap'     => '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion" data-multi-open="false">%3$s</ul>',
                            //Recommend setting this to false, but if you need a fallback...
                            'fallback_cb'    => 'false',
                            'walker'         => new F6_drill_menu_walker()
                        ));
                        ?>
                        <button class="close-button" aria-label="Close alert" type="button" data-close>
                            <img src="<?php echo esc_url(get_theme_file_uri('src/assets/img/icons/x.svg')); ?>" alt="close button">
                        </button>
                    </div>
                    <!-- Empty cell/s used  for spacing-->
                    <div class="cell"></div>
                    <div class="cell shrink">
                        <ul class="menu text-center">
                            <li><a href="https://www.facebook.com/boomradioau/"><i class="fab fa-facebook-f fa-1x"></i></a>
                            </li>
                            <li><a href="https://twitter.com/boomradioau"><i class="fab fa-twitter fa-1x"></i></a></li>
                            <li><a href="https://www.instagram.com/boomradioau/"><i class="fab fa-instagram fa-1x"></i></a>
                            </li>
                            <li><a href="index.html"><i class="fab fa-snapchat-ghost fa-1x"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>