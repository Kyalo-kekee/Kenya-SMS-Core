<?php

namespace App\Controller;

use App\Service\PopulateDashboardA;
use App\Service\SystemSQL;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(SystemSQL $dashboardA, Session $session): Response
    {
        dd($_SESSION['_sf2_attributes']);
         /*dd($dashboardA ->execSQLProcedure(
             '[dbo].[DashboardA]',
             array('schoolId'=>null),
             [
                 'Name'=> 'SchoolName'
             ]
         ));*/
       /* $result = $dashboardA->execSQLProcedure(
            'GetCompanyInformation_MS_1',
            [
            ],
            [
                'CompanyID'  => 'CompanyID',
                'BranchID' => 'BranchID'
            ]
        );
        dd($session->get('CompanyID'));*/

        return $this->render('masterpages/blank.twig', [
            'global_menu'=> true,
        ]);
    }
}
