<?php

/**
 * The template for displaying the standardised theme search from to be used in the site
 *
 * @package WordPress
 * @subpackage boom_radio
 * @since Boom Radio 1.0
 */

?>

<form id="searchform" method="get" action="<?php echo home_url('/'); ?>">
    <input type="text" class="search-field" name="s" placeholder="Search" value="<?php the_search_query(); ?>">
    <input type="submit" value="Search">
</form>