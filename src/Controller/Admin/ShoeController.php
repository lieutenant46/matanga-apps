<?php

namespace App\Controller\Admin;

use App\Entity\Shoe;
use App\Form\ShoeType;
use App\Repository\ShoeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/shoe")
 */
class ShoeController extends AbstractController
{
    /**
     * @Route("/", name="admin_shoe_index", methods={"GET"})
     */
    public function index(ShoeRepository $shoeRepository): Response
    {
        return $this->render('admin/shoe/index.html.twig', [
            'shoes' => $shoeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_shoe_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $shoe = new Shoe();
        $form = $this->createForm(ShoeType::class, $shoe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($shoe);
            $entityManager->flush();

            return $this->redirectToRoute('admin_shoe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/shoe/new.html.twig', [
            'shoe' => $shoe,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_shoe_show", methods={"GET"})
     */
    public function show(Shoe $shoe): Response
    {
        return $this->render('admin/shoe/show.html.twig', [
            'shoe' => $shoe,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_shoe_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Shoe $shoe): Response
    {
        $form = $this->createForm(ShoeType::class, $shoe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_shoe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/shoe/edit.html.twig', [
            'shoe' => $shoe,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_shoe_delete", methods={"POST"})
     */
    public function delete(Request $request, Shoe $shoe): Response
    {
        if ($this->isCsrfTokenValid('delete'.$shoe->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($shoe);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_shoe_index', [], Response::HTTP_SEE_OTHER);
    }
}
