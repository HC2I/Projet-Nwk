<?php

namespace App\Form;

use App\Entity\Post;
use App\Entity\User;
use App\Entity\Forum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('description')
            ->add('date')
            ->add('auteur',EntityType::class, [
                'class'=>User::class,
                'choice_label'=>'login',

            ])
            ->add('forum',EntityType::class, [
                'class'=>Forum::class,
                'choice_label'=>'titre',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}