<?php
/**
 * Created by PhpStorm.
 * User: macintosh
 * Date: 11/06/2018
 * Time: 00:57
 */

namespace Libs\helper;


class Utils
{
    public static function get($key)
    {
        if(isset($_POST[$key]))
        {
            return $_POST[$key];
        }
        elseif ($_GET[$key])
        {
            return $_GET[$key];
        }
        else{
            return "";
        }
    }

}