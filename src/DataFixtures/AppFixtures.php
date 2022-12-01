<?php

namespace App\DataFixtures;

use App\Entity\Company;
use App\Entity\Ville;
use Faker\Factory;
use App\Entity\Aeroport;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        
        // VILLES AEROPORTS
        for($i=1; $i<6; $i++){

            $aeroport = new Aeroport();
            $aeroport
                ->setNom("Aéroport $i")
                ->setNbPistes($i);
            $manager->persist($aeroport);

            $ville = new Ville();
            $ville
                ->setNom($faker->city())
                ->setDepartement($faker->departmentName())
                ->setPopulation($faker->randomNumber(6))
                ->addAeroport($aeroport);
            
            if($i % 2 == 0){
                $aeroport = new Aeroport();
                $aeroport
                    ->setNom("Aéroport $i bis")
                    ->setNbPistes($i);
                $manager->persist($aeroport);
                $ville->addAeroport($aeroport);
            }

            $manager->persist($ville);

        }

        // COMPAGNIES
        for($i=1; $i<6; $i++){
            $company = new Company();
            $company
                ->setNom("Compagnie $i")
                ->setSigle("COMP $i")
                ->setEmployes(mt_rand(50, 1000));
                $manager->persist($company);
        }


        $manager->flush();
    }
}
