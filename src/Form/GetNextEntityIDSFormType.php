<?php

namespace App\Form;

use App\Entity\GetNextNumberIDS;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GetNextEntityIDSFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ObjectSignatureNamespace',null,[
                'label' => false,
                'attr'=>['class'=>'form-control form-control-sm']
            ])
            ->add('PrefixID',null,[
                'label' => false,
                'attr'=>['class'=>'form-control form-control-sm']
            ])
            ->add('NextValueSlot',null,[
                'label' => false,
                'attr'=>['class'=>'form-control form-control-sm']
            ])
            ->add('UpdatedAt',null,[
                'label' => false,
                'attr'=>['class'=>'form-control form-control-sm']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => GetNextNumberIDS::class,
        ]);
    }
}
