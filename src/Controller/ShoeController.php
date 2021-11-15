<?php

namespace App\Controller;

use App\Entity\Shoe;
use App\Form\ShoeType;
use App\Repository\ShoeRepository;
use App\Repository\SizeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShoeController extends AbstractController
{

    /**
     * @Route("shoe/{id}", name="shoe_show", methods={"GET"})
     */
    public function show(Shoe $shoe, SizeRepository $sizeRepository, ShoeRepository $shoeRepository): Response
    {
        $sizes = $sizeRepository->fin();
        $shoes = $shoe->getBrand()->getShoes();

        return $this->render('shoe/show.html.twig', [
            'shoe' => $shoe,
            'sizes'=>$sizes,
            'shoes' =>$shoes
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
     * @Route("shoe/{id}", name="admin_shoe_delete", methods={"POST"})
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
