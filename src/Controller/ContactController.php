<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;


class ContactController extends AbstractController
{
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
     * @Route("/info/add-contact", name="add-contact")
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
}
