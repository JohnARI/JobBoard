<?php

namespace App\Form;

use App\Entity\JobApplication;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class JobApplyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('resume', FileType::class, [
                'mapped' => false,
                'required' => false,
            ])
            ->add('motivation', FileType::class, [
                'mapped' => false,
                'required'  => false,
            ])
            ->add('firstname', TextType::class, [
                'required' => false,

            ])
            ->add('lastname', TextType::class)
            ->add('phone', TelType::class)
            ->add('experiences', TextType::class, [
                'required' => false,
            ])

            ->add('submit', SubmitType::class, [
                'label' => 'Postuler',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => JobApplication::class,
        ]);
    }
}
