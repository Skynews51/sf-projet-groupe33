<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 10/01/2019
 * Time: 15:02
 */

namespace AppBundle\Form;


use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->add('nom', TextareaType::class, array(
            'attr'=>array(
                'placeholder'=>'Veuillez entrez le Nom'
            ),
        ))
            ->add('prenom', TextareaType::class, array(
                'attr'=>array(
                    'placeholder'=>'Veuillez entrez le prénom'
                ),
            ))
            ->add('dateNaissance', DateType::class, array(
                'widget'=>'single_text',
                'format' => 'yyyy-MM-dd'
            ))
            ->add('username', TextareaType::class, array(
                'attr'=>array(
                    'placeholder'=>'Veuillez entrez le pseudo'
                )
            ))
            ->add('email', TextareaType::class, array(
                'attr'=>array(
                    'placeholder'=>'Veuillez entrez l\'email'
                )
            ))
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options' => array('label' => 'Mot de passe salarié'),
                'second_options' => array('label' => 'Confirmation mot de passe'),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
            ->add('adresse', TextareaType::class, array(
                'attr'=>array(
                    'placeholder'=>'Veuillez entrer l\'adresse'
                )
            ))
            ->add('dateEmbauche', DateType::class, array(
                'widget'=>'single_text',
                'format' => 'yyyy-MM-dd'
            ))
            ->add('site', TextareaType::class, array(
                'attr'=>array(
                    'placeholder'=>'Veuillez entrez le lieu'
                )
            ))
            ->add('save', SubmitType::class, array('label' => 'Envoyer'))

            ->getForm();


    }
}