<?php
/**
 * Created by PhpStorm.
 * User: maks
 * Date: 28.04.14
 * Time: 16:40
 */

namespace AmuletOfDragon\Documents\Columns;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

trait CreatedAt {
    /** @ODM\Date */
    private $createdAt;

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }
} 