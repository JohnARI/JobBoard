<?php

namespace App\Form;

use App\Entity\JobApplication;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class JobApplicationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('resume', FileType::class, [
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'class' => 'mt-6 w-full border-b-2 border-violet-600 outline-0 h-10',
                    'placeholder' => 'Resume'
                ]
    ])
            ->add('motivation', FileType::class, [
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'class' => 'mt-6 w-full border-b-2 border-violet-600 outline-0 h-10',
                    'placeholder' => 'Resume'
                ]
            ])
            ->add('firstname', TextType::class, [
                'attr' => [
                    'class' => 'mt-6 w-full border-b-2 border-violet-600 outline-0 h-10',
                    'placeholder' => 'Firstname'
                ]
            ])
            ->add('lastname', TextType::class, [
                'attr' => [
                    'class' => 'mt-6 w-full border-b-2 border-violet-600 outline-0 h-10',
                    'placeholder' => 'Lastname'
                ]
            ])
            ->add('phone', TelType::class, [
                'attr' => [
                    'minlength' => 10,
                    'maxlength' => 10,
                    'minlengthMessage' => 'Number must contain 10 digits',
                    'class' => 'mt-6 w-full border-b-2 border-violet-600 outline-0 h-10',
                    'placeholder' => 'Phone'
                ]
            ])
            ->add('experiences', TextType::class, [
                'required' => false,
                'attr' => [
                    'class' => 'mt-6 w-full border-b-2 border-violet-600 outline-0 h-10',
                    'placeholder' => 'Experiences'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => JobApplication::class,
        ]);
    }
}
