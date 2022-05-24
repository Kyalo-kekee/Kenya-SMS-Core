<?php

namespace App\Form;

use App\Entity\StudentInformation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class StudentInformationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('FirstName',null,['label'=>false])
            ->add('MiddleName',null,['label'=>false])
            ->add('LastName',null,['label'=>false])
            ->add('EnrollDate',null,['label'=>false])
            ->add('GuardianName',null,['label'=>false])
            ->add('GuardianPhoneNumber1',null,['label'=>false])
            ->add('GuardianPhoneNumber2',null,['label'=>false])
            ->add('GuardianEmail',null,['label'=>false])
            ->add('EntryMarks',null,['label'=>false])
            ->add('EntryGrade',null,['label'=>false])
            ->add('DOB',null,['label'=>false])
            ->add('EntrySubjects')
            /*attachments*/
            ->add(

                'PhotoFile',
                VichFileType::class,
                [
                    'label' => 'Student Image',
                    'required' => false,
                    'allow_delete' => true,
                    'delete_label' => 'delete picture',
                    'download_uri' => '...',
                    'download_label' => 'download file',
                    'asset_helper' => true,
                ]
            )
            ->add(

                'CertificateFile1',
                VichFileType::class,
                [
                    'label' => 'Student Image',
                    'required' => false,
                    'allow_delete' => true,
                    'delete_label' => 'delete picture',
                    'download_uri' => '...',
                    'download_label' => 'download file',
                    'asset_helper' => true,
                ]
            )
            ->add(

                'CertificateFile2',
                VichFileType::class,
                [
                    'label' => 'Student Image',
                    'required' => false,
                    'allow_delete' => true,
                    'delete_label' => 'delete picture',
                    'download_uri' => '...',
                    'download_label' => 'download file',
                    'asset_helper' => true,
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => StudentInformation::class,
        ]);
    }
}
