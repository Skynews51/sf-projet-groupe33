<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 03/12/2018
 * Time: 10:28
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class AmbulancesUsersController extends Controller
{
    /**
     * @Route("/ambulances", name="users_ambulances")
     */
    public function AmbulancesUsersAction(){

        return $this->render('@App/PagesUsers/ambulances_users.html.twig');
    }
}