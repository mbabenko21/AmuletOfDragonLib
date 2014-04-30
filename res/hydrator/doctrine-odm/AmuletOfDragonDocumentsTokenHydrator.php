<?php

namespace DoctrineODM\Hydrators;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\ClassMetadata;
use Doctrine\ODM\MongoDB\Hydrator\HydratorInterface;
use Doctrine\ODM\MongoDB\UnitOfWork;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ODM. DO NOT EDIT THIS FILE.
 */
class AmuletOfDragonDocumentsTokenHydrator implements HydratorInterface
{
    private $dm;
    private $unitOfWork;
    private $class;

    public function __construct(DocumentManager $dm, UnitOfWork $uow, ClassMetadata $class)
    {
        $this->dm = $dm;
        $this->unitOfWork = $uow;
        $this->class = $class;
    }

    public function hydrate($document, $data, array $hints = array())
    {
        $hydratedData = array();

        /** @Field(type="date") */
        if (isset($data['expireDate'])) {
            $value = $data['expireDate'];
            if ($value instanceof \MongoDate) { $return = new \DateTime(); $return->setTimestamp($value->sec); } elseif (is_numeric($value)) { $return = new \DateTime(); $return->setTimestamp($value); } elseif ($value instanceof \DateTime) { $return = $value; } else { $return = new \DateTime($value); }
            $this->class->reflFields['expireDate']->setValue($document, clone $return);
            $hydratedData['expireDate'] = $return;
        }

        /** @Field(type="boolean") */
        if (isset($data['eternal'])) {
            $value = $data['eternal'];
            $return = (bool) $value;
            $this->class->reflFields['eternal']->setValue($document, $return);
            $hydratedData['eternal'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['ip'])) {
            $value = $data['ip'];
            $return = (string) $value;
            $this->class->reflFields['ip']->setValue($document, $return);
            $hydratedData['ip'] = $return;
        }

        /** @ReferenceOne */
        if (isset($data['account'])) {
            $reference = $data['account'];
            if (isset($this->class->fieldMappings['account']['simple']) && $this->class->fieldMappings['account']['simple']) {
                $className = $this->class->fieldMappings['account']['targetDocument'];
                $mongoId = $reference;
            } else {
                $className = $this->unitOfWork->getClassNameForAssociation($this->class->fieldMappings['account'], $reference);
                $mongoId = $reference['$id'];
            }
            $targetMetadata = $this->dm->getClassMetadata($className);
            $id = $targetMetadata->getPHPIdentifierValue($mongoId);
            $return = $this->dm->getReference($className, $id);
            $this->class->reflFields['account']->setValue($document, $return);
            $hydratedData['account'] = $return;
        }

        /** @Field(type="int_id") */
        if (isset($data['_id'])) {
            $value = $data['_id'];
            $return = (int) $value;
            $this->class->reflFields['id']->setValue($document, $return);
            $hydratedData['id'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['hash'])) {
            $value = $data['hash'];
            $return = (string) $value;
            $this->class->reflFields['hash']->setValue($document, $return);
            $hydratedData['hash'] = $return;
        }

        /** @Field(type="date") */
        if (isset($data['createdAt'])) {
            $value = $data['createdAt'];
            if ($value instanceof \MongoDate) { $return = new \DateTime(); $return->setTimestamp($value->sec); } elseif (is_numeric($value)) { $return = new \DateTime(); $return->setTimestamp($value); } elseif ($value instanceof \DateTime) { $return = $value; } else { $return = new \DateTime($value); }
            $this->class->reflFields['createdAt']->setValue($document, clone $return);
            $hydratedData['createdAt'] = $return;
        }
        return $hydratedData;
    }
}