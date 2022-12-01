<?php

namespace App\DataFixtures;

use App\Entity\Ville;
use Faker\Factory;
use App\Entity\Aeroport;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        
        for($i=1; $i<6; $i++){

            $aeroport = new Aeroport();
            $aeroport
                ->setNom("Aéroport $i")
                ->setNbPistes($i);
            $manager->persist($aeroport);

            $ville = new Ville();
            $ville
                ->setNom("Ville $i")
                ->setDepartement("75")
                ->setPopulation($i * 50000)
                ->addAeroport($aeroport);
            $manager->persist($ville);

        }

        $manager->flush();
    }
}
