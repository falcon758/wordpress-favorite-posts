<?php

/**
 * @name FavoritePosts
 * @package Wordpress Favorite Posts
 * @version 1.0
 * @author Luis Campos <falcon758@hotmail.com>
 */

namespace FavoritePosts\Hooks;

class Main implements IHook {

    public function registerHooks() {        
        // Inject content
        add_filter('the_content', [WPFP_NAMESPACE . '\Library\Fp', 'insertFavorite']);

        // Init scripts
        add_action('wp_enqueue_scripts', [WPFP_NAMESPACE . '\Library\InjectJS', 'load']);

        // Widget
        add_action('widgets_init', [WPFP_NAMESPACE . '\Library\FavWidget', 'load']);

        //ShortCode
        add_shortcode('wpfp-favorites', [WPFP_NAMESPACE . '\Library\FavShortCode', 'showFavorites']);
    }
}
