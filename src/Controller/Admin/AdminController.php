<?php

namespace App\Controller\Admin;

use App\Repository\ShoeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin/dashboard", name="admin-home")
     */
    public function index(ShoeRepository $shoeRepository): Response
    {
        return $this->render('Admin/home.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
