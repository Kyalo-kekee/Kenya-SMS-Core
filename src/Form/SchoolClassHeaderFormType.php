<?php

namespace App\Form;

use App\Entity\SchoolClassHeader;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SchoolClassHeaderFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ClassName',null,[
                'label' => false,
                'attr'=>['class'=>'form-control form-control-sm']
            ])
            ->add('LevelID',null,[
                'label' => false,
                'attr'=>['class'=>'form-control form-control-sm']
            ])
            ->add('NumberOfClassRooms',null,[
                'label' => false,
                'attr'=>['class'=>'form-control form-control-sm']
            ])
            ->add('ClassColorID',ColorType::class,[
                'label' => false,
                'attr'=>['class'=>'form-control form-control-sm']
            ])
            ->add('Remarks',TextareaType::class,[
                'label' => false,
                'attr'=>['class'=>'form-control form-control-sm']
            ])

            ->add('Status',CheckboxType::class,[
                'label' => false,
                'attr'=>['class'=>'new-control-input']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SchoolClassHeader::class,
        ]);
    }
}
