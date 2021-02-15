<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use App\Entity\Category;
use Exception;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class HomeController extends AbstractController
{

  /**
   * @Route("/", name="index")
   */
  public function article()
  {
    $products = $this->getDoctrine()->getRepository(Product::class)->findAll();
    return $this->render('home.html.twig', [
      'products' => $products
    ]);
  }

  /**
   * @Route("/{id}", name="article")
   */
  public function showArticle($id): Response
  {
    $categories = $this->getDoctrine()->getRepository(Category::class)->find($id);
    $product = $this->getDoctrine()->getRepository(Product::class)->find($id);

    if (!$product) {
      throw new Exception("Erreur : Il n'y a aucun produit avec l'id : $id");
    }

    return $this->render('detailproduct.html.twig', [
      "id" => $id,
      'categories' => $categories,
      'product' => $product
    ]);
  }
}
