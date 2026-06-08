<?php

namespace App\Form;

use App\Entity\Etablissement;
use App\Entity\Filiere;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FiliereType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom de la filière',
                'attr' => ['placeholder' => 'Ex: Génie Logiciel']
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description de la formation',
                'attr' => ['rows' => 3, 'placeholder' => 'Objectifs de la formation...']
            ])
            ->add('debouches', TextareaType::class, [
                'label' => 'Débouchés professionnels',
                'attr' => ['rows' => 3, 'placeholder' => 'Ex: Développeur web, Chef de projet...']
            ])
            ->add('etablissements', EntityType::class, [
                'class' => Etablissement::class,
                'choice_label' => 'nom', // Double sécurité pour forcer l'affichage du nom
                'label' => 'Établissement de rattachement',
                'multiple' => true,
                'expanded' => false,
                'placeholder' => '--- Sélectionnez un établissement ---',
                'attr' => ['class' => 'form-select']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Filiere::class,
        ]);
    }
}
