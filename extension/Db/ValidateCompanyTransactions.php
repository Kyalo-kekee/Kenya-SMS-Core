<?php

namespace Extension\Db;

use App\Entity\Company;
use App\Repository\CompanyRepository;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class ValidateCompanyTransactions extends  EntityManager
{
    public function  canPostTransaction(Request $request, FormInterface $form)
    {

    }

    public  function  loadCompanyIntoSession(Session $session )
    {
        $companyData = $this ->getRepository(Company::class) ->findAll()[0];
        $session ->set('CompanyID',$companyData->getCompanyID());
        $session->set('BranchID',$companyData->getBranchID());
        $session ->set('DepartmentID',$companyData->getDepartmentID());
    }

}