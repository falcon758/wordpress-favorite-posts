(function($) {
    /**
     * @function favorite
     * Add Data to favorite
     * @Param id int
     */
    function favorite(id){
        var favType = $('span[post-id="' + id + '"]').attr('fav-type');

        swap(id, favType);
    }

    /**
     * @function add
     * Add post as favorite
     * @Param id int
     * @Param favType int
     */
    function swap(id, favType){
        $.ajax({
            type: "POST",
            url: "/wp-admin/admin-ajax.php",

            data: {"action": "update_favorites", "post_id": id},

            success: function(response) {
                var element = $('span[post-id="' + id + '"]');
                
                var img_src = '';

                if(favType === '0') {
                    img_src = '/wp-content/plugins/wordpress-favorite-posts/public/images/favorite_on.png';
                } else {
                    img_src = '/wp-content/plugins/wordpress-favorite-posts/public/images/favorite_off.png';
                }
                
                element.find('.star-favorite').attr('src', img_src);
                element.attr('fav-type', favType === '0' ? '1' : '0');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    }

    function mountWidget(){
        $.ajax({
            type: "POST",
            url: "/wp-admin/admin-ajax.php",
            data: {"action": "get_title_favorites"},
            success: function (response) {
                $("#wpfp-favorite-widget").html('');
                $.each(response, function( key, value ){
                    $("#wpfp-favorite-widget").append('<li>'+value+'</li>');
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    }

    function injectFavorite(){
        $.ajax({
            type: "POST",
            url: "/wp-admin/admin-ajax.php",

            data: {"action": "get_favorites_title"},

            success: function(response) {
                //Verify if favorite is empty
                if(response.length == 0) {
                    $("#wpfp-favorite-widget").html('Favorites is empty');
                    $("#wpfp-favorite-shortcode").html('Favorites is empty');
                } else {
                     $("#wpfp-favorite-widget").html('');
                     $("#wpfp-favorite-shortcode").html('');

                     $.each(response, function(key, value) {
                         $("#wpfp-favorite-widget").append('<li><a href=?p='+key+'>'+value+'</a></li>');
                         $("#wpfp-favorite-shortcode").append('<li><a href=?p='+key+'>'+value+'</a></li>');
                     });
                }
            },

            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    }

    $(document).on('click', ".switch-favorite", function () {
        favorite($(this).parent().attr('post-id'));

        setTimeout(function(){
            injectFavorite();
        }, 1000);
    });
}(jQuery));
