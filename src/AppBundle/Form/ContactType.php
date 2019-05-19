<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 11/01/2019
 * Time: 17:17
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom', TextareaType::class, array(
            'attr' => array(
                'placeholder' => 'Veuillez entrez votre Nom'
            ),
        ))
            ->add('email', TextareaType::class, array(
                'attr'=>array(
                    'placeholder'=>'Veuillez entrer votre email',
                    'by_reference' => false

                )
            ))
            ->add('sujet', TextareaType::class, array(
                'attr'=>array(
                    'placeholder'=>'Veuillez entrer le sujet'
                )
            ))
            ->add('message', TextareaType::class, array(
                'attr'=>array(
                    'placeholder'=>'Veuillez entrer votre message'
                )
            ))
            ->add('save', SubmitType::class, array('label' => 'Envoyer'))
            ->getForm();
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Contact'
        ));
    }
}