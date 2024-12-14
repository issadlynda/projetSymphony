<?php

namespace App\Entity;

use App\Repository\RechercheFreelanceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RechercheFreelanceRepository::class)]
class RechercheFreelance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $criteres = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateRecherche = null;

    #[ORM\ManyToOne(inversedBy: 'rechercheFreelances')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Personnel $personnel = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCriteres(): ?string
    {
        return $this->criteres;
    }

    public function setCriteres(string $criteres): static
    {
        $this->criteres = $criteres;

        return $this;
    }

    public function getDateRecherche(): ?\DateTimeInterface
    {
        return $this->dateRecherche;
    }

    public function setDateRecherche(\DateTimeInterface $dateRecherche): static
    {
        $this->dateRecherche = $dateRecherche;

        return $this;
    }

    public function getPersonnel(): ?Personnel
    {
        return $this->personnel;
    }

    public function setPersonnel(?Personnel $personnel): static
    {
        $this->personnel = $personnel;

        return $this;
    }
}
