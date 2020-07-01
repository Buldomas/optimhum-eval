<?php

namespace App\Entity;

use App\Repository\FormationsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FormationsRepository::class)
 */
class Formations
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nom;

    /**
     * @ORM\ManyToOne(targetEntity=Themes::class, inversedBy="formations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Sujet;

    /**
     * @ORM\ManyToMany(targetEntity=Modules::class, inversedBy="formations")
     */
    private $Modules;

    public function __construct()
    {
        $this->Modules = new ArrayCollection();
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

    public function getSujet(): ?Themes
    {
        return $this->Sujet;
    }

    public function setSujet(?Themes $Sujet): self
    {
        $this->Sujet = $Sujet;

        return $this;
    }

    /**
     * @return Collection|Modules[]
     */
    public function getModules(): Collection
    {
        return $this->Modules;
    }

    public function addModule(Modules $module): self
    {
        if (!$this->Modules->contains($module)) {
            $this->Modules[] = $module;
        }

        return $this;
    }

    public function removeModule(Modules $module): self
    {
        if ($this->Modules->contains($module)) {
            $this->Modules->removeElement($module);
        }

        return $this;
    }
}
