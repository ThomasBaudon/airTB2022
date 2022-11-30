<?php

namespace App\DataFixtures;

use App\Entity\Ville;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();

        $ville = new Ville();

        $ville
            ->setNom('Paris')
            ->setDepartement('75');

        $manager->persist($ville);

        $manager->flush();
    }
}
