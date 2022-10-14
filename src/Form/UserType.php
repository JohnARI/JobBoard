<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Sector;
use App\Entity\Company;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
                    'placeholder' => 'Password',
                    'minlength' => 8,
                    'minlengthMessage' => 'Le mot de passe doit contenir au moins 8 caractères',

                ],
                'constraint' => new NotBlank([
                    'message' => 'You must enter a password',
                ])
                
            ])
            ->add('firstname', TextType::class, [
                'required' => false,
                'attr' => [
                    'class' => 'mt-6 w-full border-b-2 border-violet-600 outline-0 h-10',
                    'placeholder' => 'Firstname',
                ]
            ])
            ->add('lastname', TextType::class, [
                'required' => false,
                'attr' => [
                    'class' => 'mt-6 w-full border-b-2 border-violet-600 outline-0 h-10',
                    'placeholder' => 'Lastname',
                ]
            ])
            ->add('phone', TelType::class, [
                'required' => false,
                'attr' => [
                    'class' => 'mt-6 w-full border-b-2 border-violet-600 outline-0 h-10',
                    'placeholder' => 'Phone',
                    'minlength' => 10,
                    'minlengthMessage' => 'Your phone number must be at least {{ limit }} character'
                ]
            ])
            ->add('resume', FileType::class, [
                'required' => false,
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
                'required' => false,
                'attr' => [
                    'class' => 'mt-6 w-full border-b-2 border-violet-600 hover:cursor-pointer hover:bg-violet-100 outline-0 h-10'
                ],
                'placeholder' => 'Choose a sector',
                'choice_label' => 'name',
            ])
            ->add('company', EntityType::class, [
                'class' => Company::class,
                'required' => false,
                'attr' => [
                    'class' => 'mt-6 w-full border-b-2 border-violet-600 hover:cursor-pointer hover:bg-violet-100 outline-0 h-10'
                ],
                'placeholder' => 'Choose a company',
                'choice_label' => 'name',

            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'bg-violet-600 h-10 rounded text-white font-semibold w-32 transition hover:bg-white border-2 hover:text-violet-600 hover:border-violet-600'
                ]
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
