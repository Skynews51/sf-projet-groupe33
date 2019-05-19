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
use ReCaptcha\ReCaptcha;

class ContactUsersController extends Controller
{
    /**
     * @Route("/contact", name="users_contact")
     */
    public function ContactUsersAction(Request $request)
    {
        $form = $this->createForm(ContactType::class, new Contact());
        $recaptcha = new ReCaptcha('6LdoqZsUAAAAAFQweQ1sw62wc473s6-CHRUyJIhu');
        $resp = $recaptcha->verify($request->request->get('g-recaptcha-response'), $request->getClientIp());


        $form->handleRequest($request);


        if ($form->isSubmitted()) {


            if ($form->isValid()) {
                $contact = $form->getData();

                $entityManager = $this->getDoctrine()->getManager();

                $entityManager->persist($contact);
                $entityManager->flush();
                $this->addFlash('notice',
                    'Votre formulaire a été envoyé avec succes !');


                return $this->redirectToRoute('users_contact');
            } else {
                $this->addFlash('notice',
                    'Une erreur est survenue lors de votre saisi'
                );

            }
            if (!$resp->isSuccess()) {
                // Do something if the submit wasn't valid ! Use the message to show something
                $this->addFlash('notice',
                    'Votre formulaire a été envoyé avec succes !');
            } else {
                // Everything works good ;) your contact has been saved.
            }
        }

        return $this->render('@App/PagesUsers/contact_users.html.twig',

            [
                'form' => $form->createView()
            ]

        );

    }


}
