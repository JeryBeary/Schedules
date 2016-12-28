<?php
/**
 * Created by PhpStorm.
 * User: JeryBeary
 * Date: 12/26/16
 * Time: 9:02 PM
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class EventType extends AbstractType
{
    /**
     * buildForm
     *
     * builds layout of forms with inputs
     *
     * @param FormBuilderInterface $builder: builds form
     * @param array $options: options regarding form
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('text', TextType::class, array('label' => 'Event Description'))
            ->add('time', DateTimeType::class, array('label' => 'Time of Event'))
            ->add('submit', SubmitType::class, array())
        ;
    }

    /**
     * configureOptions
     *
     * configures the options of the form
     *
     * @param OptionsResolver $resolver: sets default options for form
     */
public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Event'
        ));
    }
}