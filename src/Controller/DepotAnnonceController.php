<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DepotAnnonceController extends AbstractController
{
    #[Route('/depot/annonce', name: 'app_depot_annonce')]
    public function index(): Response
    {
        return $this->render('depot_annonce/index.html.twig', [
            'controller_name' => 'DepotAnnonceController',
        ]);
    }
}
