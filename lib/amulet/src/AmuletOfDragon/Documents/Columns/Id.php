<?php
/**
 * Created by PhpStorm.
 * User: maks
 * Date: 28.04.14
 * Time: 16:37
 */

namespace AmuletOfDragon\Documents\Columns;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

trait Id {
    /**
     * @var
     * @ODM\Id(strategy="INCREMENT")
     */
    protected $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
} 