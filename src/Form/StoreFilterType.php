<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Shoe;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class StoreFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('minPrice', TextType::class)
            ->add('maxPrice', TextType::class)
            ->add('category', EntityType::class, [
                    'required'=>false,
                    'placeholder' => 'Choisisez une categorie',
                    'class' => Category::class])
            ->add('Rerchercher', SubmitType::class, [
                'attr' => ['class' => 'save btn-primary mt-2'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' =>null,
        ]);
    }

}