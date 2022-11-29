<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VilleController extends AbstractController
{
    #[Route('/villes', name: 'liste_villes')]
    public function index(): Response
    {
        $liste_villes = ['Paris', 'Lyon', 'Marseille'];

        return $this->render('ville/liste.html.twig', [
            'villes' => $liste_villes,
            // 'controller_name' => 'VilleController',
        ]);
    }
}
