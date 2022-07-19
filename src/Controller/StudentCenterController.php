<?php

namespace App\Controller;

use App\Entity\SchoolClassRoomsHeader;
use App\Entity\StudentInformation;
use App\Form\StudentInformationFormType;
use App\Repository\ClassHeaderRepository;
use App\Repository\CourseHeaderRepository;
use App\Repository\SchoolClassHeaderRepository;
use App\Repository\SchoolClassRoomsHeaderRepository;
use App\Repository\StudentInformationRepository;
use App\Service\PopulatePageData;
use Bridge\Src\Helpers\MenuInfo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/student-center/student-header/', name: 'app_student_header')]
    public function studentHeader(StudentInformationRepository $studentInformationRepository)
    {
        return $this->render('student_center/student_header.twig',
            (new PopulatePageData(
                StudentCenterController::class,
                MenuInfo::MENU_STUDENT_CENTER,
                true,
                [
                    'students' => $studentInformationRepository->findAll(),
                ]
            ))->get()
        );
    }

    #[Route('student-center/select-class/{class_room_id}/{student_id}', name: 'app_student_information_form')]
    public function enrollNewStudentClassHeader(
        StudentInformationRepository     $studentInformationRepository,
        SchoolClassRoomsHeaderRepository $classRoomsHeaderRepository,
        CourseHeaderRepository           $courseHeaderRepository,
        Request                          $request,
        string                           $class_room_id,
        string                           $student_id = null,
    ): Response
    {
        $student = is_null($student_id) ? new StudentInformation() : $studentInformationRepository ->find($student_id);
        $form = $this->createForm(StudentInformationFormType::class, $student);
        $form->handleRequest($request);
        //map student to classroom
        $student->setClassRoomID($classRoomsHeaderRepository->find($class_room_id));

        if ($form->isSubmitted() && $form->isValid()) {

            $student->setFirstName($form->get('FirstName')->getData());
            $student->setMiddleName($form->get('MiddleName')->getData());
            $student->setLastName($form->get('LastName')->getData());
            $student->setEnrollDate($form->get('EnrollDate')->getData());
            $student->setEntryGrade($form->get('EntryGrade')->getData());
            $student->setEntryMarks($form->get('EntryMarks')->getData());
            $student->setGuardianName($form->get('GuardianName')->getData());
            $student->setGuardianPhoneNumber1($form->get('GuardianPhoneNumber1')->getData());
            $student->setGuardianPhoneNumber2($form->get('GuardianPhoneNumber2')->getData());
            $student->setGuardianEmail($form->get('GuardianPhoneNumber2')->getData());
            $student->setDOB($form->get('GuardianPhoneNumber2')->getData());

            /*file uploading*/
            $student->setPhotoFile($form->get('PhotoFile')->getData(''));
            $student->setCertificateAttachment1($form->get('CertificateFile1')->getData());
            $student->setCertificateAttachment2($form->get('CertificateFile1')->getData());

            try {
                $studentInformationRepository->add($student);
                $this->addFlash('success', 'student records updated');
            } catch (\Exception $e) {
                $this->addFlash('fail', $e->getMessage());
            }
        }

        return $this->render('student_center/student_informtion_form.html.twig',
            (new PopulatePageData(
                StudentCenterController::class,
                MenuInfo::MENU_STUDENT_CENTER,
                true,
                [
                    'studentForm' => $form->createView()
                ]
            ))->get()
        );
    }

    #[Route('student-center/classroom/enroll', name: 'app_enroll_class_header')]
    public function enrollSelectClass(SchoolClassHeaderRepository $schoolClassHeaderRepository): Response
    {
        return $this->render('student_center/enroll_class_header.html.twig',
            (new PopulatePageData(
                StudentCenterController::class,
                MenuInfo::MENU_STUDENT_CENTER,
                true,
                [
                    'classHeader' => $schoolClassHeaderRepository->findAll()
                ]
            ))->get()
        );
    }

    #[Route('/student-center/student-information-view/{class_room_id}/{student_id}', name: 'app_student_information_view')]
    public function studentInformationView(
        StudentInformationRepository $studentInformationRepository,
        string                       $class_room_id,
        string                       $student_id
    )
    {
        return $this->render('student_center/student_details.twig',
            (new PopulatePageData(
                StudentCenterController::class,
                MenuInfo::MENU_STUDENT_CENTER,
                true,
                [
                    'student' => $studentInformationRepository->find($student_id)
                ]
            ))->get()
        );
    }

    #[Route('/student-center/classroom-view/', name: 'app_class_room_view')]
    public function classRoomsView(SchoolClassHeaderRepository $schoolClassHeaderRepository)
    {
        return $this->render('student_center/classroom_view.twig',
            (new PopulatePageData(
                StudentCenterController::class,
                MenuInfo::MENU_STUDENT_CENTER,
                true,
                [
                    'classHeader' => $schoolClassHeaderRepository->findAll()
                ]
            ))->get()
        );
    }

    #[Route('/student-center/classroom-students-view/{room_id}', name: 'app_classroom_students')]
    public function classRoomStudentsView(
        SchoolClassRoomsHeaderRepository $schoolClassRoomsHeaderRepository,
        string                           $room_id,
    )
    {
        return $this->render('student_center/classroom_student.twig',
            (new PopulatePageData(
                StudentCenterController::class,
                MenuInfo::MENU_STUDENT_CENTER,
                true,
                [
                    'classroom' => $schoolClassRoomsHeaderRepository->find($room_id),
                ]
            ))->get()
        );
    }
}
