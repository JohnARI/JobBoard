<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Sector;
use App\Entity\Company;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'mt-6 w-full flex border-b-2 border-violet-600 outline-0 h-10',
                    'placeholder' => 'Email'
                ]
            ])
            ->add('roles', ChoiceType::class, [
                'attr' => [
                    'class' => 'mt-6 w-full border-b-2 border-violet-600 outline-0 hover:cursor-pointer hover:bg-violet-100 h-10',
                ],
                'multiple' => false,
                'expanded' => false,
                'choices' => [
                    'Administrateur' => 'ROLE_ADMIN',
                    'Recruteur' => 'ROLE_RECRUITER',
                    'Utilisateur' => 'ROLE_USER',
                ],

            ])
            ->add('password', PasswordType::class, [
                'attr' => [
                    'class' => 'mt-6 w-full border-b-2 border-violet-600 outline-0 h-10',
                    'placeholder' => 'Password'
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
                    'class' => 'mt-6 w-full border-b-2 border-violet-600 outline-0 h-10',
                    'placeholder' => 'Phone'
                ]
            ])
            ->add('resume', FileType::class, [
                'attr' => [
                    'class' => 'hidden'
                ],
                'label' => 'Resume',
                'label_attr' => [
                    'class' => 'mt-6 flex w-full py-2 indent-1 hover:cursor-pointer hover:bg-violet-100 border-b-2 border-violet-600 outline-0 h-10'
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
            ->add('company', EntityType::class, [
                'class' => Company::class,
                'attr' => [
                    'class' => 'mt-6 w-full border-b-2 border-violet-600 hover:cursor-pointer hover:bg-violet-100 outline-0 h-10'
                ],
                'placeholder' => 'Choose a company',
                'choice_label' => 'name',

            ]);
            $builder->get('roles')
            ->addModelTransformer(new CallbackTransformer(
                function ($rolesArray) {
                    return count($rolesArray) ? $rolesArray[0] : null;
                },
                function ($rolesString) {
                    return [$rolesString];
                }
            ));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
