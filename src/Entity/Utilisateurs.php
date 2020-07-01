<?php

namespace App\Entity;

use Cocur\Slugify\Slugify;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UtilisateursRepository;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UtilisateursRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class Utilisateurs implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $Id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="integer")
     * 
     * 0 => Admin
     * 1 => Formateur
     * 2 => Stagiaire
     */
    private $Fonction;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Slug;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Hash;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Email2;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Adresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Picture;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Postal;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Ville;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Telephone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Mobile;

    /**
     * @ORM\Column(type="boolean")
     * 
     * Si true => Homme, si false => Femme
     */
    private $Genre;

    /**
     * Permet d'initialiser le champ Slug
     * @ORM\PrePersist
     * @ORM\PreUpdate
     * 
     * @return void
     */
    public function initializeSlug()
    {
        if (empty($this->Slug)) {
            $slugify = new Slugify();
            $this->Slug = $slugify->slugify($this->Prenom . " " . $this->Nom);
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getFonction(): ?int
    {
        return $this->Fonction;
    }

    public function setFonction(int $Fonction): self
    {
        $this->Fonction = $Fonction;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->Slug;
    }

    public function setSlug(?string $Slug): self
    {
        $this->Slug = $Slug;

        return $this;
    }

    public function getHash(): ?string
    {
        return $this->Hash;
    }

    public function setHash(string $Hash): self
    {
        $this->Hash = $Hash;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getEmail2(): ?string
    {
        return $this->Email2;
    }

    public function setEmail2(?string $Email2): self
    {
        $this->Email2 = $Email2;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(?string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->Picture;
    }

    public function setPicture(?string $Picture): self
    {
        $this->Picture = $Picture;

        return $this;
    }

    public function getPostal(): ?string
    {
        return $this->Postal;
    }

    public function setPostal(?string $Postal): self
    {
        $this->Postal = $Postal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->Ville;
    }

    public function setVille(?string $Ville): self
    {
        $this->Ville = $Ville;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->Telephone;
    }

    public function setTelephone(?string $Telephone): self
    {
        $this->Telephone = $Telephone;

        return $this;
    }

    public function getMobile(): ?string
    {
        return $this->Mobile;
    }

    public function setMobile(?string $Mobile): self
    {
        $this->Mobile = $Mobile;

        return $this;
    }

    public function getGenre(): ?bool
    {
        return $this->Genre;
    }

    public function setGenre(bool $Genre): self
    {
        $this->Genre = $Genre;

        return $this;
    }

    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    public function getPassword()
    {
        return $this->Hash;
    }

    public function getSalt()
    {
    }

    public function getUsername()
    {
        return $this->Email;
    }

    public function eraseCredentials()
    {
    }
}
