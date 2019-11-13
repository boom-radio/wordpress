<!--Updated search bar with Screen Reader span included-->
<form class="cell auto nav-search" action="<?php echo esc_url(home_url('/')); ?>" method="get" role="search">
    <span class="show-for-sr"><?php echo esc_attr_x('Search Boom:', 'label', 'boom_radio') ?></span>
    <label class="show-for-sr" for="boom_search">Search Boom</label>
    <input id="boom_search" class="search-input" type="search" name="s" placeholder="<?php echo esc_attr_x('Search Boom', 'placeholder', 'boom_radio') ?>" value="<?php echo esc_attr(get_search_query()); ?>" />
</form>