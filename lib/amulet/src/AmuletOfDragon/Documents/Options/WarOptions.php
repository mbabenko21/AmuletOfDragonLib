<?php
/**
 * Created by PhpStorm.
 * User: maks
 * Date: 28.04.14
 * Time: 17:44
 */

namespace AmuletOfDragon\Documents\Options;
use AmuletOfDragon\Documents\Columns\Id;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
/**
 * Class WarOptions
 * @package AmuletOfDragon\Documents\Options
 *
 * @ODM\Document(collection="war_options")
 */
class WarOptions {
    use Id;

    /**
     * @var int
     * @ODM\Int
     */
    public $hit;
    /**
     * @var int
     * @ODM\Int
     */
    public $magHit;
    /**
     * @var int
     * @ODM\Int
     */
    public $attack;
    /**
     * @var int
     * @ODM\Int
     */
    public $magBoost;
    /**
     * @var int
     * @ODM\Int
     */
    public $defence;
    /**
     * @var int
     * @ODM\Int
     */
    public $magDef;
    /**
     * @var int
     * @ODM\Int
     */
    public $bias;
    /**
     * @var int
     * @ODM\Int
     */
    public $magBias;
    /**
     * @var int
     * @ODM\Int
     */
    public $parring;
    /**
     * @var int
     * @ODM\Int
     */
    public $shieldBlock;
    /**
     * @var int
     * @ODM\Int
     */
    public $physCrit;
    /**
     * @var int
     * @ODM\Int
     */
    public $magCrit;
} 