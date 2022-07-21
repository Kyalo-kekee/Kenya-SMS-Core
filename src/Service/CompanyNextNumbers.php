<?php

namespace App\Service;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Id\AbstractIdGenerator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class CompanyNextNumbers extends AbstractIdGenerator
{
    private SystemSQL $SQL;
    public Session $session;

    public function __construct(SystemSQL $systemSQL, Request $request)
    {
        $this->SQL = $systemSQL;
        $this->session = $request->getSession();
    }

    public function generate(EntityManager $em, $entity)
    {
        $next_number =$this->SQL->execSQLProcedure(
            'CompaniesNextNumbers',
            [
                'CompanyID'=>$this->session->get('CompanyID'),
                'BranchID' => $this->session->get('BranchID'),
                'Entity' => $entity::class,
                'EntityID' => null
            ],
            [
                'EntityID', 'NextNumber'
            ]
        )[0];

        return $next_number['NextNumber'];
    }
}