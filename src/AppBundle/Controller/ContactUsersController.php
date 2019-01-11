<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 09/01/2019
 * Time: 12:23
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class ContactUsersController extends Controller
{
    /**
     * @Route("/contact", name="users_contact")
     */
    public function ContactUsersAction(){
        return $this->render('@App/PagesUsers/contact_users.html.twig');

    }


}
