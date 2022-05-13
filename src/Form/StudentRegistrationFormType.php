<?php

namespace App\Form;

use App\Entity\StudentInformation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudentRegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('FirstName')
            ->add('MiddleName')
            ->add('LastName')
            ->add('EnrollDate')
            ->add('GuardianName')
            ->add('GuardianPhoneNumber1')
            ->add('GuardianPhoneNumber2')
            ->add('GuardianEmail')
            ->add('ImageUrl')
            ->add('ImageSize')
            ->add('CertificateAttachment1')
            ->add('CertificateAttachment2')
            ->add('EntryMarks')
            ->add('EntryGrade')
            ->add('DOB')
            ->add('SchoolID')
            ->add('ClassRoomID')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => StudentInformation::class,
        ]);
    }
}
