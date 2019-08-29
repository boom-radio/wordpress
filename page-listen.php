<?php

/**
 * Template Name: Full Listen Page
 *
 * @package WordPress
 * @subpackage boom_radio
 * @since boom_radio 1.0
 */
get_header(); ?>

<body>
<!-- OFF CANVAS ASIDE -->
    <aside class="off-canvas position-left" id="offCanvas" data-off-canvas data-transition="overlap">
        <div class="grid-container-fluid">
            <div class="grid-x grid-padding-x grid-padding-y align-center align-middle">
                <!-- Empty cell/s used  for spacing-->
                <div class="cell"></div>
                <div class="cell"></div>
                <div class="cell">
                    <!-- ASIDE menu -->
                    <?php   
                    wp_nav_menu( array( 
                        'theme_location' => 'side-menu', 
                        'menu_class' => 'menu vertical text-center') );       
                    ?>
                    <button class="close-button" aria-label="Close alert" type="button" data-close>
                                <span aria-hidden="true">&times;</span>
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
    <!-- OFF CANVAS CONTENT - Whole website -->
    <!-- In the off-canvas-content DIV Listen!es the whole page content -->
    <div class="off-canvas-content" data-off-canvas-content>
    <!-- HEADER Content -->
        <header class="grid-container-fluid">
            <div class="grid-x">
                <!-- Empty cell/s used  for spacing-->
                <div class="cell"></div>
            </div>
        </header>
    <!-- END HEADER Content -->

    <!-- NAVIGATION BAR Content -->
    <div class="grid-container-fluid">
        <div class="grid-x">
        <div class="cell">
            <div id="topBarContainer" class="top-bar-container">
                <div class="topbar">
                <!-- Mobile top bar -->
                    <div class="title-bar" data-responsive-toggle="desktop-menu" data-hide-for="medium">
                        <div class="title-bar-left">
                            <div class="grid-container-fluid">
                                <div class="grid-x grid-padding-y align-justify align-middle">
                                    <div class="cell small-1">
                                        <button type="button" data-toggle="offCanvas"><img src="<?php echo get_theme_file_uri('src/assets/img/icons/+.svg'); ?>"
                                        alt="plus button"></button>
                                    </div>
                                    <div class="cell small-10 text-center">
                                    <img id="mobile-logo" src="<?php echo get_theme_file_uri('src/assets/img/boom_logo_orange.svg'); ?>" alt="Boom Radio logo">
                                    </div>
                                    <!-- Empty cell/s used  for spacing  THIS CELL IS NEEDED TO CENTER THE logo -->
                                    <div class="cell small-1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- END Mobile top bar -->

                <!-- Desktop top bar -->
                    <div class="title-bar" id="desktop-menu">
                        <div class="title-bar-left">
                            <div class="grid-container-fluid">
                                <div class="grid-x grid-padding-x grid-margin-y align-justify align-middle">
                                    <div class="cell shrink">
                                        <div class="grid-x align-left align-middle">
                                            <div class="cell shrink">
                                                <a href="./"><img id="logo" src="<?php echo get_theme_file_uri('src/assets/img/boom_logo_orange.svg'); ?>" alt="Boom Radio logo"></a>
                                            </div>
                                            <div class="cell shrink">
                                                <button type="button" data-toggle="offCanvas"><img src="<?php echo get_theme_file_uri('src/assets/img/icons/+.svg'); ?>"
                                                alt="plus button"></button>
                                            </div>
                                            <div class="cell shrink">
                                                <?php  //TOP MENU
                                                wp_nav_menu( array( 
                                                    'theme_location' => 'header-menu', 
                                                    'menu_class' => 'menu text-center' ) );  
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cell show-for-large shrink">
                                        <!-- <iframe class="boomPlayer" src="https://tunein.com/embed/player/s195836/"></iframe> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Desktop top bar -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END NAVIGATION BAR Content -->

<?php
get_footer();
