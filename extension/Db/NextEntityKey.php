<?php

namespace Extension\Db;

use App\Entity\CompaniesNextNumbers;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Id\AbstractIdGenerator;
use Extension\Db\Exceptions\NextEntityException;

class NextEntityKey extends AbstractIdGenerator
{

    /**
     * @throws NextEntityException
     */
    public function generateId(EntityManagerInterface $em, $entity): string
    {
        $entityNextNumber = $em->getRepository(CompaniesNextNumbers::class);
        $result = $entityNextNumber->createQueryBuilder('n')
            ->select('n.NextNumberValue', 'n.Prefix')
            ->where('n.EntityClass = :val')
            ->setParameter(':val', $entity::class)
            ->getQuery()
            ->getArrayResult();

        if (count($result) == 0 or count($result) > 1) {
            throw  new NextEntityException('NextEntity Found: class matches nothing or contains more than one definitions');
        }

        $nextNumberValue = (int)$result[0]['NextNumberValue'];
        $prefix = (string)$result[0]['Prefix'];

        $entityNextNumber->createQueryBuilder('n')
            ->update()
            ->set('n.NextNumberValue', $nextNumberValue + 1)
            ->where('n.EntityClass = :val')
            ->setParameter('val', $entity::class)
            ->getQuery()->execute();

        return $prefix . date("Y") . '-' . $nextNumberValue;
    }
}

