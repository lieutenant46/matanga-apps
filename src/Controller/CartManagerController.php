<?php

namespace App\Controller;

use App\Entity\CartItem;
use App\Repository\CartItemRepository;
use App\Repository\ShoeRepository;
use App\Repository\SizeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartManagerController extends AbstractController
{
    /**
     * @Route("/add-to-cart", name="add_to_cart", methods={"POST"})
     */
    public function addToCart(Request $request, ShoeRepository $shoeRepository, SizeRepository $sizeRepository)
    {
        $shoeId = $request->request->get("shoeId");
        $sSize = $request->request->get("size");
        $sQte = $request->request->get("qte");

        $shoe = $shoeRepository->find(array("id"=>$shoeId));
        $size = $sizeRepository->find(array("id"=>$sSize));

        $cartItem = new CartItem();
        $cartItem->setUser($this->getUser())
            ->setShoe($shoe)
            ->setQuantity($sQte);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($cartItem);
        $entityManager->flush();
        die();
        return null;

    }
    /**
     * @Route("/my-cart", name="cart", methods={"GET","POST"})
     */
    public function addTdoCart(CartItemRepository  $cartItemRepository): Response
    {
        $cartItem = $cartItemRepository->distinctItem($this->getUser());
        dump($cartItem);
        return $this->render('cart/index.html.twig', [
            'cartItems' => $cartItem,
        ]);
    }
    /**
     * @Route("/checkout", name="checkout", methods={"GET","POST"})
     */
    public function checkout(){
        return new JsonResponse("ok");
    }
}
