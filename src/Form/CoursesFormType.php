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
            ->add('CourseID',null,[
                'label'=>false
            ])
            ->add('CourseName',null,[
                'label'=>false
            ])
            ->add('CourseDuration',null,[
                'label'=>false
            ])
            ->add('CreatedAt',null,[
                'label'=>false
            ])
            ->add('UpdatedAt',null,[
                'label'=>false
            ])
            ->add('HasModules',null,[
                'label'=>false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CourseHeader::class,
        ]);
    }
}
