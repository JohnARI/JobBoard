<?php

namespace App\Form;

use App\Entity\JobTypes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class JobTypesType extends AbstractType
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

            ->add('picture', FileType::class, [
                'required' => false,
                'data_class' => null,
                'constraints' => [
                    new Image([
                        'mimeTypes' => ['image/jpeg', 'image/png', 'image/webp', 'image/jpg'],
                        'mimeTypesMessage' => 'Les types de fichiers autorisés sont : .jpeg / .png / .webp / .jpg',
                        'maxSize' => '2024k',
                        'maxSizeMessage' => 'La taille maximale autorisée est de 2Mo',
                    ])
                ]

            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => JobTypes::class,
        ]);
    }
}
