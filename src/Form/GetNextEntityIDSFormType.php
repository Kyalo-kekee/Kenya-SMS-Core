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
            ->add('ObjectSignatureNamespace',null,['label'=>false])
            ->add('PrefixID',null,['label'=>false])
            ->add('NextValueSlot',null,['label'=>false])
            ->add('ToForceRandomIdGeneration',null,['label'=>false])
            ->add('UpdatedAt',null,['label'=>false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => GetNextNumberIDS::class,
        ]);
    }
}
