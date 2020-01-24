<?php

namespace App\Form;

use App\Entity\Contract;
use App\Entity\ContractAdditionalProperty;
use App\Entity\ContractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContractForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('slug', TextType::class)
            ->add('type', EntityType::class,[
                'class' => ContractType::class,
                'choice_label' => 'name']);

        $builder->get('type')->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) {
                $form = $event->getForm();
                dd($event->getForm());
            }
        );

    }
//    public function addProperties(FormBuilderInterface $builder, ContractType $contractType) {
//        $builder
//            ->add('name', TextType::class)
//            ->add('slug', TextType::class)
//
//            ->add('type', EntityType::class,[
//                'class' => ContractType::class,
//                'choice_label' => 'name',
//                'placeholder' => 'choisir un type de contrat'
//            ]);
//    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contract::class,
        ]);
    }
}
