<?php

namespace App\Controller;

use App\Entity\MshuleUser;
use App\Form\RegistrationFormType;
use App\Repository\MshuleUserRepository;
use App\Security\EmailVerifier;
use App\Security\UserServerAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;

class RegistrationController extends AbstractController
{
    private EmailVerifier $emailVerifier;

    public function __construct(EmailVerifier $emailVerifier)
    {
        $this->emailVerifier = $emailVerifier;
    }

    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, UserServerAuthenticator $authenticator, EntityManagerInterface $entityManager): Response
    {
        $user = new MshuleUser();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user ->setCompanyID($request->getSession()->get('CompanyID'));
            $user->setBranchID($request->getSession()->get('BranchID'));
            $user->setDesignation($form->get('Designation')->getData());
            $user->setSalutation($form->get('Salutation')->getData());
            $user->setFirstName($form->get('FirstName')->getData());
            $user->setEmail($form->get('Email')->getData());
            $user->setEmployeeNumber($form->get('EmployeeNumber')->getData());
            $user->setIsVerified($form->get('IsVerified')->getData());
            $user->setIsEmployee($form->get('IsEmployee')->getData());
            $user->setPassword(
            $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();

            // generate a signed url and email it to the user
            $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
                (new TemplatedEmail())
                    ->from(new Address('accounts@ubuscetch.com', 'MshuleAccount'))
                    ->to($user->getEmail())
                    ->subject('Please Confirm your Email')
                    ->htmlTemplate('registration/confirmation_email.html.twig')
            );
            // do anything else you need here, like send an email

            /*return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );*/
            $this ->addFlash('success',"Registration Success, This user can now access parts of the system");
        }

        return $this->render('registration/user_registration.html.twig', [
            'registrationForm' => $form->createView(),
            'title' => 'Register User'
        ]);
    }

    #[Route('/verify/email', name: 'app_verify_email')]
    public function verifyUserEmail(Request $request, MshuleUserRepository $mshuleUserRepository): Response
    {
        $id = $request->get('id');

        if (null === $id) {
            return $this->redirectToRoute('app_register');
        }

        $user = $mshuleUserRepository->find($id);

        if (null === $user) {
            return $this->redirectToRoute('app_register');
        }

        // validate email confirmation link, sets User::isVerified=true and persists
        try {
            $this->emailVerifier->handleEmailConfirmation($request, $user);
        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('verify_email_error', $exception->getReason());

            return $this->redirectToRoute('app_register');
        }

        // @TODO Change the redirect on success and handle or remove the flash message in your templates
        $this->addFlash('success', 'Your email address has been verified.');

        return $this->redirectToRoute('app_register');
    }
}
