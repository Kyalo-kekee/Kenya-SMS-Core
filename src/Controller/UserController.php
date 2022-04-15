<?php

namespace App\Controller;

use App\Repository\MshuleUserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    #[Route('employee-header', name: 'app_employee_header')]
    public  function EmployeeHeader(MshuleUserRepository $repository)
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
            'emp'=>$repository ->findAll()
        ]);
    }
}
