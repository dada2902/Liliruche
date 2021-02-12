<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class UserController extends AbstractController
{
    //  ----------------------AFFICHAGE DU COMPTE CLIENT -----------------------


    /**
     *@Route("/info/compte", name="compte")
     */
    public function user()
    {
        // $user = $this->getDoctrine()->getRepository(User::class)->find();
        return $this->render('info/affichagecompte.html.twig');
    }

    /**
     *@Route("/info/{id}", name="edit-compte")
     */
    public function editUser($id, Request $request)

    {
        $user = $this->getDoctrine()->getRepository(User::class)->find($id);
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            $this->addFlash("compte_edit_success", "Votre compte a été modifié avec succès");
            return $this->redirectToRoute('compte');
        }

        return $this->render('info/modifcompte.html.twig', [
            'form' => $form->createView(),

        ]);
    }

     /**
      * @Route("/info/delete-compte/{id}", name="delete-compte")
      */
     public function deletUser($id, Request $request)
     {
         $user = $this->getDoctrine()->getRepository(User::class)->find($id);
         
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
            
        $this->addFlash("compte_delete_success", "Votre compte a été supprimé avec succès");
         return $this->redirectToRoute('index');
     }

  
}
