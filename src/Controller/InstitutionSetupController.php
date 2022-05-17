<?php

namespace App\Controller;

use App\Entity\ClassHeader;
use App\Entity\ClassHeaderDetails;
use App\Entity\SchoolClassHeader;
use App\Form\ClassHeaderType;
use App\Form\SchoolHeaderFormType;
use App\Repository\ClassHeaderRepository;
use App\Repository\InstitutionSetupRepository;
use App\Repository\SchoolClassHeaderRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/school-setup/{action}/{id}',name: 'app_add_class')]
    public function createSchoolClass(
        Request $request,
        EntityManagerInterface $entityManager,
        SchoolClassHeaderRepository $classHeaderRepository,
        string $action = 'add_class',
        string $id = null

    ): Response
    {
       $classModel = match ($action){
           'add_class' => new SchoolClassHeader(),
           'edit'=> $classHeaderRepository ->find($id)
       };
        $form= $this ->createForm(SchoolHeaderFormType::class,$classModel);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $classModel ->setClassName($form ->get('ClassName')->getData());
            $classModel ->setClassColorID($form->get('ClassColorID')->getData());
            $classModel ->setCreatedBy($this->getUser()->getUserIdentifier());
            $classModel ->setLevelID($form->get('LevelID')->getData());
            $classModel ->setRemarks($form->get('Remarks')->getData());
            $classModel ->setStatus($form->get('Status')->getData());

            try {

                $entityManager ->commit($classModel);
                $entityManager ->flush();

            $this->addFlash('success','Class Added successfully');
            }catch (\Exception $e)
            {
                $this->addFlash("fail",$e->getMessage());
            }

        }
        return $this ->render('institution_setup/add_class_information.html.twig',[
            'classForm' =>$form ->createView()
        ]);
    }

    #[Route('/institution-setup/class-header', name: 'app_class_header')]
    public function  classHeader(ClassHeaderRepository $repository): Response
    {
        return $this ->render('institution_setup/class_header.html.twig',[
            'classHeader' =>$repository->findAll()
        ]);
    }

    #[Route('/class-header-details/{mode}/{id}',name: 'app_class_header_details')]
    public function classHeaderDetails(ClassHeaderRepository $repository,$mode ='detail',$id=null): Response
    {
        return $this ->render('institution_setup/class_header_details.html.twig',[
            'classHeader' =>$repository -> find($id)
        ]);
    }
}
