<?php
/**
 * Created by PhpStorm.
 * User: maks
 * Date: 28.04.14
 * Time: 19:58
 */

namespace AmuletOfDragon\Repositories;


use AmuletOfDragon\Documents\Token;
use AmuletOfDragon\Services\TokenRepository;
use Doctrine\ODM\MongoDB\DocumentNotFoundException;
use Doctrine\ODM\MongoDB\DocumentRepository;

class TokenRepositoryImpl extends DocumentRepository implements TokenRepository {

    /**
     * @param $hash
     * @throws \Doctrine\ODM\MongoDB\DocumentNotFoundException
     * @return Token
     */
    public function findTokenByHash($hash)
    {
        $criteria = [
            "hash" => $hash
        ];
        $token = $this->findOneBy($criteria);
        if($token instanceof Token === false){
            throw new DocumentNotFoundException();
        }
        return $token;
    }
}