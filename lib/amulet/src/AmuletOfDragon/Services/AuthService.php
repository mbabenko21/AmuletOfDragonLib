<?php
/**
 * Created by PhpStorm.
 * User: maks
 * Date: 28.04.14
 * Time: 17:55
 */

namespace AmuletOfDragon\Services;


use AmuletOfDragon\Documents\Account;
use AmuletOfDragon\Documents\Token;

interface AuthService {
    /**
     * @param $username
     * @param $password
     * @return bool|Token
     */
    public function login($username, $password);

    /**
     * @return void
     */
    public function logout();

    /**
     * @return bool
     */
    public function hasLogged();

    /**
     * @return Account
     */
    public function getAccount();
} 