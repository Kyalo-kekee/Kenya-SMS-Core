<?php

namespace App\Controller;

use App\Entity\ClassHeader;
use App\Entity\ClassHeaderDetails;
use App\Entity\InstitutionSetup;
use App\Entity\SchoolClassHeader;
use App\Form\ClassHeaderType;
use App\Form\SchoolHeaderFormType;
use App\Form\SchoolInformationFormType;
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


    #[Route('/school-setup/school-information', name: 'app_school_information')]
    public function institutionInformation(InstitutionSetupRepository $repository): Response
    {
        return $this->render('institution_setup/school_information.html.twig', [
            'schools' => $repository->findAll()
        ]);
    }

    #[Route('/school-setup/{action}/{id}', name: 'app_school_edit_school_information')]
    public function addSchoolInformation(
        Request                    $request,
        InstitutionSetupRepository $institutionSetupRepository,
        EntityManagerInterface     $entityManager,
        string                     $action = 'add',
        string                     $id = null
    )
    {
        $school = match ($action) {
            'add' => new InstitutionSetup(),
            'edit' => $institutionSetupRepository->find($id)
        };
        $form = $this->createForm(SchoolInformationFormType::class, $school);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $school->setName($form->get('Name')->getData());
                $school->setCellPhone1($form->get('CellPhone1')->getData());
                $school->setCellPhone2($form->get('CellPhone2')->getData());
                $school->setCity($form->get('City')->getData());
                $school->setEmail($form->get('Email')->getData());
                $school->setIDInitials($form->get('IDInitials')->getData());
                $school->setLogoURL($form->get('LogoURL')->getData());
                $school->setNoOfLevels($form->get('NoOfLevels')->getData());
                $school->setNoOfStreamsPerLevel($form->get('NoOfStreamsPerLevel')->getData());
                $school->setState($form->get('State')->getData());
                $school->setZip($form->get("Zip")->getData());
                $school->setWebsiteURl($form->get('WebsiteURl')->getData());

                $entityManager->persist($school);
                $entityManager->flush();

                $feedback = match ($action) {
                    'add' => 'School Added successfully',
                    'edit' => 'School info updated'
                };
                $this->addFlash('success', $feedback);
            } catch (\Exception $exception) {
                $this->addFlash('fail', $exception->getMessage());
            }

        }

        return $this->render('institution_setup/setupSchool.html.twig',
            [
                'Schoolform' => $form->createView(),
                'title' => 'Institution Setup'
            ]);
    }

    #[Route('/school-setup/{action}/{id}', name: 'app_add_class')]
    public function createSchoolClass(
        Request                     $request,
        EntityManagerInterface      $entityManager,
        SchoolClassHeaderRepository $classHeaderRepository,
        string                      $action = 'add_class',
        string                      $id = null

    ): Response
    {
        $classModel = match ($action) {
            'add_class' => new SchoolClassHeader(),
            'edit' => $classHeaderRepository->find($id)
        };
        $form = $this->createForm(SchoolHeaderFormType::class, $classModel);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $classModel->setClassName($form->get('ClassName')->getData());
            $classModel->setClassColorID($form->get('ClassColorID')->getData());
            $classModel->setCreatedBy($this->getUser()->getUserIdentifier());
            $classModel->setLevelID($form->get('LevelID')->getData());
            $classModel->setRemarks($form->get('Remarks')->getData());
            $classModel->setStatus($form->get('Status')->getData());

            try {

                $entityManager->persist($classModel);
                $entityManager->flush();
            } catch (\Exception $e) {
                $this->addFlash("fail", $e->getMessage());
            }

            $feedback = match ($action) {
                'add_class' => 'Class created',
                'edit' => 'Class updated'
            };
            $this->addFlash('success', $feedback);
        }
        return $this->render('institution_setup/add_class_information.html.twig', [
            'classForm' => $form->createView()
        ]);
    }

    #[Route('/institution-setup/class-header', name: 'app_class_header')]
    public function classHeader(ClassHeaderRepository $repository): Response
    {
        return $this->render('institution_setup/class_header.html.twig', [
            'classHeader' => $repository->findAll()
        ]);
    }

    #[Route('/class-header-details/{mode}/{id}', name: 'app_class_header_details')]
    public function classHeaderDetails(ClassHeaderRepository $repository, $mode = 'detail', $id = null): Response
    {
        return $this->render('institution_setup/class_header_details.html.twig', [
            'classHeader' => $repository->find($id)
        ]);
    }
}
