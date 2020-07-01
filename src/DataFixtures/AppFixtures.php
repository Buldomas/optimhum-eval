<?php

namespace App\DataFixtures;

use App\Entity\Utilisateurs;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {
        // Création de l'utilisateur principal
        $Utilisateur = new Utilisateurs;
        $hash = $this->encoder->encodePassword($Utilisateur, "password");

        $Utilisateur->setNom("Soubigou")
            ->setPrenom("Laurent")
            ->setFonction(0)
            ->setHash($hash)
            ->setEmail("laurent.soubigou@gmail.com")
            ->setGenre(true)
            ->setPicture("Images/LaurentSoubigouGrand.jpg");
        $manager->persist($Utilisateur);


        $manager->flush();
        // utiliser "php bin/console doctrine:fixtures:load" pour charger la base
        // ATTENTION, cela vide toutes les tables avant de les charger.
    }
}
