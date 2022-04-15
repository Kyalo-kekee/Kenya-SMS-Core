<?php

namespace App\Form;

use App\Entity\MshuleUser;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username',null,[
                'attr' =>[ 'class' => 'form-control'],
                'label' =>false
            ])
            ->add('Email',null,[
                'attr' =>[ 'class' => 'form-control'],
                'label' =>false
            ])
            ->add('FirstName',null,[
                'attr' =>[ 'class' => 'form-control'],
                'label' =>false
            ])
            ->add('LastName',null,[
                'attr' =>[ 'class' => 'form-control'],
                'label' =>false
            ])
            ->add('Salutation',null,[
                'attr' =>[ 'class' => 'form-control-sm'],
                'label' =>false
            ])
            ->add('Designation',null,[
                'attr' =>[ 'class' => 'form-control-sm'],
                'label' =>false
            ])
            ->add('EmployeeNumber',null,[
                'attr' =>[ 'class' => 'form-control-sm'],
                'label' =>false
            ])
            ->add('IsVerified',CheckboxType::class,[
                'attr' =>[ 'class' => '']
            ])
            ->add('IsEmployee',CheckboxType::class,[
                'attr' =>[ 'class' => '']
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'label'=>false,
                'attr' => ['autocomplete' => 'new-password',
                    'class' => 'form-control'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MshuleUser::class,
        ]);
    }
}
