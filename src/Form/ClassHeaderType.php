<?php

namespace App\Form;

use App\Entity\ClassHeader;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClassHeaderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ClassName',null,[
                'label'=>false,
                'attr'=>['class'=>'form-control']
            ])
            ->add('MaximumStudentCapacity',null,[
                'label'=>false,
                'attr'=>['class'=>'form-control']
            ])
            ->add('MinimumStudentCapacity',null,[
                'label'=>false,
                'attr'=>['class'=>'form-control']
            ])
            ->add('HasStreams',CheckboxType::class,[

                'attr'=>['class'=>'pl-2']
            ])
            ->add('ClassTeacher',null,[
                'label'=>false,
                'attr'=>['class'=>'form-control']
            ])
            ->add('SectionID', null,[
                'mapped' =>false,
                'label'=>false,
                'attr'=>['class'=>'form-control']
            ])
            ->add('MaxStudents', null,[
                'mapped' =>false,
                'label'=>false,
                'attr'=>['class'=>'form-control']
            ])
            ->add('MinStudents', null,[
                'mapped' =>false,
                'label'=>false,
                'attr'=>['class'=>'form-control']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ClassHeader::class,
        ]);
    }
}
