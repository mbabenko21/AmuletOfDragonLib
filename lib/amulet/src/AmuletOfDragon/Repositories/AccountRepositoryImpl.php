<?php
/**
 * Created by PhpStorm.
 * User: maks
 * Date: 28.04.14
 * Time: 19:03
 */

namespace AmuletOfDragon\Repositories;


use AmuletOfDragon\Documents\Account;
use AmuletOfDragon\Documents\Token;
use AmuletOfDragon\Services\AccountRepository;
use Doctrine\ODM\MongoDB\DocumentNotFoundException;
use Doctrine\ODM\MongoDB\DocumentRepository;

class AccountRepositoryImpl extends DocumentRepository implements AccountRepository {
    /**
     * @param string $email
     * @return Account|object
     * @throws \Doctrine\ODM\MongoDB\DocumentNotFoundException
     */
    public function findByEmail($email){
        $criteria = [
            "email" => $email
        ];

        $acc = $this->findOneBy($criteria);
        if($acc instanceof Account === false){
            throw new DocumentNotFoundException("Account with email: $email not exists");
        }
        return $acc;
    }

    /**
     * @param Token $token
     * @throws \Doctrine\ODM\MongoDB\DocumentNotFoundException
     * @return mixed
     */
    public function findByToken(Token $token)
    {
        $criteria = [
            "token" => $token
        ];

        $acc = $this->findOneBy($criteria);
        if($acc instanceof Account === false){
            throw new DocumentNotFoundException("Account with token: ".$token->getId()." not exists");
        }
        return $acc;
    }
}