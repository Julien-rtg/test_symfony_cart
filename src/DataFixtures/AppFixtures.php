<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i <= 15; $i++){

            $product = new Product();
            $product->settitle("Product$i");
            $product->setimage("https://via.placeholder.com/300");
            $product->setprice($i*rand(2, 10));
            $manager->persist($product);
    
            $manager->flush();
        }
    }
}
