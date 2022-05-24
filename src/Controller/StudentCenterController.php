<?php

namespace App\Controller;

use App\Entity\StudentInformation;
use App\Form\StudentInformationFormType;
use App\Repository\ClassHeaderRepository;
use App\Repository\CourseHeaderRepository;
use App\Repository\SchoolClassHeaderRepository;
use App\Repository\StudentInformationRepository;
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

    #[Route('student-center/select-class/{class_room_id}/', name: 'app_student_information_form')]
    public function enrollNewStudentClassHeader(
        StudentInformationRepository $studentInformationRepository,
        CourseHeaderRepository       $courseHeaderRepository,
        Request                      $request,
        string                       $class_room_id,
    ): Response
    {
        $student = new StudentInformation();
        $form = $this->createForm(StudentInformationFormType::class, $student);
        $form->handleRequest($request);

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
            $student->setCertificateAttachment1($form->get('CertificateAttachment1')->getData());
            $student->setCertificateAttachment2($form->get('CertificateAttachment2')->getData());

            try {
                $studentInformationRepository->add($student);
                $this->addFlash('success','student records updated');
            } catch (\Exception $e) {
                $this->addFlash('fail', $e->getMessage());
            }


        }

        return $this->render('student_center/enroll_class_header.html.twig', [
            'classHeader' => null
        ]);
    }

    #[Route('student-center/select-class/enroll', name: 'app_enroll_class_header')]
    public  function enrollSelectClass(ClassHeaderRepository $classHeaderRepository): Response
    {
        return $this->render('student_center/enroll_class_header.html.twig', [
            'classHeader' => $classHeaderRepository->findAll()
        ]);
    }
}
