<?php
/**
 * Created by PhpStorm.
 * User: maks
 * Date: 28.04.14
 * Time: 18:14
 */

namespace AmuletOfDragon\Documents\Classes\Player;


use AmuletOfDragon\Documents\Player;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
/**
 * Class Ranger
 * @package AmuletOfDragon\Documents\Classes\Player
 *
 * @ODM\Document
 */
class Ranger extends Player{
    public function __construct(){
        $this->setPlayerClass(self::RANGER);
        parent::__construct();
    }
} 