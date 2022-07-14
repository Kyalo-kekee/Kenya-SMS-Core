<?php

namespace App\Controller;

use App\Entity\InstitutionSetup;
use App\Entity\SchoolClassHeader;
use App\Entity\SchoolClassRoomsHeader;
use App\Form\SchoolClassHeaderFormType;
use App\Form\SchoolClassRoomsFormType;
use App\Form\SchoolInformationFormType;
use App\Repository\InstitutionSetupRepository;
use App\Repository\SchoolClassHeaderRepository;
use App\Repository\SchoolClassRoomsHeaderRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Bridge\Src\Helpers\MenuInfo;

class InstitutionSetupController extends AbstractController
{
    public string $menu_item = MenuInfo::MENU_SCHOOL_SETUP;

    #[Route('school-setup',name: 'school_setup_home')]
    public  function  home()
    {
        return $this->render('masterpages/blank.twig', [
            'global_menu'=> false,
            'menu' => $this->menu_item
        ]);
    }

    #[Route('/school-setup/school-information', name: 'app_school_information')]
    public function institutionInformation(InstitutionSetupRepository $repository): Response
    {
        return $this->render('institution_setup/school_information.html.twig', [
            'schools' => $repository->findAll(),
            'global_menu' => false,
            'menu'=> MenuInfo::MENU_SCHOOL_SETUP,
        ]);
    }

    #[Route('/school-setup/class-header/{action}/{id}', name: 'app_classrooms_add')]
    public function addClassRooms(
        ManagerRegistry             $registry,
        SchoolClassHeaderRepository $schoolClassHeaderRepository,
        Request                     $request,
        string                      $action = 'add',
        string                      $id = null
    ): Response
    {
        $classRoom = new SchoolClassRoomsHeader();

        /*for relation*/
        $classParent = $schoolClassHeaderRepository->find($id);

        $form = $this->createForm(SchoolClassRoomsFormType::class, $classRoom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $classRoom->setClassID($classParent);
            $classRoom->setMaxCapacity($form->get('MaxCapacity')->getData());
            $classRoom->setSectionName($form->get('SectionName')->getData());
            $classRoom->setHasBothGenders($form->get('HasBothGenders')->getData());


            try {
                $entityManager = $registry->getManager();
                $entityManager->persist($classRoom);
                $entityManager->flush();

                $this->addFlash('success', 'A new Class Room added to: ' . $classParent->getClassName());

            } catch (\Exception $exception) {
                $this->addFlash('fail', $exception->getMessage());
            }
        }
        return $this->render('institution_setup/add_class_rooms.html.twig', [

            'classRoomForm' => $form->createView(),
            'classModel' => $classParent,
            'global_menu'=> false,
            'menu' => MenuInfo::MENU_SCHOOL_SETUP
        ]);


    }

    #[Route('/school-setup/school/{action}/{id}', name: 'app_school_edit_school_information')]
    public function addSchoolInformation(
        Request                    $request,
        InstitutionSetupRepository $institutionSetupRepository,
        EntityManagerInterface     $entityManager,
        string                     $action = 'add',
        string                     $id = null
    ): Response
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
                'title' => 'Institution Setup',
                'global_menu' => false,
                'menu' => MenuInfo::MENU_SCHOOL_SETUP

            ]);
    }

    #[Route('/school-setup/class/{action}/{id}', name: 'app_add_class')]
    public function createSchoolClass(
        Request                     $request,
        SchoolClassHeaderRepository $schoolClassHeaderRepository,
        string                      $action,
        string                      $id = null

    ): Response
    {
        $classModel = match ($action) {
            'add_class' => new SchoolClassHeader(),
            'edit' => $schoolClassHeaderRepository->find($id)
        };
        $form = $this->createForm(SchoolClassHeaderFormType::class, $classModel);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $classModel->setClassName($form->get('ClassName')->getData());
            $classModel->setClassColorID($form->get('ClassColorID')->getData());
            $classModel->setCreatedBy('dev');
            $classModel->setLevelID($form->get('LevelID')->getData());
            $classModel->setRemarks($form->get('Remarks')->getData());
            $classModel->setStatus($form->get('Status')->getData());

            try {

               $schoolClassHeaderRepository ->add($classModel);
                $feedback = match ($action) {
                    'add_class' => 'Class created',
                    'edit' => 'Class updated'
                };
                $this->addFlash('success', $feedback);
            } catch (\Exception $e) {
                $this->addFlash("fail", $e->getMessage());
            }


        }
        return $this->render('institution_setup/add_class_information.html.twig', [
            'classForm' => $form->createView(),
            'global_menu'=>false,
            'menu' => MenuInfo::MENU_SCHOOL_SETUP
        ]);
    }

    #[Route('/institution-setup/class-header', name: 'app_class_header')]
    public function classHeader(SchoolClassHeaderRepository $classHeaderRepository): Response
    {
        return $this->render('institution_setup/class_header.html.twig', [
            'classHeader' => $classHeaderRepository->findAll(),
            'global_menu'=>false,
            'menu'=>MenuInfo::MENU_SCHOOL_SETUP,
            'app_class_header' =>'active'
        ]);
    }

    #[Route('/class-header-details/{id}', name: 'app_class_header_details')]
    public function classHeaderDetails(
        SchoolClassHeaderRepository $classHeaderRepository,
        SchoolClassRoomsHeaderRepository $classRoomsHeaderRepository,
                                    $id = null
    ): Response
    {
        $classParent = $classHeaderRepository->find($id);
        //$classRooms = $classHeaderRepository ->getClassRooms($classParent, $classRoomsHeaderRepository);
       // dd($classRooms);

        return $this->render('institution_setup/class_header_details.html.twig', [
            'classHeader' => $classParent,
            'global_menu' => false,
            'menu' =>MenuInfo::MENU_SCHOOL_SETUP

        ]);
    }
}
