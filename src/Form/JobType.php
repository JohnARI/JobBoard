<?php

namespace App\Form;

use App\Entity\Job;
use App\Entity\Sector;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class JobType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('link')
            ->add('sector', EntityType::class, [
                'class' => Sector::class,
                'choice_label' => 'name',
            ])
            ->add('salary')
            ->add('contract_type', ChoiceType::class, [
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
            ->add('start')
            ->add('end')
            ->add('jobType');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Job::class,
        ]);
    }
}
