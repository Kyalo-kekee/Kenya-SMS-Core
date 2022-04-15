<?php

namespace App\Controller;

use App\Repository\InstitutionSetupRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InstitutionSetupController extends AbstractController
{


    #[Route('/school-setup/school-information',name: 'app_school_information')]
    public function institutionInformation(InstitutionSetupRepository $repository):Response
    {
        return $this ->render('institution_setup/school_information.html.twig',[
            'schools' =>$repository ->findAll()
        ]);
    }
}
