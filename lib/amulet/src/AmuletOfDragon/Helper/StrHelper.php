<?php
/**
 * Created by PhpStorm.
 * User: maks
 * Date: 28.04.14
 * Time: 15:43
 */

namespace AmuletOfDragon\Helper;


class StrHelper {
    const KEYWORD = "/({)(const)([:_#])([^(})]+)(})/";
    protected static $_keyWords = [
        "{const:root_dir}" => ROOT_DIR,
        "{const:lib_dir}" => LIB_DIR
    ];

    /**
     * @param $string
     * @return string
     */
    public static function replaceKeyWords($string){
        $className = get_called_class();
        $string = preg_replace_callback(static::KEYWORD, array($className, "getKeyWord"), $string);
        return $string;
    }

    protected static function getKeyWord($matches){
        $keyWord = $matches[0];
        switch($matches[2]){
            case "const":
                if(isset(static::$_keyWords[$matches[0]])){
                    $keyWord = static::$_keyWords[$matches[0]];
                }
                break;
        }
        return $keyWord;
    }
} 