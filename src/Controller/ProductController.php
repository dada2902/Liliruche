<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use App\Form\ProductType;
use App\Entity\Images;
use Symfony\Component\HttpFoundation\Request;


class ProductController extends AbstractController
{
    // ---------------------------  PRODUCT  -----------------------------------------
    /**
     * @Route("/info/affichage-product", name="affichage-product")
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
}
