<?php

/**
 * @name FavoritePosts
 * @package Wordpress Favorite Posts
 * @version 1.0
 * @author Luis Campos <falcon758@hotmail.com>
 */

//Set namespace
namespace FavoritePosts\Library;

/**
* Load File(Javascript) to Favorite Plugin
* @access public
* @return object Lf
*/
class InjectJS 
{
    /**
     * @name load
     * @access public
     * @return Javascript embed in HTML
     */
    public static function load() 
    {
        $folder = WPFP_URL . '/public/js/';
        wp_enqueue_script('action-favorites', $folder . 'favorite_posts.js', ['jquery'], '1');
    }
}