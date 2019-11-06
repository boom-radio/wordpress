<?php
class F6_drill_menu_walker extends Walker_Nav_Menu {
	/*
	 * Add vertical menu class to the children
	 */

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul class=\"vertical menu\">\n";
	}
}

