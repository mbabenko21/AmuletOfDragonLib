<?php
/**
 * Created by PhpStorm.
 * User: maks
 * Date: 28.04.14
 * Time: 18:12
 */

namespace AmuletOfDragon\Documents\Classes\Player;


use AmuletOfDragon\Documents\Player;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
/**
 * Class Mage
 * @package AmuletOfDragon\Documents\Classes\Player
 *
 * @ODM\Document
 */
class Mage extends Player{
    public function __construct(){
        $this->setPlayerClass(self::MAGE);
        parent::__construct();
    }
} 