<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Product;
use App\Form\ProductType;
use App\Entity\Category;
use App\Entity\User;
use App\Form\CategoryType;
use Exception;
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

  // ---------------------------  MENTIONS LEGALS CGV  -----------------------------------------

  /**
   * @Route("/cgv", name="cgv")
   */
  public function cgv()
  {

    return $this->render('info/cgv.html.twig');
  }

  // ---------------------------  CONTACT  -----------------------------------------

  /**
   * @Route("/contact", name="contact")
   */
  public function contact()
  {

    return $this->render('info/contact.html.twig');
  }

  // ---------------------------  PRODUCT  -----------------------------------------
  /**
   * @Route("/affichage-product", name="affichage-product")
   */
  public function affichage()
  {
    $products = $this->getDoctrine()->getRepository(Product::class)->findAll();
    return $this->render('admin/affichageproduct.html.twig', [
      'products' => $products
    ]);
  }


  /**
   * @Route("/show-product/{id}", name="show-product")
   */
  public function show($id): Response
  {
    $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
    $product = $this->getDoctrine()->getRepository(Product::class)->find($id);

    if (!$product) {
      throw new Exception("Erreur : Il n'y a aucun produit avec l'id : $id");
    }

    return $this->render('admin/detailproduct.html.twig', [
      'categories' => $categories,
      'product' => $product
    ]);
  }


  /**
   *@Route("/product/{id}", name="product")
   */
  public function product($id)
  {
    $product = $this->getDoctrine()->getRepository(Product::class)->find($id);
    return $this->render('admin/addproduct.html.twig', [
      "id" => $id,
      "product" => $product
    ]);
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

      return $this->redirectToRoute('affichage-product');
    }

    return $this->render('admin/addproduct.html.twig', [
      "form" => $form->createView()
    ]);
  }

  /**
   * @Route("/edit-product/{id}", name="edit-product")
   */

  public function editProduct($id, Request $request)
  {
    $product = $this->getDoctrine()->getRepository(Product::class)->find($id);
    $form = $this->createForm(ProductType::class, $product);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $entityManager = $this->getDoctrine()->getManager();
      $entityManager->flush();

      return $this->redirectToRoute('affichage-product');
    }

    return $this->render('admin/addproduct.html.twig', [
      "form" => $form->createView()
    ]);
  }

  /**
   * @Route("/delete-product/{id}", name="delete-product")
   */

  public function deleteProduct($id)
  {
    $entityManager = $this->getDoctrine()->getManager();
    $products = $entityManager->getRepository(Product::class)->find($id);

    $entityManager->remove($products);
    $entityManager->flush();

    return $this->redirectToRoute('affichage-product');
  }

  //-------------------------- CATEGORY ------------------------------------- 

  /**
   * @Route("/affichage-category", name="affichage-category")
   */
  public function affichageCategory()
  {
    $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
    return $this->render('admin/affichagecategory.html.twig', [
      'categories' => $categories
    ]);
  }

  /**
   *@Route("/category/{id}", name="category")
   */
  public function category($id)
  {
    $category = $this->getDoctrine()->getRepository(Category::class)->find($id);
    return $this->render('admin/addcategory.html.twig', [
      "id" => $id,
      "category" => $category
    ]);
  }

  /**
   * @Route("/add-category", name="add-category")
   */
  public function addCategory(Request $request)
  {
    $new_category = new Category;
    $form = $this->createForm(CategoryType::class, $new_category);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {

      $entityManager = $this->getDoctrine()->getManager();
      $entityManager->persist($new_category);
      $entityManager->flush();

      return $this->redirectToRoute('affichage-category');
    }

    return $this->render('admin/addcategory.html.twig', [
      "form" => $form->createView()
    ]);
  }

  /**
   * @Route("/edit-category/{id}", name="edit-category")
   */

  public function editCategory($id, Request $request)
  {
    $category = $this->getDoctrine()->getRepository(Category::class)->find($id);
    $form = $this->createForm(CategoryType::class, $category);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $entityManager = $this->getDoctrine()->getManager();
      $entityManager->flush();

      return $this->redirectToRoute('affichage-category');
    }

    return $this->render('admin/addcategory.html.twig', [
      "form" => $form->createView()
    ]);
  }

  /**
   * @Route("/delete-category/{id}", name="delete-category")
   */

  public function deleteCategory($id)
  {
    $entityManager = $this->getDoctrine()->getManager();
    $categories = $entityManager->getRepository(Category::class)->find($id);

    $entityManager->remove($categories);
    $entityManager->flush();

    return $this->redirectToRoute('affichage-category');
  }


  //-------------------------- UTILISATEURS ------------------------------------- 

  /**
   * @Route("/affichage-user", name="affichage-user")
   */
  public function affichageUser()
  {
    $users = $this->getDoctrine()->getRepository(User::class)->findAll();
    return $this->render('admin/affichageuser.html.twig', [
      'users' => $users
    ]);
  }

  /**
   * @Route("/delete-user/{id}", name="delete-user")
   */

  public function deleteUser($id)
  {
    $entityManager = $this->getDoctrine()->getManager();
    $users = $entityManager->getRepository(User::class)->find($id);

    $entityManager->remove($users);
    $entityManager->flush();

    return $this->redirectToRoute('affichage-user');
  }
}
