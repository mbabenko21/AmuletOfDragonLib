<?php
/**
 * Created by PhpStorm.
 * User: maks
 * Date: 28.04.14
 * Time: 18:45
 */

namespace AmuletOfDragon\Services;


use AmuletOfDragon\Documents\Columns\Token;

interface TokenRepository {
    /**
     * @param $hash
     * @return \AmuletOfDragon\Documents\Token
     */
    public function findTokenByHash($hash);

} 