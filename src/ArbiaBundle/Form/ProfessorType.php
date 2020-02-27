<?php

namespace ArbiaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use blackknight467\StarRatingBundle\Form\RatingType;
class ProfessorType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('file')->add('nom')
        ->add('rating', RatingType::class, [
            'stars' => 5
        ])->add('prenom')->add('tel')->add('matiere',ChoiceType::class,[
                'choices'=>[
                    'Franaçais'=>'Français',
                    'Anglais'=>'Anglais',
                    'Arabe'=>'Arabe',
                    'Science'=>'Science',
                ],
                'preferred_choices'=>['muppets','Français']
            ])
        ->add('Ajouter',SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ArbiaBundle\Entity\Professor'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'arbiabundle_professor';
    }


}
