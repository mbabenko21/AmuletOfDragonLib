<?php
/**
 * Created by PhpStorm.
 * User: maks
 * Date: 28.04.14
 * Time: 18:51
 */

namespace AmuletOfDragon\Services;


use AmuletOfDragon\Documents\Account;

interface AccountService extends CommitInterface {
    /**
     * @return AccountRepository
     */
    public function getRepository();
    /**
     * @param Account $account
     * @return void
     */
    public function persist(Account $account);

    /**
     * @param string $email
     * @param string $password
     * @return Account
     */
    public function createAccount($email, $password);

    /**
     * @param string $password
     * @param Account $account
     * @return bool
     */
    public function verifyPassword($password, $account);


} 