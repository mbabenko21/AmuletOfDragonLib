<?php
/**
 * Created by PhpStorm.
 * User: maks
 * Date: 28.04.14
 * Time: 20:03
 */

namespace AmuletOfDragon\ServicesBody;


use AmuletOfDragon\Documents\Token;
use AmuletOfDragon\Exception\TokenServiceException;
use AmuletOfDragon\Helper\EventsStore;
use AmuletOfDragon\Services\TokenRepository;
use AmuletOfDragon\Services\TokenService;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\DocumentNotFoundException;
use Symfony\Component\EventDispatcher\EventDispatcher;

class TokenServiceImpl implements TokenService
{
    /**
     * @var DocumentManager
     */
    protected $documentManager;
    /** @var  EventDispatcher */
    protected $eventDispatcher;

    public function commit()
    {
        $this->documentManager->flush();
    }

    /**
     * @return TokenRepository
     */
    public function getRepository()
    {
        return $this->documentManager->getRepository('AmuletOfDragon\Documents\Token');
    }

    /**
     * @param string $value
     * @param bool $remember
     * @throws \AmuletOfDragon\Exception\TokenServiceException
     * @return mixed
     */
    public function createToken($value, $remember = true)
    {
        try {
            $this->getRepository()->findTokenByHash($value);
            throw new TokenServiceException("Token value is invalid or already exists");
        } catch (DocumentNotFoundException $e) {
            $token = new Token();
            $token->setHash($value);
            $expireDate = new \DateTime();
            if ($remember) {
                $time = time() + 60 * 60 * 24 * 30;
                $expireDate->setTimestamp($time);
            } else {
                $expireDate->setTimestamp(time() + 10 * 60);
            }
            $token->setExpireDate($expireDate);
            $this->persist($token);
            $this->commit();
            return $token;
        }
    }

    /**
     * @param Token $token
     * @return bool
     */
    public function isValid(Token $token)
    {
        // TODO: Implement isValid() method.
    }

    /**
     * @param Token $token
     * @return void
     */
    public function persist(Token $token)
    {
        $this->documentManager->persist($token);
    }

    /**
     * @param \Doctrine\ODM\MongoDB\DocumentManager $documentManager
     */
    public function setDocumentManager($documentManager)
    {
        $this->documentManager = $documentManager;
    }

    /**
     * @param \Symfony\Component\EventDispatcher\EventDispatcher $eventDispatcher
     */
    public function setEventDispatcher($eventDispatcher)
    {
        //$eventDispatcher->addListener(EventsStore::)
        $this->eventDispatcher = $eventDispatcher;
    }
}