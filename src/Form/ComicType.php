<?php

namespace App\Form;

use App\Entity\Comics;
use App\Entity\Editor;
use App\Entity\Writer;
use App\Entity\Licence;
use App\Entity\Designer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ComicType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('year')
            ->add('licence', EntityType::class, [
                'class' => Licence::class,
                'choice_label' => 'name'
            ])
            ->add('editor', EntityType::class, [
                'class' => Editor::class,
                'choice_label' => 'name'
            ])
            ->add('writer', EntityType::class, [
                'class' => Writer::class,
                'choice_label' => 'name'
            ])
            ->add('designer', EntityType::class, [
                'class' => Designer::class,
                'choice_label' => 'name'
            ])
            ->add('Enregistrer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Comics::class,
        ]);
    }
}
