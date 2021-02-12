<?php

namespace App\Controller;

use App\Service\Cart\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    /**
     * @Route("/panier", name="cart_index")
     */
    public function index(CartService $cartService)
    {
        // dd($panierWithData);
        return $this->render('cart/index.html.twig', [
            'items' => $cartService->getFullCart(),
            'total' => $cartService->getTotal()
        ]);
    }

    /**
     * @Route("/panier/add/{id} ", name="cart_add")
     */
    public function add($id, CartService $cartService)
    {

        $cartService->add($id);

        // dd($session->get('panier'));
        $this->addFlash("panier_add_success", "Produit ajouté");
        return $this->redirectToRoute("cart_index");
    }

    /**
     * @Route("/panier/remove/{id}" , name="cart_remove")
     */
    public function removeItem($id, CartService $cartService)
    {
        $cartService->remove($id);

        $this->addFlash("panier_remove_success", "Produit enlevé");
        return $this->redirectToRoute("cart_index");
    }
}
