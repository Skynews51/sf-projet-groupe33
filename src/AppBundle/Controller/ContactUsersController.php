<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 09/01/2019
 * Time: 12:23
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactUsersController extends Controller
{
    /**
     * @Route("/contact", name="users_contact")
     */
    public function ContactUsersAction(Request $request){
        $form =$this->createForm(ContactType::class, new Contact());

        $form->handleRequest($request);
        if ($form->isSubmitted() )
        {
            if ($form->isValid()) {
                $contact = $form->getData();

                $entityManager = $this->getDoctrine()->getManager();

                $entityManager->persist($contact);
                $entityManager->flush();
                $this->addFlash('notice',
                    'Vos information ont bien été enregistrées');

                $this->addFlash('notice',
                    'Votre message a bien été enregistré');


                return $this->redirectToRoute('users_contact');
            }else{
                $this->addFlash('notice',
                    'Une erreur est survenue lors de votre saisi'
                );

            }
        }

        return $this->render('@App/PagesUsers/contact_users.html.twig',

            [
                'form' =>$form->createView()
            ]

        );

    }


}
