<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 */
class ContactController extends AbstractController
{

    /**
     * @Route("admin/contacts", name="admin_contact_index", methods={"GET"})
     */
    public function show(ContactRepository $repository): Response
    {
        $contacts = $repository->findAll();
        return $this->render('admin/contact/index.html.twig', [
            'contacts' => $contacts,
        ]);
    }

    /**
     * @Route("fdfdf/{id}", name="contact_delete", methods={"POST"})
     */
    public function delete(Request $request, Contact $contact): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contact->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($contact);
            $entityManager->flush();
        }

        return $this->redirectToRoute('contact_index', [], Response::HTTP_SEE_OTHER);
    }
}
