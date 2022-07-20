<?php

namespace App\Service;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\ResultSetMapping;

class PopulateDashboardA
{
  public EntityManagerInterface $entityManager;
    public function __construct(EntityManagerInterface $em)
    {
        $this->entityManager = $em;
    }

    public function execSQLProcedure()
    {
        /*$conn = DriverManager::getConnection([
            'url' => 'sqlsrv://smartenduser:l0l0t1ng@2209@localhost:1433/SMS_CLIENT'
        ]);*/


        $rsm = new ResultSetMapping();
        $rsm ->addScalarResult('Name','School Name');
        $commandTxt= $this ->entityManager->createNativeQuery('DashboardA :schoolId',$rsm);
        $commandTxt ->setParameter(':schoolId',null);
        return ['result'=> $commandTxt->getResult()];

    }
}