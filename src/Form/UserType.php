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
            ->add('email', EmailType::class)
            ->add('roles', ChoiceType::class, [
                'multiple' => false,
                'expanded' => false,
                'choices' => [
                    'Administrateur' => 'ROLE_ADMIN',
                    'Recruteur' => 'ROLE_RECRUITER',
                    'Utilisateur' => 'ROLE_USER',
                ],

            ])
            ->add('password', PasswordType::class)
            ->add('firstname', TextType::class)
            ->add('lastname', TextType::class)
            ->add('phone', TelType::class)
            ->add('resume', FileType::class, [
                'mapped' => false,
                'required' => false,
            ])
            ->add('sector', EntityType::class, [
                'class' => Sector::class,
                'choice_label' => 'name',
            ])
            ->add('company', EntityType::class, [
                'class' => Company::class,
                'placeholder' => 'Choisissez une entreprise',
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
