<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 03/12/2018
 * Time: 14:14
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class EmployesController extends Controller

{
    /**
     * @Route("/emp", name="accueil_emp")
     */
    public function AccueilEmpAction(){

        return $this->render('@App/PagesEmp/accueil_emp.html.twig');

    }

    /**
     * @Route("/profil", name="emp_profil")
     */
    public function ProfilEmpAction(){

        $user = $this->get('security.token_storage')->getToken()->getUser();


        return $this->render('@App/PagesEmp/profil_emp.html.twig',

            [
                'user'=> $user
            ]

        );
    }
}

