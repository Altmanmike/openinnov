<?php

namespace App\DataFixtures;

use App\Entity\AccountConnections;
use Faker\Factory;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $passwordEncoder, private UserRepository $repo) {}    

    public function load(ObjectManager $manager): void
    {
        // Génération de l'admin du site de l'application GeoPV
        $admin = new User();
        $admin->setEmail('admin@admin.fr');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setFirstname('Moi');
        $admin->setLastname('MOI');
        $admin->setPhone('+33644779988');
        $admin->setCompany('EPSI');
        $admin->setZipcode('69000');
        $admin->setCity('LYON');
        $admin->setPassword(
            $this->passwordEncoder->hashPassword($admin, 'admin') // l'admin devra changer le mdp      
        );      
        $admin->setCreatedAt(new \DateTimeImmutable());
        $admin->setLastLoginAt(new \DateTimeImmutable());

        $manager->persist($admin);

        // Génération d'une DataFixtures de fausses données d'utilisateurs via FakerPHP
        $faker = Factory::create('fr_FR');

        for($i=0; $i < 9; $i++)
        {
            $user = new User();
            $user->setEmail($faker->email());
            $user->setRoles(['ROLE_USER']);
            $user->setFirstname($faker->firstname());
            $user->setLastname($faker->lastname()); 
            $user->setPhone($faker->e164PhoneNumber()); 
            $user->setCompany($faker->company()); 
            $user->setZipcode(str_replace(' ', '', $faker->postcode()));
            $user->setCity($faker->city());
            $user->setPassword(
                $this->passwordEncoder->hashPassword($user, $faker->password())    
            );
            $user->setCreatedAt(new \DateTimeImmutable());
            $user->setLastLoginAt(new \DateTimeImmutable());

            $manager->persist($user);        
        }

        $manager->flush();     
    }
}
