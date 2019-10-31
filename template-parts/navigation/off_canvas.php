    <!-- OFF CANVAS ASIDE -->
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
                        'menu_class' => 'menu vertical text-center'
                    ));
                    ?>
                    <button class="close-button" aria-label="Close alert" type="button" data-close>
                        <span aria-hidden="true">x</span>
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