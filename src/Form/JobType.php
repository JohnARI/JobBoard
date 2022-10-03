<?php

namespace App\Form;

use App\Entity\Job;
use App\Entity\Sector;
use App\Entity\JobTypes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class JobType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => [
                    'class' => 'mt-6 w-full border-b-2 border-violet-600 outline-0 h-10',
                    'placeholder' => 'Title'
                ]
            ])
            ->add('description', TextType::class, [
                'attr' => [
                    'class' => 'mt-6 w-full border-b-2 border-violet-600 outline-0 h-10',
                    'placeholder' => 'Description'
                ]
            ])
            ->add('link', TextType::class, [
                'attr' => [
                    'class' => 'mt-6 w-full border-b-2 border-violet-600 outline-0 h-10',
                    'placeholder' => 'Website link'
                ]
            ])
            ->add('sector', EntityType::class, [
                'class' => Sector::class,
                'attr' => [
                    'class' => 'mt-6 w-full border-b-2 border-violet-600 hover:cursor-pointer hover:bg-violet-100 outline-0 h-10'
                ],
                'placeholder' => 'Choose a sector',
                'choice_label' => 'name',
            ])
            ->add('salary', NumberType::class, [
                'attr' => [
                    'class' => 'mt-6 w-full border-b-2 border-violet-600 outline-0 h-10',
                    'placeholder' => 'Salary'
                ]
            ])
            ->add('contract_type', ChoiceType::class, [
                'attr' => [
                    'class' => 'mt-6 w-full border-b-2 border-violet-600 outline-0 hover:cursor-pointer hover:bg-violet-100 h-10',
                ],
                'choices' => [
                    'CDI' => 'CDI',
                    'CDD' => 'CDD',
                    'Stage' => 'Stage',
                    'Alternance' => 'Alternance',
                    'Freelance' => 'Freelance',
                    'Intérim' => 'Intérim',
                    'Apprentissage' => 'Apprentissage',
                ],
            ])
            ->add('start', DateType::class, [
                'attr' => [
                    'class' => 'mt-6 w-full border-b-2 border-violet-600 hover:cursor-pointer hover:bg-violet-100 outline-0 h-10'
                ],
                'format' => 'd-M-y',
                'placeholder' => [
                    'day' => 'Day', 'month' => 'Month', 'year' => 'Year',
                ],
            ])
            ->add('end', DateType::class, [
                'attr' => [
                    'class' => 'mt-6 w-full border-b-2 border-violet-600 hover:cursor-pointer hover:bg-violet-100 outline-0 h-10'
                ],
                'format' => 'd-M-y',
            ])
            ->add('jobType', EntityType::class, [
                'class' => JobTypes::class,
                'attr' => [
                    'class' => 'mt-6 w-full border-b-2 border-violet-600 hover:cursor-pointer hover:bg-violet-100 outline-0 h-10'
                ],
                'placeholder' => 'Choose a job type',
                'choice_label' => 'title',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Job::class,
        ]);
    }
}
