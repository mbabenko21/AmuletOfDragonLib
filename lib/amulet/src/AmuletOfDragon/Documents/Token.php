<?php
/**
 * Created by PhpStorm.
 * User: maks
 * Date: 28.04.14
 * Time: 18:03
 */

namespace AmuletOfDragon\Documents;

use AmuletOfDragon\Documents\Columns\CreatedAt;
use AmuletOfDragon\Documents\Columns\Hash;
use AmuletOfDragon\Documents\Columns\Id;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * Class Token
 * @package AmuletOfDragon\Documents
 *
 * @ODM\Document(
 * collection="tokens",
 * repositoryClass="AmuletOfDragon\Repositories\TokenRepositoryImpl"
 * )
 */
class Token {
    use Id, Hash, CreatedAt;

    /**
     * @var \DateTime
     * @ODM\Date
     */
    protected $expireDate;
    /**
     * @var bool
     * @ODM\Boolean
     */
    protected $eternal;
    /**
     * @var string
     * @ODM\String
     */
    protected $ip;
    /**
     * @var Account
     * @ODM\ReferenceOne(
     * targetDocument="Account",
     * discriminatorField="account_id"
     * )
     */
    protected $account;

    public function __construct(){
        $this->setCreatedAt(new \DateTime());
    }

    /**
     * @return \DateTime
     */
    public function getExpireDate()
    {
        return $this->expireDate;
    }

    /**
     * @param \DateTime $expireDate
     */
    public function setExpireDate($expireDate)
    {
        $this->expireDate = $expireDate;
    }

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param string $ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    /**
     * @return boolean
     */
    public function getEternal()
    {
        return $this->eternal;
    }

    /**
     * @param boolean $eternal
     */
    public function setEternal($eternal)
    {
        $this->eternal = $eternal;
    }

    /**
     * @return \AmuletOfDragon\Documents\Account
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param \AmuletOfDragon\Documents\Account $account
     */
    public function setAccount($account)
    {
        $this->account = $account;
        $account->setToken($this);
    }
} 