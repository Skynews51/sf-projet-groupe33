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
     * @Route("/admin/employes", name="admin_employes")
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
     * @Route("/admin/supprimer/{id}", name="admin_employe_supprimer")
     */
    public function AdminEmployeSupprimerAction($id){
        $repository = $this->getDoctrine()->getRepository(User::class);
        $entityManager = $this->getDoctrine()->getManager();

        $user = $repository->find($id);

        $entityManager->remove($user);
        $entityManager->flush();

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