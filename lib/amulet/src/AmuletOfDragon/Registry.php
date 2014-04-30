<?php
/**
 * Created by PhpStorm.
 * User: maks
 * Date: 28.04.14
 * Time: 15:17
 */

namespace AmuletOfDragon;


use AmuletOfDragon\Exception\AmuletOfDragonException;
use AmuletOfDragon\Exception\RegisterException;

class Registry {
    const BUILDER = "amulet_of_dragon.builder";

    protected static $registered = array();

    /**
     * @param string $id
     * @param $object
     * @return void
     */
    public static function add($id, $object){
        static::$registered[$id] = $object;
    }

    /**
     * @param string $id
     * @return mixed
     * @throws Exception\RegisterException
     */
    public static function get($id){
        if(!isset(static::$registered[$id])){
            $mess = "Service %s not found";
            throw new RegisterException(sprintf($mess, $id));
        }
        return static::$registered[$id];
    }

    /**
     * @param $serviceId
     * @return mixed
     * @throws Exception\AmuletOfDragonException
     */
    public static function build($serviceId){
        if(isset(static::$registered[static::BUILDER])){
            return static::get(static::BUILDER)->get($serviceId);
        } else {
            throw new AmuletOfDragonException("Container builder not init");
        }
    }

    /**
     * @param string $id
     * @return void
     */
    public static function remove($id){
        if(array_key_exists($id, static::$registered)){
            unset(static::$registered[$id]);
        }
    }
} 