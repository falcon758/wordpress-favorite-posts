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
* API class to Favorite Plugin
* @access public
* @return object FvApi
*/
class FpApi extends Fp
{
     /**
     * @name favorites
     * @access public
     * @return Json of favorites
     */
    public function listFavorites() 
    {
        FavPosts::toJson(\FavPosts::favorites());
    }
    
    /**
     * @name update
     * @access public
     * @return json return json data
     * @param IdFavorite $_POST Id Of a Favorite
     */
    public function update() 
    {
        $fv = FavPosts::favorites();
        
        $post_id = intval($_POST['post_id']);
        
        if(FavPosts::existFavorite($post_id, $fv)) {
            $key = array_search($post_id, $fv);
            
            if($key !== false) {
                unset($fv[$key]);
            }
        } else {
            $fv[] = $post_id;
        }
        
        $fv = array_unique($fv);
        
        FavPosts::save(FavPosts::arrayTo($fv));
        FavPosts::toJson($fv);
    }

    /**
     * @name titleFavorites
     * @access public
     * @return json return json data
     */
    public function titleFavorites() 
    {
        FavPosts::toJson(FavPosts::listTitleFavorites());
    }
}

