<?php
/**
 * Created by PhpStorm.
 * User: maks
 * Date: 28.04.14
 * Time: 19:08
 */

namespace AmuletOfDragon\Services;


use AmuletOfDragon\Documents\Account;
use AmuletOfDragon\Documents\Token;

interface AccountRepository {
    /**
     * @param $email
     * @return Account
     */
    public function findByEmail($email);

    /**
     * @param Token $token
     * @return mixed
     */
    public function findByToken(Token $token);
} 