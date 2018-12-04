<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 02/12/2018
 * Time: 14:48
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class AccueilUsersController extends Controller
{
    /**
     * @Route("/", name="accueil_users")
     */


    public function AccueilUsersAction(){

return $this->render('@App/PagesUsers/accueil_users.html.twig');



    }



}