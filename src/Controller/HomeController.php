<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController
{
    #[Route('/', name: 'home')]
    public function accueil(): Response
    {
        dump(__METHOD__);
        return new Response('OK');
    }
}
