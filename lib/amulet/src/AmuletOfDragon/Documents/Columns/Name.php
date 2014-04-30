<?php
/**
 * Created by PhpStorm.
 * User: maks
 * Date: 28.04.14
 * Time: 16:38
 */

namespace AmuletOfDragon\Documents\Columns;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

trait Name {
    /**
     * @var string
     * @ODM\String
     */
    protected $name;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
} 