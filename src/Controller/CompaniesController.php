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

    #[Route('/companies/{id}', name : "show_company", requirements: ['id'=>'\d+'],  methods: ['GET'])]
    // public function show(Request $request, CompanyRepository $repo, int $id) : Response{
    public function show(CompanyRepository $repo, int $id, Company $company) : Response{ // Attention à bien rajouter le USE pour les classes

        // $id = $request->attributes->get('id'); // traité par le param converter
        // $company = $repo->find($id);

        return $this->render('companies/show.html.twig', [
            'company' => $company,
        ]);
    }

    #[Route('companies/create', name : "add_company", methods: ['GET','POST'])]
    public function add(Request $request, CompanyRepository $repo): Response {

        $company = new Company();

        $formulaire = $this->createForm(CompanyType::class, $company);
        $formulaire->handleRequest($request);

        if( $formulaire->isSubmitted() && $formulaire->isValid()){

            $repo->save($company, true);
            return $this->redirectToRoute('app_companies');
            // dd($company);
            // dd($formulaire->getData());
            // $company = new Company();
            // $data = $formulaire->getData();
            // $company->setEmployes($data['employes']);
            // $company->setEmployes($data['nom']);
            // persist
            // flush
        }
        
        return $this->render('companies/add.html.twig', [
            'formulaire' => $formulaire->createView(),
        ]);

    }

    #[Route('companies/modify/{id}', name : "modify_company",  methods: ['GET','POST'])]
    public function modify(Company $company, Request $request, CompanyRepository $repo)
    {
        // dd($company);
        $formulaire = $this->createForm(CompanyType::class, $company);
        $formulaire->handleRequest($request);

        if($formulaire->isSubmitted() && $formulaire->isValid())
        {
            $repo->save($company, true);
            return $this->redirectToRoute('app_companies');
        }

        return $this->render('companies/add.html.twig', [
            'formulaire' => $formulaire->createView(),
        ]);
    }

    #[Route('companies/delete/{id}', name : "delete_company",  methods: ['DELETE'])]
    public function delete(): Response {}

}
