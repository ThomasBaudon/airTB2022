<?php

namespace App\Controller;

use App\Entity\Company;
use App\Form\CompanyType;
use App\Repository\CompanyRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CompaniesController extends AbstractController
{
    #[Route('/companies', name: 'app_companies',  methods: ['GET'])]
    public function index(CompanyRepository $companyRepository): Response
    {

        $companies = $companyRepository->findAll();

        return $this->render('companies/index.html.twig', [
            'controller_name' => 'CompaniesController',
            'companies' => $companies,
        ]);
    }

    #[Route('/companies/{id}', name : "show_company", requirements: ['id'=>'\d+'],  methods: ['POST'])]
    // public function show(Request $request, CompanyRepository $repo, int $id) : Response{
    public function show(CompanyRepository $repo, int $id, Company $company) : Response{ // Attention à bien rajouter le USE pour les classes

        // $id = $request->attributes->get('id'); // traité par le param converter
        // $company = $repo->find($id);

        return $this->render('companies/show.html.twig', [
            'company' => $company,
        ]);
    }

    #[Route('companies/create', name : "add_company", methods: ['GET','POST'])]
    public function add(): Response {

        $company = new Company();

        $formulaire = $this->createForm(CompanyType::class, $company);
        
        return $this->render('companies/add.html.twig', [
            'formulaire' => $formulaire->createView(),
        ]);

    }

    #[Route('companies/modify/{id}', name : "modify_company",  methods: ['PATCH'])]
    public function modify(): Response {}

    #[Route('companies/delete/{id}', name : "delete_company",  methods: ['DELETE'])]
    public function delete(): Response {}

}
