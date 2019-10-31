        <!---Title with Wave -->
        <div class="grid-x grid-padding-y align-center align-middle">
            <div class="cell auto text-right">
                <img src="<?php echo get_theme_file_uri('src/assets/img/wave_left.svg'); ?>" alt="wave left">
            </div>
            <div class="cell shrink">
                <h3>Terms & Conditions</h3>
            </div>
            <div class="cell auto text-left">
                <img src="<?php echo get_theme_file_uri('src/assets/img/wave_right.svg'); ?>" alt="wave right">
            </div>
        </div>
        <!--END OF H3 WAVE-->

        <div class="grid-container">
            <div class="grid-x grid-margin-x grid-margin-y align-center">
                <div class="cell">
                    <div class="grid-container-fluid gradiented-box gradient-five-six">
                        <div class="grid-x grid-padding-x grid-padding-y align-spaced align-middle">
                            <div class="cell medium-4">
                                <?php echo '<img class="img-left box-shadowed"src="' . get_bloginfo("template_url") . '/src/assets/img/img-default.png" />'; ?>
                            </div>
                            <div class="cell medium-6">
                                <div class="grid-container-fluid">
                                    <div class="grid-x grid-padding-x grid-padding-y">
                                        <div class="cell">
                                            <h2>General Competition Terms</h2>
                                        </div>
                                        <div class="cell text-justify">
                                            <p>All winners must adhere to both the contest’s and Boom Radio’s
                                                terms
                                                and conditions.</p>
                                            <br>
                                            <p>For more information click the button below</p>
                                        </div>
                                        <div class="cell">
                                            <a href="<?php echo esc_url(get_permalink(get_page_by_title('General Terms'))); ?>" class="boom-button-white float-right">Read
                                                More...
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Empty cell/s used  for spacing-->
                <div class="cell"></div>
                <div class="cell"></div>
            </div>
        </div>