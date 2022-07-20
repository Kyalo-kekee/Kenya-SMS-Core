<?php

namespace App\Controller;

use App\Entity\GetNextNumberIDS;
use App\Form\GetNextEntityIDSFormType;
use App\Repository\GetNextNumberIDSRepository;
use App\Service\PopulatePageData;
use Bridge\Src\Helpers\MenuInfo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class DeveloperOptionsController extends AbstractController
{
    #[Route('/developer/options', name: 'app_developer_options')]
    public function index(): Response
    {
        return $this->render('developer_options/index.html.twig', [
            'controller_name' => 'DeveloperOptionsController',
        ]);
    }

    #[Route('developer/identifier-generator/{action}/{id}', name: 'app_id_generator')]
    public function nextEntityNumber(
        Request                    $request,
        GetNextNumberIDSRepository $getNextNumberIDSRepository,
        Session                    $session,
        string                     $action = 'add',
        string                     $id = null
    ): Response
    {
        $nextEntity = match ($action) {
            'add' => new GetNextNumberIDS(),
            'edit' => $getNextNumberIDSRepository->find($id)
        };
        $form = $this->createForm(GetNextEntityIDSFormType::class, $nextEntity);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $nextEntity->setCompanyID($session->get('CompanyID'));
            $nextEntity->setBranchID($session->get('BranchID'));
            $nextEntity->setObjectSignatureNamespace($form->get('ObjectSignatureNamespace')->getData());
            $nextEntity->setPrefixID($form->get('PrefixID')->getData());
            $nextEntity->setStartValue($form->get('StartValue')->getData());


            $nextEntity->setToForceRandomIdGeneration($form->get('ToForceRandomIdGeneration')->getData());

            try {
                $getNextNumberIDSRepository->add($nextEntity);
            } catch (\Exception $e) {
                $this->addFlash('fail', $e->getMessage());
            }
        }
        return $this->render('developer_options/next_number_ids.html.twig',
            (new PopulatePageData(
                DeveloperOptionsController::class,
                MenuInfo::MENU_SCHOOL_SETUP,
                true,
                [
                    'nextObjectForm' => $form->createView(),
                    'NextObject' => $getNextNumberIDSRepository->findAll()
                ]
            ))->get()
        );

    }
}
