<?php

namespace App\Form;

use App\Entity\RickPick;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
class RickPickType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class,[
                'attr' =>[
                        'placeholder'=> 'Enter the name here',
                        'class'=>'custom_class'
                ]
            ])
            ->add('adress', TextType::class)
            ->add('age', IntegerType::class)
            ->add('rogercity', EntityType::class, [
                'class' =>'App\Entity\RogerCity',
            ])
            ->add('save', SubmitType::class,
                [ 'attr'=>[ 'class'=>'btn btn-success']]) ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RickPick::class,
        ]);
    }
}
