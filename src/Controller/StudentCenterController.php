<?php

namespace App\Controller;

use App\Repository\SchoolClassHeaderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentCenterController extends AbstractController
{
    #[Route('/student/center', name: 'app_student_center')]
    public function index(): Response
    {
        return $this->render('student_center/index.html.twig', [
            'controller_name' => 'StudentCenterController',
        ]);
    }

    #[Route('student-center/select-class/enroll', name: 'enroll_class_header')]
    public function enrollStudentClassHeader(SchoolClassHeaderRepository $classHeaderRepository): Response
    {
        return $this->render('student_center/enroll_class_header.html.twig', [
            'classHeader' => $classHeaderRepository->findAll()
        ]);
    }
}
