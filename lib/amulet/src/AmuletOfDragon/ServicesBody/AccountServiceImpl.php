<?php
/**
 * Created by PhpStorm.
 * User: maks
 * Date: 28.04.14
 * Time: 18:58
 */

namespace AmuletOfDragon\ServicesBody;


use AmuletOfDragon\Documents\Account;
use AmuletOfDragon\Exception\AccountServiceException;
use AmuletOfDragon\Helper\RegExp;
use AmuletOfDragon\Services\AccountRepository;
use AmuletOfDragon\Services\AccountService;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\DocumentNotFoundException;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Class AccountServiceImpl
 * @package AmuletOfDragon\ServicesBody
 */
class AccountServiceImpl implements AccountService
{
    /** @var  DocumentManager */
    protected $documentManager;
    /** @var  EventDispatcher */
    protected $eventDispatcher;

    public function commit()
    {
        $this->documentManager->flush();
    }

    /**
     * @param mixed $documentManager
     */
    public function setDocumentManager($documentManager)
    {
        $this->documentManager = $documentManager;
    }

    /**
     * @param Account $account
     * @return void
     */
    public function persist(Account $account)
    {
        $this->documentManager->persist($account);
    }

    /**
     * @return AccountRepository
     */
    public function getRepository()
    {
        return $this->documentManager->getRepository('AmuletOfDragon\Documents\Account');
    }

    public function createAccount($email, $password)
    {
        if (!preg_match(RegExp::EMAIL, $email)) {
            throw new AccountServiceException("Email invalid");
        }
        try {
            $account = $this->getRepository()->findByEmail($email);
            throw new AccountServiceException("Email already exists");
        } catch (DocumentNotFoundException $e) {
            $account = new Account();
            $account->setEmail($email);
            $account->setPassword(md5(md5($password)));
            $this->persist($account);
            $this->commit();
            return $account;
        }
    }

    /**
     * @param string $password
     * @param Account $account
     * @return bool
     */
    public function verifyPassword($password, $account)
    {
        return $account->getPassword() == md5(md5($password));
    }

    /**
     * @param \Symfony\Component\EventDispatcher\EventDispatcher $eventDispatcher
     */
    public function setEventDispatcher($eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }
}