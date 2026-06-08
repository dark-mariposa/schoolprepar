<?php

namespace App\Form;

use App\Entity\Etablissement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtablissementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom de l\'établissement',
                'attr' => ['placeholder' => 'Ex: Université de Lomé (UL)']
            ])
            ->add('ville', TextType::class, [
                'label' => 'Ville',
                'attr' => ['placeholder' => 'Ex: Lomé']
            ])
            ->add('type', ChoiceType::class, [
                'label' => 'Type d\'établissement',
                'choices' => [
                    'Public' => 'Public',
                    'Privé' => 'Privé',
                    'Inter-États' => 'Inter-États',
                ],
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description / Historique',
                'required' => false,
                'attr' => ['rows' => 4, 'placeholder' => 'Brève présentation de l\'établissement...']
            ])
        ;
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Etablissement::class,
        ]);
    }
}
