<?php

namespace App\Controller;

use App\Entity\ClassHeader;
use App\Entity\ClassHeaderDetails;
use App\Form\ClassHeaderType;
use App\Repository\ClassHeaderRepository;
use App\Repository\InstitutionSetupRepository;
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

    #[Route('/school-setup/add-class',name: 'app_add_class')]
    public function createSchoolClass(Request $request, EntityManagerInterface $entityManager)
    {
        $classModel = new ClassHeader();
        $classModelDetail = new ClassHeaderDetails();
        $form= $this ->createForm(ClassHeaderType::class,$classModel);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $classModel->setClassName($form->get('ClassName')->getData());
            $classModel->setMaximumStudentCapacity($form->get('MaximumStudentCapacity')->getData());
            $classModel->setMinimumStudentCapacity($form->get('MinimumStudentCapacity')->getData());
            $classModel->setHasStreams($form->get('HasStreams')->getData());

            try {
                $entityManager->persist($classModel);
                $entityManager->flush();



            /*
             * add class sections/streams
             * Get ID of the class to add a stream
             * */

            $classId = $classModel ->getId();

            $classModelDetail ->setClassID($classId);
            $classModelDetail->setSectionID($form->get('SectionID')->getData());
            $classModelDetail ->setMaxStudents($form->get('MaxStudents')->getData());
            $classModelDetail ->setMinStudents($form->get('MinStudents')->getData());
            //$classModelDetail ->setClassPrefect($form->get('ClassPrefect')->getData());
            $entityManager->persist($classModelDetail);
            $entityManager->flush();
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
