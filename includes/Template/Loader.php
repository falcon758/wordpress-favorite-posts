<?php

namespace FavoritePosts\Template;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Loader
{

    public function get()
    {
        return new Environment(
            new FilesystemLoader(WPFP_PATH . '/templates'),
            []
        );
    }
}
