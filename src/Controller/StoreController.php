<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\StoreFilterType;
use App\Repository\ShoeRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StoreController extends AbstractController
{

    /**
     * @Route("/store", name="store" , methods={"GET","POST"})
     */
    public function index(Request $request, ShoeRepository $shoeRepository): Response
    {
        $form = $this->createForm(StoreFilterType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $shoes = $shoeRepository->filterShoes($data);
            //dump($shoes);
        }else{
            $shoes = $shoeRepository->findAll();
        }
        return $this->renderForm('store/index.html.twig', [
            'form' => $form,
            'shoes' =>$shoes
        ]);
    }
}
