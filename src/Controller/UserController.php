<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;



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
}
