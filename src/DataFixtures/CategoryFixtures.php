<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    const CATEGORY = [
        "Evénements",
        "Service",
        "Jeux"
    ];

    public function load(ObjectManager $manager)
    {
        $i = 0;
        foreach (self::CATEGORY as $name) {
            $category = new Category();
            $category->setName($name);
            $manager->persist($category);
            $this->addReference('category_' . $i, $category);
            $i++;
        }
        $manager->flush();
    }
    }
