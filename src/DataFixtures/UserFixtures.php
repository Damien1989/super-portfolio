<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use DateTime;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('contact.damiendiaz@gmail.com');
        $user->setName('Damien');
        $user->setLastname('Diaz');
        $user->setRoles(['ROLE_ADMIN']);
        $hashedPassword = $this->passwordHasher->hashPassword(
            $user,
            'aaaaaa');
        $user->setPassword($hashedPassword);
        $user->setCreatedAt(new DateTime());
        $user->setUpdateAt(new DateTime());
        $manager->persist($user);
        $this->addReference('user', $user);
        $manager->flush();
    }
}
