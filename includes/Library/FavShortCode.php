<?php

/**
 * @name FavoritePosts
 * @package Wordpress Favorite Posts
 * @version 1.0
 * @author Luis Campos <falcon758@hotmail.com>
 */

//Set namespace
namespace FavoritePosts\Library;

use FavoritePosts\Library\FavPosts;

/**
* Main Class to Source Code In Wordpress
* @access public
* @return object SC
*/
class FavShortCode
{

    /**
     * @name showFavorites
     * @access public
     * @return The Html to show Favorite
     */
    public static function showFavorites() 
    {
        $listFavorites = FavPosts::listTitleFavorites();
        echo "<ul id=\"wpfp-favorite-shortcode\">";
        
        foreach ($listFavorites as $favorite) 
        {
            echo "<li>" . $favorite . "</li>";
        }
        
        echo "</ul>";
    }
}

