<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class InfoController extends AbstractController
{
    // ---------------------------  MENTIONS LEGALS CGV  -----------------------------------------

    /**
     * @Route("/info/cgv", name="cgv")
     */
    public function cgv()
    {

        return $this->render('info/cgv.html.twig');
    }

    // ---------------------------  CONTACT  -----------------------------------------

    // /**
    //  * @Route("/info/contact", name="contact")
    //  */
    // public function contact()
    // {

    //     return $this->render('info/contact.html.twig');
    // }

    // ---------------------------  PAIMENT SECURISE  -----------------------------------------

    /**
     * @Route("/info/paiment", name="paiment")
     */
    public function paiment()
    {

        return $this->render('info/paiment.html.twig');
    }

    // ---------------------------  QUI SOMMES-NOUS ?  -----------------------------------------

    /**
     * @Route("/info/quisommesnous", name="quisommesnous")
     */
    public function quisommesnous()
    {

        return $this->render('info/quisommesnous.html.twig');
    }

    // ---------------------------  LIVRAISON ET RETOUR  -----------------------------------------

    /**
     * @Route("/info/livraison", name="livraison")
     */
    public function livraison()
    {

        return $this->render('info/livraison.html.twig');
    }
}
