<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(): Response
    {

        // logique 
        // accès BDD
        // calcul

        $tableau = [
            1 => ['nom'=>'bleu', 'code'=>'#0000ff'],
            2 => ['nom'=>'blanc', 'code'=>'#ffffff'],
            3 => ['nom'=>'rouge', 'code'=>'#ff0000'],
        ];


        return $this->render('test/index.html.twig', [
            'controller_name'   => 'TestController',
            'test'              => 'Une valeur',
            'liste'             => $tableau,
        ]);
    }
}
