<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class LivraisoncommandeController extends AbstractController
{

    /**
     * @Route("/livraison-commande", name="livraison-commande")
     */
    public function livraisonCommande()
    {

        return $this->render('livraisoncommande.html.twig');
    }
}