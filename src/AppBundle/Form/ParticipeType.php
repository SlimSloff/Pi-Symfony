<?php


namespace AppBundle\Form;


use AppBundle\Entity\Enfant;
use AppBundle\Entity\Event;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParticipeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Event', EntityType::class, [
                'class' => Event::class,
            ])
//            ->add('enfant', EntityType::class, [
//                'class' => Enfant::class,
//                'query_builder' => function (EnfantRepository $er) {
//                    return $er->createQueryBuilder('u')->orderBy('u.username', 'ASC');
//                },
//            ])
        ;

    }/**
 * {@inheritdoc}
 */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Event'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_event';
    }


}
