<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label'         => 'E-mail',
                'required'      => false,
                'help'          => 'Texte aide',
                'attr'          => [
                    'placeholder'   => 'Votre e-mail',
                ],

                'constraints'=>
                    [
                        new NotBlank(['message' => 'Champs obligatoire']),
                    ]
            ])
            ->add('nom', TextType::class, [
                'constraints'=>
                    [
                        new NotBlank(['message' => 'Champs obligatoire']),
                        new Length([
                            'max' => 10,
                            'maxMessage' => '{{ limit }} caractères maximum'
                        ]),
                    ]
            ])
            ->add('sujet', TextType::class, [
                'constraints'=>
                    [
                        new NotBlank(['message' => 'Champs obligatoire']),
                        new Length([
                            'min' => 4,
                            'minMessage' => '{{ limit }} caractères minimum'
                        ]),
                    ]
            ])
            ->add('message', TextareaType::class, [
                'constraints'=> [
                    new NotBlank(['message' => 'Champs obligatoire']),
                    new Length([
                        'min' => 4,
                        'minMessage' => '{{ limit }} caractères minimum',
                        'max' => 10,
                        'maxMessage' => '{{ limit }} caractères maximum'
                    ])
                ]
            ])
            ->add('submit', SubmitType::class); // On passe le type de champs en 2ème argument
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
