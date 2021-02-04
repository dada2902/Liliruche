<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Product;
use App\Form\ProductType;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('home.html.twig');
    }

    /**
     * @Route("/add-product", name="add-product")
     */
    public function addProduct(Request $request)
    {
        $new_product = new Product;
        $form = $this->createForm(ProductType::class, $new_product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($new_product);
            $entityManager->flush();

            return $this->redirectToRoute('index');
        }

        return $this->render('product.html.twig', [
            "form" => $form->createView()
        ]);
    }
}
