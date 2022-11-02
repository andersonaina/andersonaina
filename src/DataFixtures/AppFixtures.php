<?php

namespace App\DataFixtures;

use App\Entity\Acteur;
use App\Entity\Pays;
use App\Entity\Region;
use App\Entity\TypeActeur;
use App\Repository\PaysRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker= Factory::create('fr_FR');

        for ($p=0;$p<54;$p++){
            $pays= new Pays();
                $pays->setNomPays($faker->country);

            $manager->persist($pays);

            for ($r=0;$r<25;$r++){
                $region= new Region();
                $region->setPays($pays)
                    ->setNomRegion($faker->country)
                    ->setLongitudeRegion($faker->longitude)
                    ->setLatitudeRegion($faker->latitude);
                $manager->persist($region);
            }
        }


        $manager->flush();
    }
}
