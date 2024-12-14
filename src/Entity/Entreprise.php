<?php

namespace App\Entity;

use App\Repository\EntrepriseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntrepriseRepository::class)]
class Entreprise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'Entreprise', targetEntity: Personnel::class)]
    private Collection $personnels;

    #[ORM\OneToMany(mappedBy: 'entreprise', targetEntity: Freelance::class)]
    private Collection $freelances;

    #[ORM\ManyToOne(inversedBy: 'entreprises')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Personnel $gestionnaire = null;

    #[ORM\OneToMany(mappedBy: 'entreprise', targetEntity: Personnel::class)]
    private Collection $personnel;

    public function __construct()
    {
        $this->personnelEntreprises = new ArrayCollection();
        $this->freelances = new ArrayCollection();
        $this->personnel = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, PersonnelEntreprise>
     */
    public function getPersonnelEntreprises(): Collection
    {
        return $this->personnelEntreprises;
    }

    public function addPersonnelEntreprise(PersonnelEntreprise $personnelEntreprise): static
    {
        if (!$this->personnelEntreprises->contains($personnelEntreprise)) {
            $this->personnelEntreprises->add($personnelEntreprise);
            $personnelEntreprise->setEntreprise($this);
        }

        return $this;
    }

    public function removePersonnelEntreprise(PersonnelEntreprise $personnelEntreprise): static
    {
        if ($this->personnelEntreprises->removeElement($personnelEntreprise)) {
            // set the owning side to null (unless already changed)
            if ($personnelEntreprise->getEntreprise() === $this) {
                $personnelEntreprise->setEntreprise(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Freelance>
     */
    public function getFreelances(): Collection
    {
        return $this->freelances;
    }

    public function addFreelance(Freelance $freelance): static
    {
        if (!$this->freelances->contains($freelance)) {
            $this->freelances->add($freelance);
            $freelance->setEntreprise($this);
        }

        return $this;
    }

    public function removeFreelance(Freelance $freelance): static
    {
        if ($this->freelances->removeElement($freelance)) {
            // set the owning side to null (unless already changed)
            if ($freelance->getEntreprise() === $this) {
                $freelance->setEntreprise(null);
            }
        }

        return $this;
    }

    public function getGestionnaire(): ?Personnel
    {
        return $this->gestionnaire;
    }

    public function setGestionnaire(?Personnel $gestionnaire): static
    {
        $this->gestionnaire = $gestionnaire;

        return $this;
    }

    /**
     * @return Collection<int, Personnel>
     */
    public function getPersonnel(): Collection
    {
        return $this->personnel;
    }

    public function addPersonnel(Personnel $personnel): static
    {
        if (!$this->personnel->contains($personnel)) {
            $this->personnel->add($personnel);
            $personnel->setEntreprise($this);
        }

        return $this;
    }

    public function removePersonnel(Personnel $personnel): static
    {
        if ($this->personnel->removeElement($personnel)) {
            // set the owning side to null (unless already changed)
            if ($personnel->getEntreprise() === $this) {
                $personnel->setEntreprise(null);
            }
        }

        return $this;
    }
}
