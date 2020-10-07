<?php

/*
Plugin Name: Favorite Posts
Plugin URI:  https://github.com/falcon758/wp-favorite-posts
Description: A simple plugin to mark your favorite posts
Version:     1.0
Author:      Luis Campos
Author URI:  https://github.com/falcon758
*/

if (!defined( 'ABSPATH' )) {
    exit;
}

define('WPFP_NAMESPACE', '\FavoritePosts');
define('WPFP_PATH', __DIR__);
define('WPFP_URL', untrailingslashit(plugin_dir_url(__FILE__)));
define('WPFP_TEXTDOMAIN', 'favorite-posts');
define('WPFP_MINIMUM_WP_VERSION', '3.7');

require_once WPFP_PATH . '/vendor/autoload.php';

$hooks = [
    (new \FavoritePosts\Hooks\Main()),
    (new \FavoritePosts\Hooks\Ajax())
];

foreach($hooks as $hook) {
    $hook->registerHooks();
}