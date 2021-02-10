<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Product;
use App\Form\ProductType;
use App\Entity\Category;
use App\Entity\Contact;
use App\Entity\Images;
use App\Entity\User;
use App\Form\CategoryType;
use App\Form\ContactType;
use Doctrine\Persistence\ObjectManager;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class HomeController extends AbstractController
{

  /**
   * @Route("/", name="index")
   */
  public function article()
  {
    $products = $this->getDoctrine()->getRepository(Product::class)->findAll();
    return $this->render('/home.html.twig', [
      'products' => $products
    ]);
  }

  /**
   * @Route("/article/{id}", name="article")
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

  // ---------------------------  PAIMENT SECURISE  -----------------------------------------

  /**
   * @Route("/paiment", name="paiment")
   */
  public function paiment()
  {

    return $this->render('info/paiment.html.twig');
  }

  // ---------------------------  QUI SOMMES-NOUS ?  -----------------------------------------

  /**
   * @Route("/quisommesnous", name="quisommesnous")
   */
  public function quisommesnous()
  {

    return $this->render('info/quisommesnous.html.twig');
  }

  // ---------------------------  LIVRAISON ET RETOUR  -----------------------------------------

  /**
   * @Route("/livraison", name="livraison")
   */
  public function livraison()
  {

    return $this->render('info/livraison.html.twig');
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
   * @Route("/admin/add-product", name="add-product")
   */
  public function addProduct(Request $request)
  {
    $new_product = new Product;
    $form = $this->createForm(ProductType::class, $new_product);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      // On récupère les images transmises
      $images = $form->get('images')->getData();

      // On boucle sur les images
      foreach ($images as $image) {
        //On génère un nouveau nom de fichier
        $fichier = md5(uniqid()) . '.' . $image->guessExtension();

        // On copie le fichier dans le dossier uploads
        $image->move(
          $this->getParameter('images_directory'),
          $fichier
        );

        // On stock l'image dans la BDD (son titre)
        $img = new Images();
        $img->setTitre($fichier);
        $new_product->addImage($img);
      }

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
   * @Route("/admin/edit-product/{id}", name="edit-product")
   */

  public function editProduct($id, Request $request)
  {
    $product = $this->getDoctrine()->getRepository(Product::class)->find($id);
    $form = $this->createForm(ProductType::class, $product);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      // On récupère les images transmises
      $images = $form->get('images')->getData();

      // On boucle sur les images
      foreach ($images as $image) {
        //On génère un nouveau nom de fichier
        $fichier = md5(uniqid()) . '.' . $image->guessExtension();

        // On copie le fichier dans le dossier uploads
        $image->move(
          $this->getParameter('images_directory'),
          $fichier
        );

        // On stock l'image dans la BDD (son titre)
        $img = new Images();
        $img->setTitre($fichier);
        $product->addImage($img);
      }

      $entityManager = $this->getDoctrine()->getManager();
      $entityManager->flush();

      return $this->redirectToRoute('affichage-product');
    }

    return $this->render('admin/addproduct.html.twig', [
      "product" => $product,
      "form" => $form->createView()
    ]);
  }

  /**
   * @Route("/admin/delete-product/{id}", name="delete-product")
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
   * @Route("/admin/affichage-category", name="affichage-category")
   */
  public function affichageCategory()
  {
    $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
    return $this->render('admin/affichagecategory.html.twig', [
      'categories' => $categories
    ]);
  }

  /**
   *@Route("/admin/category/{id}", name="category")
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
   * @Route("/admin/add-category", name="add-category")
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
   * @Route("/admin/edit-category/{id}", name="edit-category")
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
   * @Route("/admin/delete-category/{id}", name="delete-category")
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
   * @Route("/admin/affichage-user", name="affichage-user")
   */
  public function affichageUser()
  {
    $users = $this->getDoctrine()->getRepository(User::class)->findAll();
    return $this->render('admin/affichageuser.html.twig', [
      'users' => $users
    ]);
  }

  /**
   * @Route("/admin/delete-user/{id}", name="delete-user")
   */

  public function deleteUser($id)
  {
    $entityManager = $this->getDoctrine()->getManager();
    $users = $entityManager->getRepository(User::class)->find($id);

    $entityManager->remove($users);
    $entityManager->flush();

    return $this->redirectToRoute('affichage-user');
  }

  //--------------------- CONTACTEZ-NOUS -------------------------------

  /**
   * @Route("/admin/affichage-contact", name="affichage-contact")
   */
  public function affichageContact()
  {
    $contacts = $this->getDoctrine()->getRepository(Contact::class)->findAll();
    return $this->render('admin/affichagecontact.html.twig', [
      'contacts' => $contacts
    ]);
  }

  /**
   * @Route("/add-contact", name="add-contact")
   */
  public function addContact(Request $request)
  {
    $new_contact = new Contact;
    $form = $this->createForm(ContactType::class, $new_contact);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {

      $entityManager = $this->getDoctrine()->getManager();
      $entityManager->persist($new_contact);
      $entityManager->flush();
    }

    return $this->render('info/addcontact.html.twig', [
      "form" => $form->createView()
    ]);
  }


  /**
   * @Route("/admin/delete-contact/{id}", name="delete-contact")
   */

  public function deleteContact($id)
  {
    $entityManager = $this->getDoctrine()->getManager();
    $contacts = $entityManager->getRepository(Contact::class)->find($id);

    $entityManager->remove($contacts);
    $entityManager->flush();

    return $this->redirectToRoute('affichage-contact');
  }


  // ------------- IMAGES ------------

  /**
   * @Route("/admin/supprime/image/{id}", name="product_delete_image", methods={"DELETE"})
   */
  public function deleteImage(Images $image, Request $request)
  {
    $data = json_decode($request->getContent(), true);

    if ($this->isCsrfTokenValid('delete' . $image->getId(), $data['_token'])) {

      // On récupére le titre de l'image
      $titre = $image->getTitre();
      //  On supprime le fichier
      unlink($this->getParameter('images_directory') . '/' . $titre);

      //  On supprime l'entrée de la base
      $entityManager = $this->getDoctrine()->getManager();
      $entityManager->remove($image);
      $entityManager->flush();

      // On répond
      return new JsonResponse(['success' => 1]);
    } else {
      return new JsonResponse(['error' => 'Token Invalide'], 400);
    }
  }


  //  ----------------------AFFICHAGE DU COMPTE CLIENT -----------------------


  /**
   *@Route("/compte", name="compte")
   */
  public function user()
  {
    // $user = $this->getDoctrine()->getRepository(User::class)->find();
    return $this->render('info/affichagecompte.html.twig');
  }
}
