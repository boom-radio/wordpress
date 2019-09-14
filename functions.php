<?php

//Import functions partials from lib/ folder to main functions files
//This file add core functionaility that we need from Wordpress
require_once('lib/theme-support.php');

require_once('lib/helpers.php');
require_once('lib/enqueue-assets.php');
require_once('lib/sidebars.php');
require_once('lib/menus.php');
require_once('lib/remove_posts.php');
//add option to duplicate existing post
require_once('lib/duplicate_post_function.php');
//function to link thumbnail to its related post - to do : delete fonction to display thumbnail, already in theme-support.php
require_once('lib/thumbnails_display_and_link.php');
//Function to diplay a generic navigation in single-post files
require_once('lib/the_post_navigation.php');
