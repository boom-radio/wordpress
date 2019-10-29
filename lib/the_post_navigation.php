<?php
// define the structure of navigation post
function boom_radio_the_post_navigation($args = array())
{
    $args = wp_parse_args($args, array(
        'prev_text'          => '<i class="fa fa-chevron-left"></i> %title',
        'next_text'          => '%title  <i class="fa fa-chevron-right"></i>',
        'in_same_term'       => false,
        'excluded_terms'     => '',
        'taxonomy'           => 'category',
        'screen_reader_text' => __('Post navigation'),
    ));

    $navigation = '';

    $previous = get_previous_post_link(
        '<div class="nav-previous">%link</div>',
        $args['prev_text'],
        $args['in_same_term'],
        $args['excluded_terms'],
        $args['taxonomy']
    );

    $next = get_next_post_link(
        '<div class="nav-next">%link</div>',
        $args['next_text'],
        $args['in_same_term'],
        $args['excluded_terms'],
        $args['taxonomy']
    );

    // Only add markup if there's somewhere to navigate to.
    if ($previous || $next) {
        $navigation = _navigation_markup($previous . $next, 'post-navigation', $args['screen_reader_text']);
    }

    return $navigation;
}

//This filter add the class sr-only to the h2 displaying the post navigation title
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2);
function my_navigation_template($template, $class)
{

    return
        '<nav class="navigation %1$s" role="navigation">
        <h2 class="screen-reader-text sr-only">%2$s</h2>
        <div class="nav-links">%3$s</div>   
    </nav>';
}
