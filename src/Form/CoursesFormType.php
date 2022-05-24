<?php

namespace App\Form;

use App\Entity\CourseHeader;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CoursesFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('CourseID')
            ->add('CourseName')
            ->add('CourseDuration')
            ->add('CreatedAt')
            ->add('UpdatedAt')
            ->add('HasModules')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CourseHeader::class,
        ]);
    }
}
