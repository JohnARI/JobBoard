<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('jobType', TextType::class, [
                'required' => false,
                'attr' => [
                    'placeholder' => 'Select a job type',
                    'class' => 'rounded px-2 outline-0 border border-gray-600 w-64 h-10',
                    'name' => 'jobtype',
                    'list' => 'jobtype',
                ],
            ])

            ->add('submit', SubmitType::class, [
                'label' => 'Search',
                'attr' => [
                    'class' => 'ml-auto bg-violet-600 h-10 rounded text-white font-semibold w-32 transition hover:bg-white border-2 hover:text-violet-600 hover:border-violet-600'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
