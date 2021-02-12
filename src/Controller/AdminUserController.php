<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;

class AdminUserController extends AbstractController
{
    //-------------------------- UTILISATEURS ------------------------------------- 

    /**
     * @Route("/admin/affichage-user", name="affichage-user")
     */
    public function affichageUser()
    {
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();
        return $this->render('admin/affichageuser.html.twig', [
            'users' => $users
        ]);
    }

    /**
     * @Route("/admin/delete-user/{id}", name="delete-user")
     */

    public function deleteUser($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $users = $entityManager->getRepository(User::class)->find($id);

        $entityManager->remove($users);
        $entityManager->flush();
        
        $this->addFlash("user_delete_success", "L'utilisateur a été supprimer avec succès");
        return $this->redirectToRoute('affichage-user');
    }
}
