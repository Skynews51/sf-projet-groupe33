<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 03/12/2018
 * Time: 14:14
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Employes;
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
     * @Route("/emp/profil", name="profil_emp")
     */
    public function ProfilEmpAction(){

        $repository = $this->getDoctrine()->getRepository(Employes::class);

        $employes = $repository->findAll();
//retourne la page html auteurs en utilisant le twig

        return $this->render('@App/PagesEmp/profil_emp.html.twig',

            [
                'employes'=> $employes
            ]

        );
    }
}

///**
 //* @Route("/auteur/{id}", name="auteur_info")
// */
//public function InfoAuteurAction($id)
//{
    //on a besoin du repository Auteur pour récupérer le contenu de la table Auteur
    // pour récupérer ce repository :
    // on appelle Doctrine (qui gère les répository)
    // pour appeler la méthode getRepository qui récupère le repository Auteur (avec Auteur::class passé en parametre)
    //le placeholder {id} est utilisé comme paramétre $id pour la requete doctrine
    //$repository = $this->getDoctrine()->getRepository(Auteur::class);
    // choix de l'auteur avec la méthode find()
    //$auteur = $repository->find($id);

    //return $this->render('@App/Pages/info.html.twig',
     //   [
           // 'auteur'=>$auteur
      //  ]
   // );

//}