<!--basic 404 can be restyled-->
<?php get_header(); ?>
<div class="grid-container">
    <div class="grid-x grid-margin-x grid-margin-y align-center">
        <h3><?php esc_html_e('Nothing found here, maybe you can try to search?', 'boom_radio') ?></h3>
        <?php get_search_form(); ?>
    </div>
</div>
<?php get_footer(); ?>