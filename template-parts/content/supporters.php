<!---Title of the Second Section -->
<?php get_template_part('template-parts/components/waveleft', 'none'); ?>
<h3>Sponsors</h3>
<?php get_template_part('template-parts/components/waveright', 'none'); ?>
<!--END OF H3 WAVE-->

<div class="grid-container">
    <div class="grid-x grid-margin-x grid-margin-y align-center">
        <div class="cell">
            <div class="grid-container-fluid gradiented-box gradient-three-four">
                <div class="grid-x grid-padding-x grid-padding-y align-spaced align-middle">

                    <div class="cell medium-6">
                        <div class="grid-container-fluid">
                            <div class="grid-x grid-padding-x grid-padding-y">
                                <div class="cell">
                                    <h2>Our Sponsors</h2>
                                </div>
                                <div class="cell text-justify">
                                    <p>Many great companies are already sponsoring BOOM Radio!</p>
                                    <br>
                                    <p>Find out who they are and join them by clicking the button below!</p>
                                </div>
                                <div class="cell">
                                    <a href="<?php echo esc_url(get_permalink(get_page_by_title('Sponsor'))); ?>" class="boom-button-white float-left">Meet Our Sponsors!
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cell medium-4">
                        <?php echo '<img class="img-left box-shadowed"src="' . esc_url(get_bloginfo("template_url")) . '/src/assets/img/sponsors-handwriting-400x300.jpg" />'; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Empty cell/s used  for spacing-->
        <div class="cell"></div>
        <div class="cell"></div>
    </div>
</div>