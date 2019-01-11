<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 09/01/2019
 * Time: 12:08
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class VslUsersController extends Controller
{
    /**
     * @Route("/vsl-taxis", name="users_vsl-taxi")
     */
    public function VslUsersAction(){

return $this->render('AppBundle:PagesUsers:vsl_taxis_users.html.twig');
    }
}