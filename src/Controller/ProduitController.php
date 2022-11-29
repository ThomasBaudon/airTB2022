<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController
{
    #[Route('/produit/{id?0}', requirements: ['id' => '\d{1,3}'], name: 'produit')]
    public function affiche(Request $request): Response
    {
        return new Response('ID Produit : ' . $request->attributes->get('id'));
    }

    #[Route('/produit/{slug}', requirements: ['slug' => '[a-z]*'], name: 'produit-by-slug')]
    public function afficheBySlug(Request $request): Response
    {
        return new Response('Slug Produit : ' . $request->attributes->get('slug'));
    }
}
