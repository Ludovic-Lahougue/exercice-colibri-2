<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'attr' => [
                    'autocomplete' => 'username',
                    'class' => 'form-control w-25',
                    'placeholder' => 'Nom d\'utilisateur'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrez un nom d\'utilisateur',
                    ]),
                    new Length([
                        'max' => 180,
                        'maxMessage' => 'Le nom d\'utilisateur ne doit pas faire plus de {{ limit }} caractères',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => [
                    'autocomplete' => 'new-password',
                    'class' => 'form-control w-25',
                    'placeholder' => 'Mot de passe'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrez un mot de passe',
                    ]),
                    new Length([
                        'max' => 255,
                        'maxMessage' => 'Le mot de passe ne doit pas faire plus de {{ limit }} caractères',
                    ]),
                ],
            ])
            ->add('admin', CheckboxType::class, [
                'mapped' => false,
                'attr' => [
                    'class' => 'form-check-input',
                ],
                'label' => 'Compte admin',
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
