<?php
/**
 * Created by PhpStorm.
 * User: maks
 * Date: 28.04.14
 * Time: 15:14
 */

namespace AmuletOfDragon;


use AmuletOfDragon\Exception\FileNotFoundException;
use Symfony\Component\Yaml\Yaml;

class Config {
    protected $data;
    public function __construct($file){
        if(file_exists($file)){
            $this->data = Yaml::parse(file_get_contents($file));
        } else {
            throw new FileNotFoundException($file);
        }
    }

    public function __get($key){
        if (isset($this->data[$key])) {
            return (is_array($this->data[$key])) ? (object)$this->data[$key] : $this->data[$key];
        } else { return NULL;}
    }

    public function __isset($key){
        return isset($this->data[$key]);
    }

    public function __unset($key){
        if(array_key_exists($key, $this->data)){
            unset($this->data[$key]);
            unset($this->data[$key]);
        }
    }
} 