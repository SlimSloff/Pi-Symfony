<?php

namespace ArbiaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class SeanceEleveType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('classe')->add('dateDebut')->add('dateFin')->add('matiere',ChoiceType::class,[
            'choices'=>[
                'Franaçais'=>'Français',
                'Anglais'=>'Anglais',
                'Arabe'=>'Arabe',
                'Science'=>'Science',
            ],
            'preferred_choices'=>['muppets','Français']
        ])->add('enregistrer',SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ArbiaBundle\Entity\SeanceEleve'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'arbiabundle_seanceeleve';
    }


}
