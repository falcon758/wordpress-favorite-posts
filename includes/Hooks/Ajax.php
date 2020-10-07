<?php

/**
 * @name FavoritePosts
 * @package Wordpress Favorite Posts
 * @version 1.0
 * @author Luis Campos <falcon758@hotmail.com>
 */

namespace FavoritePosts\Hooks;

class Ajax implements IHook {

    public function registerHooks() {
        add_action('wp_ajax_nopriv_get_favorites', [WPFP_NAMESPACE . '\Library\FpApi', 'listFavorites']);
        add_action('wp_ajax_nopriv_update_favorites', [WPFP_NAMESPACE . '\Library\FpApi', 'update']);
        add_action('wp_ajax_nopriv_remove_favorites', [WPFP_NAMESPACE . '\Library\FpApi', 'remove']);
        add_action('wp_ajax_nopriv_get_favorites_title',[WPFP_NAMESPACE . '\Library\FpApi', 'favoritesTitle']);
        
        add_action('wp_ajax_get_favorites', [WPFP_NAMESPACE . '\Libary\FpApi', 'listFavorites']);
        add_action('wp_ajax_update_favorites', [WPFP_NAMESPACE . '\Library\FpApi', 'update']);
        add_action('wp_ajax_remove_favorites', [WPFP_NAMESPACE . '\Library\FpApi', 'remove']);
        add_action('wp_ajax_get_favorites_title',[WPFP_NAMESPACE . '\Library\FpApi', 'favoritesTitle']);
    }
}
