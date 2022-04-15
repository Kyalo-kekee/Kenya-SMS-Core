<?php

namespace App\Form;

use App\Entity\ClassHeaderDetails;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClassHeaderDetailsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ClassID')
            ->add('SectionID')
            ->add('MaxStudents')
            ->add('MinStudents')
            ->add('ClassPrefect')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ClassHeaderDetails::class,
        ]);
    }
}
