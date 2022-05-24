<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

class ArticleFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'attr' => [
                    'class' => 'form-control w-50',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrez un titre',
                    ]),
                    new Length([
                        'max' => 255,
                        'maxMessage' => 'Le titre ne doit pas faire plus de {{ limit }} caractères',
                    ]),
                ],
            ])
            ->add('description', TextType::class, [
                'attr' => [
                    'class' => 'form-control w-100',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrez une description',
                    ]),
                    new Length([
                        'max' => 511,
                        'maxMessage' => 'La description ne doit pas faire plus de {{ limit }} caractères',
                    ]),
                ],
            ])
            ->add('contenu', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'rows' => '15',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrez un contenu',
                    ]),
                    new Length([
                        'max' => 4095,
                        'maxMessage' => 'Le contenu ne doit pas faire plus de {{ limit }} caractères',
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
