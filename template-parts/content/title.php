<!---Dynamic Title with wave -->
<div class="grid-container">
    <div class="grid-x grid-padding-y align-center align-middle">
        <div class="cell auto text-right">
            <img src="<?php echo get_theme_file_uri('src/assets/img/wave_left.svg'); ?>" alt="wave left" width="80px">
        </div>
        <div class="cell shrink">
            <?php the_title('<h1>', '</h1>'); ?>
        </div>
        <div class="cell auto text-left">
            <img src="<?php echo get_theme_file_uri('src/assets/img/wave_right.svg'); ?>" alt="wave right" width="80px">
        </div>
    </div>
</div>
<!--End Title with Wave-->