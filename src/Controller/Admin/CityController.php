<?php

namespace App\Controller\Admin;

use App\Entity\City;
use App\Form\CityType;
use App\Repository\CityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/city")
 */
class CityController extends AbstractController
{
    /**
     * @Route("/", name="admin_city_index", methods={"GET"})
     */
    public function index(CityRepository $cityRepository): Response
    {
        return $this->render('admin/city/index.html.twig', [
            'cities' => $cityRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_city_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $city = new City();
        $form = $this->createForm(CityType::class, $city);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($city);
            $entityManager->flush();

            return $this->redirectToRoute('admin_city_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/city/new.html.twig', [
            'city' => $city,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_city_show", methods={"GET"})
     */
    public function show(City $city): Response
    {
        return $this->render('admin/city/show.html.twig', [
            'city' => $city,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_city_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, City $city): Response
    {
        $form = $this->createForm(CityType::class, $city);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_city_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/city/edit.html.twig', [
            'city' => $city,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_city_delete", methods={"POST"})
     */
    public function delete(Request $request, City $city): Response
    {
        if ($this->isCsrfTokenValid('delete'.$city->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($city);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_city_index', [], Response::HTTP_SEE_OTHER);
    }
}
