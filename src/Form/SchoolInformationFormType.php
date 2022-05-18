<?php

namespace App\Form;

use App\Entity\InstitutionSetup;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SchoolInformationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('IDInitials',null,[
                'label' =>false,
                'attr'=>['class'=>'form-control form-control-sm']
            ])
            ->add('Name',null,[
                'label' => false,
                'attr'=>['class'=>'form-control form-control-sm']
            ])
            ->add('CellPhone1',null,[
                'label' => false,
                'attr'=>['class'=>'form-control  form-control-sm']
            ])
            ->add('CellPhone2',null,[
                'label' => false,
                'attr'=>['class'=>'form-control  form-control-sm']
            ])
            ->add('Email',null,[
                'label' => false,
                'attr'=>['class'=>'form-control form-control-sm']
            ])
            ->add('WebsiteURl',null,[
                'label' => false,
                'attr'=>['class'=>'form-control form-control-sm']
            ])
            ->add('LogoURL',null,[
                'label' => false,
                'attr'=>['class'=>'form-control form-control-sm']
            ])
            ->add('NoOfLevels',null,[
                'label' => false,
                'attr'=>['class'=>'form-control form-control-sm']
            ])
            ->add('NoOfStreamsPerLevel',null,[
                'label' => false,
                'attr'=>['class'=>'form-control form-control-sm']
            ])
            ->add('Zip',null,[
                'label' => false,
                'attr'=>['class'=>'form-control form-control-sm']
            ])
            ->add('City',null,[
                'label' => false,
                'attr'=>['class'=>'form-control form-control-sm']
            ])
            ->add('State',null,[
                'label' => false,
                'attr'=>['class'=>'form-control form-control-sm']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => InstitutionSetup::class,
            'label'=> false
        ]);
    }
}
