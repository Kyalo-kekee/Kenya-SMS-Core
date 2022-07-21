<?php

namespace App\Service;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Id\AbstractIdGenerator;
use Doctrine\ORM\Query\ResultSetMapping;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class CompanyNextNumbers extends AbstractIdGenerator
{
    private SystemSQL $SQL;
    public Session $session;

    public function __construct(SystemSQL $systemSQL)
    {
        $this->SQL = $systemSQL;

    }

    public function generate(EntityManager $em, $entity)
    {
        $rsm = new ResultSetMapping();
        $rsm ->addScalarResult('NextValueSlot','NextNumber');
        $rsm ->addScalarResult('PrefixID','EntityID');
        $next_number =$this->SQL->execSQLProcedure(
            'CompaniesNextNumbers',
            $rsm,
            [
                'CompanyID'=>$_SESSION['_sf2_attributes']['CompanyID'],
                'BranchID' =>$_SESSION['_sf2_attributes']['BranchID'],
                'Entity' => $entity::class,

            ]
        )[0];
        //the @NextValueSlot will be used for debug purposes. return a complete id string i.e prefixed
        return $next_number['EntityID'];
    }
}