<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Votre prénom',
                'constraints'=> new Length([
                    'min' => 2,
                    'max' => 30,
                    'minMessage' => 'Votre prénom doit faire au moins 2 caractères de long',
                    'maxMessage' => 'Votre prénom doit faire au maximum 30 caractères de long',
                ]),
                'attr' => [
                    'placeholder' => 'Saisissez votre prénom'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Votre nom',
                'constraints'=> new Length([
                    'min' => 2,
                    'max' => 30,
                    'minMessage' => 'Votre nom doit faire au moins 2 caractères de long',
                    'maxMessage' => 'Votre nom doit faire au maximum 30 caractères de long',
                ]),
                'attr' => [
                    'placeholder' => 'Saisissez votre nom'
                ]
            ])

            ->add('phone', NumberType::class, [
                'label' => 'Numéro de télephone',
                'constraints'=> new Regex([
                'pattern' => '[0-9]',
                'match' => false,   
                'message' => 'Votre numéro ne peut contenir que des chiffres',
                ]),

                'attr' => [
                    'placeholder' => 'Saisissez votre numéro'
                ]
            ])

            ->add('email', EmailType::class, [
                'label' => 'Votre email',
                'attr' => [
                    'placeholder' => 'Saisissez votre email'
                ]
            ])


            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Le mot de passe et la confirmation doivent être identique',
                'label' => 'Votre mot de passe',
                'required' => true,
                'first_options' => [
                    'label' => 'Mot de passe',
                    'attr' => [
                        'placeholder' => 'Saisissez votre mot de passe'
                    ]
                ],
                'second_options' => [ 
                    'label' => 'Confirmez votre mot de passe',    
                'attr' => [
                    'placeholder' => 'Merci de confirmer votre mot de passe'
                    ]
                ]
            ])


            ->add('submit', SubmitType::class, [
                'label' => "S'inscrire"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
