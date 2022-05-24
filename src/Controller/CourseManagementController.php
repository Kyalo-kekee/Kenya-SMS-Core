<?php

namespace App\Controller;

use App\Entity\CourseHeader;
use App\Form\CoursesFormType;
use App\Repository\CourseHeaderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CourseManagementController extends AbstractController
{
    #[Route('/course/management', name: 'app_course_management')]
    public function index(): Response
    {
        return $this->render('course_management/index.html.twig', [
            'controller_name' => 'CourseManagementController',
        ]);
    }

    #[Route('course-subject-management/{action}/{id}', name: 'app_create_course')]
    public function createCourse(
        Request                $request,
        CourseHeaderRepository $courseHeaderRepository,
        string                 $action = 'add',
        string                 $id = null): Response
    {
        $course = match ($action) {
            'add' => new CourseHeader(),
            'edit' => $courseHeaderRepository->find($id)
        };
        $form = $this->createForm(CoursesFormType::class, $course);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $course->setCourseDuration($form->get('CourseDuration')->getData());
            $course->setCourseID($form->get('CourseID')->getData());
            $course->setCourseName($form->get('CourseName')->getData());
            $course->setCreatedAt(new \DateTimeImmutable());
            $course->setUpdatedAt(new \DateTimeImmutable());
            $course->setHasModules($form->get('HasModules')->getData());

            try {
                $courseHeaderRepository->add($course);
            } catch (\Exception $e) {
                $this->addFlash('fail', $e->getMessage());
            }
        }

        return $this->render('course_management/course_header_form.html.twig', [
            'controller_name' => 'CourseManagementController',
            'courseForm' => $form->createView()
        ]);
    }
}
