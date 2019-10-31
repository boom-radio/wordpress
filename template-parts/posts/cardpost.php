<div <?php post_class('cell'); ?>>
    <div class="card">

        <?php if (has_post_thumbnail()) {
            the_post_thumbnail('card');
        } else {
            echo '<img style="height: ;" src="' . get_bloginfo("template_url") . '/src/assets/img/img-default.png"/>';
        }
        ?>
        <div class="card-section">
            <div class="bio">
                <h5 class="section-title">
                    <?php the_title() ?>
                </h5>
                <?php the_excerpt(); ?>
            </div>
            <div class="cell">
                <div class="animation-container">
                    <div class="sound-container">
                        <div class="rect-2"></div>
                        <div class="rect-3"></div>
                        <div class="rect-4"></div>
                        <div class="rect-5"></div>
                        <div class="rect-6"></div>
                        <div class="rect-5"></div>
                        <div class="rect-4"></div>
                        <div class="rect-3"></div>
                        <div class="rect-2"></div>
                        <div class="rect-1"></div>
                    </div>
                </div>
            </div>

            <!--This is to attach the Orange boom button button, code in lib/helpers.php as an example of how we can resue sections of code across the site-->
            <?php boom_radio_card_link(); ?>
        </div>
    </div>
</div>