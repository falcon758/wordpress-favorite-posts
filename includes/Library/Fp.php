<?php

/**
 * @name FavoritePosts
 * @package Wordpress Favorite Posts
 * @version 1.0
 * @author Luis Campos <falcon758@hotmail.com>
 */

//Set namespace
namespace FavoritePosts\Library;

use FavoritePosts\Template\Loader;
use FavoritePosts\Library\FavPosts;

/**
* Main Fp class
* @access public
* @return object FV
*/
class Fp 
{
    /**
     * @name insertFavorite
     * @access public
     * @param string $data
     */
    public static function insertFavorite($data) 
    {
        echo $data;
        
        $template = (new Loader())->get();
        
        $exists = FavPosts::existFavorite(get_the_ID(), FavPosts::favorites());
        
        $attr = [
            'exists' => $exists, 
            'post_id' => get_the_ID(), 
            'img_src' =>  WPFP_URL . 
            '/public/images/'
        ];
        
        echo $template->render('favorite-content.twig', $attr);
    }
}