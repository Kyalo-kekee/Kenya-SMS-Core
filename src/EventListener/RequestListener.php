<?php

namespace App\EventListener;

use App\Service\SystemSQL;
use Doctrine\ORM\Query\ResultSetMapping;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionFactory;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class RequestListener
{
    private Session $session;
    private $query;

    public function __construct(SystemSQL $systemSQL)
    {
        $this->query = $systemSQL;
    }

    public function onKernelRequest(RequestEvent $event)
    {
        $this->session = $event->getRequest()->getSession();
        $this->setSessionMetaData();
    }

    public function setSessionMetaData()
    {
        $rsm = new ResultSetMapping();
        $rsm->addScalarResult('CompanyID','CompanyID');
        $rsm->addScalarResult('BranchID','BranchID');


        if (!$this->session->has('CompanyID') && !$this->session->has('BranchID')) {
            $result = $this->query->execSQLProcedure(
                'GetCompanyInformation_MS_1',
            $rsm
            );
            $this->session->set('CompanyID', $result[0]['CompanyID']);
            $this->session->set('BranchID', $result[0]['BranchID']);
        }

    }
}