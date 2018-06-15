<?php

/**
 * Created by PhpStorm.
 * User: INTEX
 * Date: 14/05/2018
 * Time: 12:25 PM
 */

namespace App\Shortcodes;

class BoldShortcode
{

    public function register($shortcode, $content)
    {
        return sprintf('<strong class="%s">%s</strong>', $shortcode->class, $content);
    }

}