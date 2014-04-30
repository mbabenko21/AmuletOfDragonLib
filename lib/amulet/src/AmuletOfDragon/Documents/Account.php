<?php
/**
 * Created by PhpStorm.
 * User: maks
 * Date: 28.04.14
 * Time: 16:36
 */

namespace AmuletOfDragon\Documents;

use AmuletOfDragon\Documents\Columns\CreatedAt;
use AmuletOfDragon\Documents\Columns\Id;
use AmuletOfDragon\Documents\Columns\Token;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * Class Account
 * @package AmuletOfDragon\Documents
 *
 * @ODM\Document(
 * collection="accounts",
 * indexes={
 *     @ODM\Index(keys={"email"="desc"}, options={"unique"=true})
 * },
 * repositoryClass="AmuletOfDragon\Repositories\AccountRepositoryImpl"
 * )
 */
class Account {
    use Id, CreatedAt, Token;

    /**
     * @var string
     * @ODM\String
     */
    protected $email;
    /**
     * @var string
     * @ODM\String
     */
    protected $password;
    /**
     * @var array
     * @ODM\ReferenceMany(
     * strategy="set",
     * cascade="all",
     * sort={"name": "asc"},
     * targetDocument="Player",
     * discriminatorField="player_id"
     * )
     */
    protected $players = array();
    /**
     * @var Player
     * @ODM\ReferenceOne(
     * targetDocument="Player",
     * discriminatorField="current_player_id"
     * )
     */
    protected $activePlayer;

    public function __construct(){
        $this->setCreatedAt(new \DateTime());
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * @param Player $player
     */
    public function addPlayer(Player $player){
        $this->players[] = $player;
    }

    /**
     * @param mixed $players
     */
    public function setPlayers($players)
    {
        $this->players = $players;
    }
} 