<?php

namespace App\Entity;

use App\Repository\DepotAnnonceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DepotAnnonceRepository::class)]
class DepotAnnonce
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titreAnnonce = null;

    #[ORM\Column(length: 255)]
    private ?string $descriptionAnnonce = null;

    #[ORM\Column(length: 255)]
    private ?string $Lieu = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateDebut = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $duree = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $typeFormation = null;

    #[ORM\Column(nullable: true)]
    private ?int $Renumeration = null;

    #[ORM\Column(length: 255)]
    private ?string $specialiteRecherche = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreAnnonce(): ?string
    {
        return $this->titreAnnonce;
    }

    public function setTitreAnnonce(string $titreAnnonce): self
    {
        $this->titreAnnonce = $titreAnnonce;

        return $this;
    }

    public function getDescriptionAnnonce(): ?string
    {
        return $this->descriptionAnnonce;
    }

    public function setDescriptionAnnonce(string $descriptionAnnonce): self
    {
        $this->descriptionAnnonce = $descriptionAnnonce;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->Lieu;
    }

    public function setLieu(string $Lieu): self
    {
        $this->Lieu = $Lieu;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(?\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(?string $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getTypeFormation(): ?string
    {
        return $this->typeFormation;
    }

    public function setTypeFormation(?string $typeFormation): self
    {
        $this->typeFormation = $typeFormation;

        return $this;
    }

    public function getRenumeration(): ?int
    {
        return $this->Renumeration;
    }

    public function setRenumeration(?int $Renumeration): self
    {
        $this->Renumeration = $Renumeration;

        return $this;
    }

    public function getSpecialiteRecherche(): ?string
    {
        return $this->specialiteRecherche;
    }

    public function setSpecialiteRecherche(string $specialiteRecherche): self
    {
        $this->specialiteRecherche = $specialiteRecherche;

        return $this;
    }
}
