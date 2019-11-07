<div class="grid-container-fluid">
    <div class="grid-x grid-margin-x grid-margin-y align-center">
        <div class="cell"></div>
        <div class="cell"></div>
        <div class="cell shrink">
            <a href="<?php echo esc_url(get_option("siteurl")); ?>"><img id="logo" src="<?php echo esc_url(get_theme_file_uri('src/assets/img/boom_logo_orange.svg')); ?>" alt="Boom Radio logo"></a>
        </div>
        <div class="cell">
            <h1 class="text-center"><?php esc_html_e('No luck..Sorry', 'boom_radio') ?></h1>
        </div>
        <div class="cell">
            <h3 class="text-center"><?php esc_html_e('Maybe you can try again?', 'boom_radio') ?><h3>
        </div>
        <a class="boom-button-white" href="<?php echo esc_url(get_option("siteurl")); ?>">
            Go Back
        </a>
    </div>
</div>