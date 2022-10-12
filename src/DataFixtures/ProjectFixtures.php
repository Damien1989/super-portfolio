<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use DateTime;

class ProjectFixtures extends Fixture implements DependentFixtureInterface
{
    public const PROJECTS = [
        'Wilder Event' => [
            'description' => "Création d'un site avec l'architecture MVC.",
            'category' => 'category_0',
            'link' => 'https://event.gregoire.tech',
            'GitHub' => 'git@github.com:WildCodeSchool/bordeaux-p2-202109-damieux.git'
        ],
        'Fullbus' => [
            'description' => "Création d'un site avec Symfony.",
            'category' => 'category_1',
            'link' => 'https://fullbus.harari.ovh/',
            'GitHub' => 'https://github.com/WildCodeSchool/bordeaux-202109-php-project3-fullbus'
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        $i = 0;
        foreach (self::PROJECTS as $name => $data) {
            $project = new Project();
            $project->setName($name);
            $project->setDescription($data['description']);
            $project->setCategory($this->getReference($data['category']));
            $project->setLink($data['link']);
            $project->setGitHub($data['GitHub']);
            $project->setCreatedAt(new DateTime());
            $project->setUpdateAt(new DateTime());
            $manager->persist($project);
            $this->addReference('project_' . $i, $project);
            $i++;
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}

