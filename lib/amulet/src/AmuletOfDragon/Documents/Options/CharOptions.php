<?php
/**
 * Created by PhpStorm.
 * User: maks
 * Date: 28.04.14
 * Time: 17:37
 */

namespace AmuletOfDragon\Documents\Options;

use AmuletOfDragon\Documents\Columns\Id;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
/**
 * Class CharOptions
 * @package AmuletOfDragon\Documents\Options
 *
 * @ODM\Document(collection="char_options")
 */
class CharOptions {
    use Id;

    /**
     * @var int
     * @ODM\Int
     */
    public $life;
    /**
     * @var int
     * @ODM\Int
     */
    public $maxLife;
    /**
     * @var int
     * @ODM\Int
     */
    public $mana;
    /**
     * @var int
     * @ODM\Int
     */
    public $maxMana;
    /**
     * @var int
     * @ODM\Int
     */
    public $exp;
    /**
     * @var int
     * @ODM\Int
     */
    public $needExp;
    /**
     * @var int
     * @ODM\Int
     */
    public $level;
} 