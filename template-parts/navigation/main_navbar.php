<!-- NAVIGATION BAR Content -->
<div class="grid-container-fluid sticky-nav">
    <div class="grid-x">
        <div class="cell">
            <div id="topBarContainer" class="top-bar-container">
                <div class="topbar">
                    <!-- Mobile top bar -->
                    <div class="title-bar" data-responsive-toggle="desktop-menu" data-hide-for="medium">
                        <div class="title-bar-left">
                            <div class="grid-container-fluid">
                                <div class="grid-x grid-padding-y align-justify align-middle">
                                    <div class="cell small-1"></div>
                                    <div class="cell small-10 text-center">
                                        <a href="<?php echo get_option("siteurl"); ?>"><img id="logo" src="<?php echo get_theme_file_uri('src/assets/img/boom_logo_orange.svg'); ?>" alt="Boom Radio logo"></a>
                                    </div>
                                    <!-- Empty cell/s used  for spacing  THIS CELL IS NEEDED TO CENTER THE logo -->
                                    <div class="cell small-1">
                                        <button type="button" data-toggle="offCanvas"><img src="<?php echo esc_url(get_theme_file_uri('src/assets/img/icons/+.svg')); ?>" alt="plus button" width="25px"></button>
                                    </div>
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
                                                <a href="<?php echo get_option("siteurl"); ?>"><img id="logo" src="<?php echo get_theme_file_uri('src/assets/img/boom_logo_orange.svg'); ?>" alt="Boom Radio logo"></a>
                                            </div>
                                            <div class="cell shrink">
                                                <button type="button" data-toggle="offCanvas"><img src="<?php echo get_theme_file_uri('src/assets/img/icons/+.svg'); ?>" alt="plus button" width="25px"></button>
                                            </div>
                                            <div class="cell shrink">
                                                <?php  //TOP MENU
                                                wp_nav_menu(array(
                                                    'theme_location' => 'header-menu',
                                                    'menu_class' => 'menu text-center'
                                                ));
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cell large-4 show-for-large">
                                        <div class="grid-container-fluid">
                                            <div class="grid-x grid-margin-x align-justify align-middle">
                                                <?php get_search_form(true); ?>
                                                <div class="cell shrink">
                                                    <iframe class="boomPlayer" src="https://tunein.com/embed/player/s195836/"></iframe>
                                                </div>
                                            </div>
                                        </div>
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
<!--</div>-->
<!-- END NAVIGATION BAR Content -->

<!-- GET THE PLAYER FOR MOBILE DEVICES -->
<?php get_template_part('template-parts/components/mobileplayer', 'none'); ?>
<!-- END OF GET THE PLAYER FOR MOBILE DEVICES -->