<?php

namespace App\Service;

use App\Entity\GetNextNumberIDS;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Id\AbstractIdGenerator;
use Doctrine\ORM\Id\IdentityGenerator;
use PragmaRX\Random\Random;

class NextEntityKey extends AbstractIdGenerator
{

    public function generateId(EntityManagerInterface $em, $entity): string
    {
        $entityNextNumber = $em->getRepository(GetNextNumberIDS::class);
        $result = $entityNextNumber->createQueryBuilder('n')
            ->select('n.NextValueSlot', 'n.PrefixID','n.ToForceRandomIdGeneration')
            ->where('n.ObjectSignatureNamespace = :val')
            ->setParameter(':val', $entity::class)
            ->getQuery()
            ->getArrayResult();




        if (count($result) == 0 or count($result) > 1) {
            $val = new Random();
            $nextNumberValue = 1 ;
            $this ->updateNextNumber($entityNextNumber, $entity,$nextNumberValue, 0);
            return $val->size(5)->alpha(false)->get();
        }

        if ($result[0]['ToForceRandomIdGeneration']) {
            $val = new Random();
            $nextNumberValue = !(int)$result[0]['NextValueSlot']?? 1 ;
            $this ->updateNextNumber($entityNextNumber, $entity,$nextNumberValue, 1);
            return $val->size(5)->prefix((string)$result[0]['PrefixID'])->get();

        } else {

            $prefix = (string)$result[0]['PrefixID'];
            $nextNumberValue = !(int)$result[0]['NextValueSlot']?? 1 ;
            $this ->updateNextNumber($entityNextNumber, $entity,$nextNumberValue, 1);

            return $prefix . date("Y") . '-' . $nextNumberValue;
        }

    }

    function updateNextNumber($em, $entity, $nextNumberValue, $increment)
    {
        $em->createQueryBuilder('n')
            ->update()
            ->set('n.NextValueSlot', $nextNumberValue + $increment)
            ->where('n.ObjectSignatureNamespace = :val')
            ->setParameter('val', $entity::class)
            ->getQuery()->execute();
    }
}