<?php $the_query = new WP_Query($args); ?>

<!--Start of the Loop-->
<?php if ($the_query->have_posts()) :
    while ($the_query->have_posts()) : $the_query->the_post(); ?>

        <div <?php post_class('cell'); ?>>
            <div class="cell"></div>
            <?php the_title('<h2>', ':</h2>'); ?>
            <?php the_content(); ?>
        </div>
    <?php endwhile;
        wp_reset_postdata(); ?>

<?php else : ?>
    <p style="color: #FFF;"><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>