<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 10/01/2019
 * Time: 11:32
 */

namespace AppBundle\Controller;


use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminEmpController extends Controller
{
    /**
     * @Route("/admin", name="admin_employes")
     */
    public function listeAdminEmp(){
        $repository = $this->getDoctrine()->getRepository(User::class);
        $users = $repository->findAll();
        return $this->render('@App/PagesAdmin/admin_employe.html.twig',

            [
                'users'=>$users
            ]

        );
    }
    /**
     * @Route("/admin/update/emp/formulaire/{id}", name="admin_update_emp_form")
     */
    public function AdminUpdateEmpAction(Request $request,$id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $employes =$this->getDoctrine()->getRepository(User::class)->find($id);
        $form = $this->createForm(UserType::class, $employes);

        //j'associe les données envoyées par le client via le formulaire à mettre sur la variable $form.
        // Donc la variable $form contient aussi les données
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $form->getData();
            $entityManager->persist($employes);
            $entityManager->flush();
            $this->addFlash('notice',
                'Les modifications ont bien été enregistré');

            return $this->redirectToRoute('admin_employes');
        }
        return $this->render('@App/PagesAdmin/admin_update_emp_form.html.twig',
            [

                'form' =>$form->createView()

            ]

        );
    }
    /**
     * @Route("/admin/supprimer/{id}", name="admin_employe_supprimer")
     */
    public function AdminEmployeSupprimerAction($id){
        $repository = $this->getDoctrine()->getRepository(User::class);
        $entityManager = $this->getDoctrine()->getManager();

        $user = $repository->find($id);

        $entityManager->remove($user);
        $entityManager->flush();
        $this->addFlash('notice',
            'L\'employé à bien été enregistré');

        return $this->render('@App/PagesAdmin/suppr_employe_admin.html.twig');
    }

    /**
     * @Route("/admin/employe/formulaire", name="admin_form_employes")
     */
    public function AdminFormEmpAction(Request $request){
        $form =$this->createForm(UserType::class, new User());

        $form->handleRequest($request);
        if ($form->isSubmitted() )
        {
            if ($form->isValid()) {
                $user = $form->getData();

                $entityManager = $this->getDoctrine()->getManager();

                $entityManager->persist($user);
                $entityManager->flush();

                $this->addFlash('notice',
                    'L\'employé a bien été enregistré');


                return $this->redirectToRoute('admin_employes');
            }else{
                $this->addFlash('notice',
                    'Une erreur est survenue lors de votre saisi'
                );

            }
        }

        return $this->render('@App/PagesAdmin/Admin_emp_form.html.twig',

            [
                'form' =>$form->createView()
            ]

        );


    }

}