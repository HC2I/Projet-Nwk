<?php

namespace App\Form;

use App\Entity\DepotAnnonce;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DepotAnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titreAnnonce')
            ->add('descriptionAnnonce')
            ->add('Lieu')
            ->add('dateDebut')
            ->add('duree')
            ->add('typeFormation')
            ->add('Renumeration')
            ->add('specialiteRecherche')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DepotAnnonce::class,
        ]);
    }
}
