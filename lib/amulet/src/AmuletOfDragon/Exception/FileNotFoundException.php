<?php
/**
 * Created by PhpStorm.
 * User: maks
 * Date: 28.04.14
 * Time: 15:15
 */

namespace AmuletOfDragon\Exception;


class FileNotFoundException extends \RuntimeException {
    public function __construct($file){
        $mess = sprintf("File %s not found", $file);
        parent::__construct($mess);
    }
} 