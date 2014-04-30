<?php
/**
 * Created by PhpStorm.
 * User: maks
 * Date: 28.04.14
 * Time: 18:11
 */

namespace AmuletOfDragon\Documents\Classes\Player;


use AmuletOfDragon\Documents\Player;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
/**
 * Class Warrior
 * @package AmuletOfDragon\Documents\Classes\Player
 *
 * @ODM\Document
 */
class Warrior extends Player {

    public function __construct(){
        $this->setPlayerClass(self::WARRIOR);
        parent::__construct();
    }

} 