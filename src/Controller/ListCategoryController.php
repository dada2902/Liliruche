<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use PDO;

class ListCategoryController extends AbstractController
{

  /**
   * @Route("/info/miel ", name="miel")
   */
  public function miel()
  {
    $pdo = new PDO('mysql:host=localhost;dbname=bdd_liliruche;charset=utf8', 'root', '', [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    $products = $pdo->prepare("SELECT * FROM product WHERE category_id = :category_id");
    $products->execute(['category_id' => 1]);

    return $this->render('listCategory/miel.html.twig', [
      'category_id' => 1,
      'products' => $products,
    ]);
  }


  /**
   * @Route("/info/epiceriefine", name="epiceriefine")
   */
  public function epiceriefine()
  {
    $pdo = new PDO('mysql:host=localhost;dbname=bdd_liliruche;charset=utf8', 'root', '', [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    $products = $pdo->prepare("SELECT * FROM product WHERE category_id = :category_id");
    $products->execute(['category_id' => 2]);

    return $this->render('listCategory/epiceriefine.html.twig', [
      'category_id' => 2,
      'products' => $products,
    ]);
  }

  /**
   * @Route("/info/bienetre", name="bienetre")
   */
  public function bienetre()
  {
    $pdo = new PDO('mysql:host=localhost;dbname=bdd_liliruche;charset=utf8', 'root', '', [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    $products = $pdo->prepare("SELECT * FROM product WHERE category_id = :category_id");
    $products->execute(['category_id' => 3]);

    return $this->render('listCategory/bienetre.html.twig', [
      'category_id' => 3,
      'products' => $products,
    ]);
  }

  /**
   * @Route("/info/coffretscadeaux", name="coffretscadeaux")
   */
  public function coffretscadeaux()
  {
    $pdo = new PDO('mysql:host=localhost;dbname=bdd_liliruche;charset=utf8', 'root', '', [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    $products = $pdo->prepare("SELECT * FROM product WHERE category_id = :category_id");
    $products->execute(['category_id' => 4]);

    return $this->render('listCategory/coffretscadeaux.html.twig', [
      'category_id' => 4,
      'products' => $products,
    ]);
  }
}
