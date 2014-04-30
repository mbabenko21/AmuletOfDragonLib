<?php
/**
 * Created by PhpStorm.
 * User: maks
 * Date: 29.04.14
 * Time: 20:22
 */

namespace AmuletOfDragon\ServicesBody;


use AmuletOfDragon\Documents\Account;
use AmuletOfDragon\Exception\AuthException;
use AmuletOfDragon\Services\AccountService;
use AmuletOfDragon\Services\AuthService;
use AmuletOfDragon\Services\TokenService;
use Doctrine\ODM\MongoDB\DocumentNotFoundException;

class AuthServiceImpl implements AuthService
{
    /** @var  AccountService */
    protected $accountService;
    /** @var  TokenService */
    protected $tokenService;

    /**
     * @param $username
     * @param $password
     * @throws \AmuletOfDragon\Exception\AuthException
     * @return bool
     */
    public function login($username, $password)
    {
        try {
            $acc = $this->accountService->getRepository()->findByEmail($username);
            if($this->accountService->verifyPassword($password, $acc)){
                $hash = md5($acc->getEmail()."_".$acc->getPassword()."_".$acc->getId()."_".microtime(true));
                $token = $this->tokenService->createToken($hash, true);
                $acc->setToken($token);
                $this->accountService->persist($acc);
                $this->accountService->commit();
                return $acc->getToken();
            } else {
                throw new AuthException();
            }
        } catch (DocumentNotFoundException $e) {
            return false;
        }
    }

    /**
     * @return void
     */
    public function logout()
    {
        // TODO: Implement logout() method.
    }

    /**
     * @return bool
     */
    public function hasLogged()
    {
        // TODO: Implement hasLogged() method.
    }

    /**
     * @return Account
     */
    public function getAccount()
    {
        // TODO: Implement getAccount() method.
    }

    /**
     * @param mixed $accountService
     */
    public function setAccountService($accountService)
    {
        $this->accountService = $accountService;
    }

    /**
     * @param \AmuletOfDragon\Services\TokenService $tokenService
     */
    public function setTokenService($tokenService)
    {
        $this->tokenService = $tokenService;
    }
}