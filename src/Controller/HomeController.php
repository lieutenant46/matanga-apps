<?php

namespace App\Controller;

use App\Repository\BannerRepository;
use App\Repository\CityRepository;
use App\Repository\ShoeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(BannerRepository  $bannerRepository,CityRepository $cityRepository, ShoeRepository $shoeRepository): Response
    {
        $banners = $bannerRepository->findBy(array("isActive" =>true));
        $cities = $cityRepository->findAll();
        $newShoes = $shoeRepository->findBy(array("isActive" =>true), array('createdAt' => 'DESC'), 4);
        $topShop = $shoeRepository->findOneBy(array("isActive" =>true,"isTop" =>true));
        return $this->render('home/index.html.twig', [
            'banners' => $banners,
            'cities' =>$cities,
            'shoes' => $newShoes,
            'topShoe' => $topShop
        ]);
    }
}
