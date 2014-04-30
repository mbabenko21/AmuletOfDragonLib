<?php
/**
 * Created by PhpStorm.
 * User: maks
 * Date: 28.04.14
 * Time: 18:05
 */

namespace AmuletOfDragon\Documents\Columns;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

trait Token {
    /**
     * @var \AmuletOfDragon\Documents\Token
     * @ODM\ReferenceOne(
     * targetDocument="AmuletOfDragon\Documents\Token",
     * cascade="all",
     * discriminatorField="tokenId"
     * )
     */
    protected $token;

    /**
     * @return \AmuletOfDragon\Documents\Token
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param \AmuletOfDragon\Documents\Token $token
     */
    public function setToken(\AmuletOfDragon\Documents\Token $token)
    {
        $this->token = $token;
    }
} 