<?php

/**
 * Template Name: Full Contact Page
 *
 * @package WordPress
 * @subpackage boom_radio
 * @since boom_radio 1.0
 */
get_header(); ?>

<?php  //---------CONTENT HERE 
?>
<!--Set the latest search query variable and delivers it to the title-->
<h3>This is page-contact.php</h3>
<!---Title with Wave -->
<div class="grid-x grid-padding-y align-center align-middle">
    <div class="cell auto text-right">
        <img src="<?php echo get_theme_file_uri('src/assets/img/wave_left.svg'); ?>" alt="wave left">
    </div>
    <div class="cell shrink">
        <?php the_title('<h1>', '</h1>'); ?>
    </div>
    <div class="cell auto text-left">
        <img src="<?php echo get_theme_file_uri('src/assets/img/wave_right.svg'); ?>" alt="wave right">
    </div>
</div>
<!--End Title with Wave-->
<aside>
    <!--Addition of some Foundation classes used in the prototype-->
    <div class="grid-container">
        <div class="grid-x grid-padding-x grid-padding-y">

            <div class="cell large-<?php echo is_active_sidebar('primary-sidebar') ? '8' : '12'; ?> shared">
                <div class="grid-container">
                    <div class="grid-x info-container grid-padding-x grid-margin-x grid-margin-y gradiented-box gradient-five-six small-up-1 medium-up-1 large-up-2">
                        <div class="cell">
                            <h2>Address:</h2>
                            <ul class="vcard">
                                <li class="fn">Boom Radio/North Metropolitan TAFE Leederville</li>
                                <li class="street-address">Cnr Oxford St and Richmond St</li>
                                <li class="locality">Leederville</li>
                                <li><span class="state">WA</span>, <span class="zip">6007</span></li>
                                <li class="email"><a href="#">pd@boomradio.com.au</a></li>
                            </ul>
                        </div>

                        <div class="cell">
                            <h2>Postal Address:</h2>
                            <ul class="vcard">
                                <li class="fn">Boom Radio – c/o P. Vinciullo</li>
                                <li class="street-address">Locked Bag 6</li>
                                <li class="locality">Northbridge</li>
                                <li><span class="state">WA</span>, <span class="zip">6865</span></li>
                                <li class="email"><a href="#">pd@boomradio.com.au</a></li>
                            </ul>
                        </div>
                        <div class="cell">
                            <h2>Contacts:</h2>
                            <ul>
                                <li>Program Director: Sian Parry</li>
                                <li>Asst Program Director: Cameron Scull</li>
                                <li>Operations Managers: James Barnes</li>
                                <li>Music Director: Rhys Edwards</li>
                                <li>Online Integration Mgr: Ghislaine Brewster</li>
                                <li>Executive Producer: Kane Coelho</li>
                            </ul>
                        </div>
                        <div class="cell">
                            <h2>By Phone:</h2>
                            <ul>
                                <li>
                                    <h5>Studio:</h5>
                                </li>
                                <li>(08) 9443 2236</li>
                                <li>
                                    <h5>Office:</h5>
                                </li>
                                <li>(08) 9202 4816</li>
                            </ul>
                        </div>
                        <div class="cell"></div>
                    </div>
                </div>


                <div class="grid-container" id="yoursong">
                    <div class="grid-x grid-padding-y align-center align-middle">
                        <div class="cell auto text-right">
                            <img src="<?php echo get_theme_file_uri('src/assets/img/wave_left.svg'); ?>" alt="wave left">
                        </div>
                        <div class="cell shrink">
                            <h3>Get in Touch</h3>
                        </div>
                        <div class="cell auto text-left">
                            <img src="<?php echo get_theme_file_uri('src/assets/img/wave_right.svg'); ?>" alt="wave right">
                        </div>
                    </div>
                    <!-- Empty cell/s used  for spacing-->
                    <div class="cell"></div>

                    <!--------------------Start of Contact Form---------------->
                    <div class="grid-container-fluid">
                        <div class="grid-x grid-padding-x align-center">
                            <div class="cell">
                                <?php echo do_shortcode('[wpforms id="27551" title="false" description="false"]'); ?>
                            </div>
                        </div>
                    </div>
                    <!--------------------End of Contact Form---------------->

                    <!------------------------Start of Map------------------------------>
                    <div class="grid-container-fluid">
                        <div class="grid-x grid-padding-x align-center">
                            <div class="cell">
                                <?php echo do_shortcode('[wpgmza id="1"]'); ?>
                            </div>
                        </div>
                    </div>
                    <!------------------------End of Map------------------------------>

                </div>
            </div>
            <?php if (is_active_sidebar('primary-sidebar')) { ?>
                <?php get_sidebar(); ?>
            <?php } ?>
        </div>
    </div>
</aside>
<?php
get_footer();
