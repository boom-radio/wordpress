<!--Updated search bar with Screen Reader span included-->
<form class="cell shrink" action="<?php echo esc_url(home_url('/')); ?>" method="get" role="search">
    <span class="u-screen-reader-text"><?php echo esc_attr_x('Search Boom:', 'label', 'boom_radio') ?></span>
    <input class="search-input" type="search" name="s" placeholder="<?php echo esc_attr_x('Search Boom', 'placeholder', 'boom_radio') ?>" value="<?php echo esc_attr(get_search_query()); ?>" />
</form>