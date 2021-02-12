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
   * @Route("/affichage-category-home", name="affichage-category-home")
   */

  public function affichageListCategory()
  {
      
      $categories = $this->getDoctrine()->getRepository(Category::class)->findall();
      return $this->render('home.html.twig', [
         'categories' => $categories
        
      ]);
  }

}