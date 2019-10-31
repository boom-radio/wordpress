<?php

/**
 * The template for displaying Header for the site
 *
 * @package WordPress
 * @subpackage boom_radio
 * @since Boom Radio 1.0
 */ ?>

<!--Header for the site-->
<?php get_template_part('template-parts/header/head', 'none'); ?>
<!--Off Canvas vertical menu-->
<?php get_template_part('template-parts/navigation/off_canvas', 'none'); ?>
<!-- OFF CANVAS CONTENT - Whole website & DIV Listen -->
<div class="off-canvas-content" data-off-canvas-content>
    <!-- HEADER Content -->
    <?php get_template_part('template-parts/header/spacer', 'none'); ?>
    <!-- END HEADER Content -->
    <?php get_template_part('template-parts/navigation/main_navbar', 'none'); ?>

    <!-- BEGINNING OF MAIN BODY -->