<?php

namespace ArbiaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExamenType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('libelle',ChoiceType::class,[
            'choices'=>[
                'Franaçais'=>'Français',
                'Anglais'=>'Anglais',
                'Arabe'=>'Arabe',
                'Science'=>'Science',
            ],
            'preferred_choices'=>['muppets','Français']
        ])->add('datedebut')->add('datefin')->add('salle')
        ->add('Ajouter',SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ArbiaBundle\Entity\Examen'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'arbiabundle_examen';
    }


}
