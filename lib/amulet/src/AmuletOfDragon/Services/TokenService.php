<?php
/**
 * Created by PhpStorm.
 * User: maks
 * Date: 28.04.14
 * Time: 20:00
 */

namespace AmuletOfDragon\Services;


use AmuletOfDragon\Documents\Account;
use AmuletOfDragon\Documents\Token;

interface TokenService extends CommitInterface{
    /**
     * @return TokenRepository
     */
    public function getRepository();

    /**
     * @param string $value
     * @param bool $remember
     * @return mixed
     */
    public function createToken($value, $remember = true);

    /**
     * @param Token $token
     * @return bool
     */
    public function isValid(Token $token);

    /**
     * @param Token $token
     * @return void
     */
    public function persist(Token $token);
} 