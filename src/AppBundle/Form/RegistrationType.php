<?php
/**
 * Created by PhpStorm.
 * User: JeryBeary
 * Date: 12/23/16
 * Time: 8:17 PM
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationType extends AbstractType
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
            ->add('username', TextType::class, array('label' => 'Username'))
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeat Password'),
                'first_name' => 'pass',
                'second_name' => 'confirm',
            ))
            ->add('save', SubmitType::class, array('label' => 'Submit'))
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
            'data_class' => 'AppBundle\Entity\User'
        ));
    }

}