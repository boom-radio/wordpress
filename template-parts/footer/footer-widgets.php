<?php

/**
 * Example of template part used wth a sidebar and widget see footer.php....
 *
 * @package WordPress
 * @subpackage boom_radio
 * @since 1.0.0
 */

if (is_active_sidebar('sidebar-###')) : ?>

<aside class="###" role="###" aria-label="<?php esc_attr_e('Footer', 'boom_radio'); ?>">
    <?php
        if (is_active_sidebar('sidebar-###')) {
            ?>
    <div class="###">
        <?php dynamic_sidebar('sidebar-###'); ?>
    </div>
    <?php
        }
        ?>
</aside>

<?php endif; ?>