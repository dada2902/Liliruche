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


class ListCategoryController extends AbstractController
{

  /**
   * @Route("/info/miel", name="miel")
   */
  public function miel()
  {
    $products = $this->getDoctrine()->getRepository(Product::class)->findAll();
    return $this->render('listCategory/miel.html.twig', [
      'products' => $products
    ]);
  }

  /**
   * @Route("/info/epiceriefine", name="epiceriefine")
   */
  public function epiceriefine()
  {
    $products = $this->getDoctrine()->getRepository(Product::class)->findAll();
    return $this->render('listCategory/epiceriefine.html.twig', [
      'products' => $products
    ]);
  }

  /**
   * @Route("/info/coffretscadeaux", name="coffretscadeaux")
   */
  public function coffretscadeaux()
  {
    $products = $this->getDoctrine()->getRepository(Product::class)->findAll();
    return $this->render('listCategory/coffretscadeaux.html.twig', [
      'products' => $products
    ]);
  }

  /**
   * @Route("/info/bienetre", name="bienetre")
   */
  public function bienetre()
  {
    $products = $this->getDoctrine()->getRepository(Product::class)->findAll();
    return $this->render('listCategory/bienetre.html.twig', [
      'products' => $products
    ]);
  }
}
