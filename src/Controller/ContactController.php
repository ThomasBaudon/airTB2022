<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request): Response
    {
        // dd($form->createView());
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        // dump($request->attributes->all());

        if($form->isSubmitted() && $form->isValid() )
        {
            dd($form->getData());
        }
        
        

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'formulaire' =>$form->createView(),
            
        ]);
    }
}
