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
            $this->addFlash("message_success", "Le message a été envoyé avec succès");

            return $this->redirectToRoute('index');
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

        $this->addFlash("message_delete_success", "Votre message a été supprimer avec succès");
        return $this->redirectToRoute('affichage-contact');
    }


    /**
     * @Route("/info/mail-contact", name="mail-contact")
     */
    public function mail(Request $request, \Swift_Mailer $mailer)
    {

        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $contact = $form->getData();

            // envoi de l'email
            $message = (new \Swift_Message('Nouveau contact'))

                ->setFrom($contact['email'])

                ->setTo('rucheelilii@gmail.com')
                ->setBody(
                    $this->renderView(
                        'email/addcontact.html.twig',
                        compact('contact')
                    ),
                    'text/html'
                );

            $mailer->send($message);

            $this->addFlash('message', 'Le message a bien été envoyé');
            return $this->redirectToRoute('index');
        }

        return $this->render('/home.html.twig', [
            "form" => $form->createView(),

        ]);
    }
}
