<?php
if (function_exists('register_sidebar')) { 
    register_sidebar('custom'); 
}
function register_header_nav() {
	register_nav_menu('header_nav', 'Header Navigation');
}
add_action('init', 'register_header_nav');
add_theme_support('automatic-feed-links');
if (!isset($content_width))
        $content_width = 960; // Not really, since the CSS uses ems.
?>
