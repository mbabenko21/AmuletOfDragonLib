<?php
/**
 * Created by PhpStorm.
 * User: maks
 * Date: 28.04.14
 * Time: 17:30
 */

namespace AmuletOfDragon\Documents;

use AmuletOfDragon\Documents\Columns\CreatedAt;
use AmuletOfDragon\Documents\Columns\Id;
use AmuletOfDragon\Documents\Columns\Name;
use AmuletOfDragon\Documents\Options\CharOptions;
use AmuletOfDragon\Documents\Options\WarOptions;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
/**
 * Class Player
 * @package AmuletOfDragon\Documents
 *
 * @ODM\Document(
 * collection="players",
 * indexes={
 *     @ODM\Index(keys={"name"="desc"}, options={"unique"=true})
 * })
 * @ODM\InheritanceType("SINGLE_COLLECTION")
 * @ODM\DiscriminatorField("class")
 * @ODM\DiscriminatorMap({
 * "warrior" = "AmuletOfDragon\Documents\Classes\Player\Warrior",
 * "mage" = "AmuletOfDragon\Documents\Classes\Player\Mage",
 * "ranger" = "AmuletOfDragon\Documents\Classes\Player\Ranger",
 * })
 */
class Player {
    const WARRIOR = 1;
    const MAGE = 2;
    const RANGER = 3;

    use Id, Name, CreatedAt;

    /**
     * @var int
     * @ODM\Int
     */
    protected $playerClass;
    /** @var Account
     * @ODM\EmbedOne(targetDocument="Account")
     */
    protected $account;
    /**
     * @var CharOptions
     * @ODM\EmbedOne(targetDocument="AmuletOfDragon\Documents\Options\CharOptions")
     */
    protected $charOptions;
    /**
     * @var WarOptions
     * @ODM\EmbedOne(targetDocument="AmuletOfDragon\Documents\Options\WarOptions")
     */
    protected $warOptions;

    public function __construct(){
        $this->setCreatedAt(new \DateTime());
        $this->setCharOptions(new CharOptions());
        $this->setWarOptions(new WarOptions());
    }

    /**
     * @return mixed
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param mixed $account
     */
    public function setAccount($account)
    {
        $this->account = $account;
    }

    /**
     * @return \AmuletOfDragon\Documents\Options\CharOptions
     */
    public function getCharOptions()
    {
        return $this->charOptions;
    }

    /**
     * @param \AmuletOfDragon\Documents\Options\CharOptions $charOptions
     */
    public function setCharOptions(CharOptions $charOptions)
    {
        $this->charOptions = $charOptions;
    }

    /**
     * @return \AmuletOfDragon\Documents\Options\WarOptions
     */
    public function getWarOptions()
    {
        return $this->warOptions;
    }

    /**
     * @param \AmuletOfDragon\Documents\Options\WarOptions $warOptions
     */
    public function setWarOptions(WarOptions $warOptions)
    {
        $this->warOptions = $warOptions;
    }

    /**
     * @return int
     */
    public function getPlayerClass()
    {
        return $this->playerClass;
    }

    /**
     * @param int $class
     */
    public function setPlayerClass($class)
    {
        $this->playerClass = $class;
    }
} 