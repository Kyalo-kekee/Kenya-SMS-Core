<?php

namespace App\Controller;

use App\Repository\MshuleUserRepository;
use App\Service\PopulatePageData;
use Bridge\Src\Helpers\MenuInfo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(): Response
    {
        return $this->render('security/user_view.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    #[Route('employee-header', name: 'app_employee_header')]
    public function EmployeeHeader(MshuleUserRepository $repository)
    {
        return $this->render('security/user_view.html.twig',
            (new PopulatePageData(
                UserController::class,
                MenuInfo::MENU_SYSTEM_SETTINGS,
                true,
                [
                    'controller_name' => 'UserController',
                    'emp' => $repository->findAll()
                ]
            ))->get()
        );
    }
}
