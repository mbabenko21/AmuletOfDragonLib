<?php
/**
 * Created by PhpStorm.
 * User: maks
 * Date: 28.04.14
 * Time: 17:58
 */

namespace AmuletOfDragon\Documents\Columns;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

trait Hash {
    /**
     * @var string
     * @ODM\String
     */
    protected $hash;

    /**
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @param string $hash
     */
    public function setHash($hash)
    {
        $this->hash = $hash;
    }
} 