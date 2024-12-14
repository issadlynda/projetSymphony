<?php

namespace App\Entity;

use App\Repository\PersonnelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonnelRepository::class)]
class Personnel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $role = null;

    #[ORM\ManyToOne(targetEntity: Entreprise::class, inversedBy: 'personnels')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Entreprise $Entreprise;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\OneToMany(mappedBy: 'createur', targetEntity: Mission::class)]
    private Collection $missions;

    #[ORM\OneToMany(mappedBy: 'expediteur', targetEntity: Conversation::class)]
    private Collection $conversations;

    #[ORM\OneToMany(mappedBy: 'personnel', targetEntity: Contrat::class)]
    private Collection $contrats;

    #[ORM\OneToMany(mappedBy: 'personnel', targetEntity: Facture::class)]
    private Collection $factures;

    #[ORM\OneToMany(mappedBy: 'personnel', targetEntity: RechercheFreelance::class)]
    private Collection $rechercheFreelances;

    #[ORM\OneToMany(mappedBy: 'gestionnaire', targetEntity: Entreprise::class)]
    private Collection $entreprises;

    #[ORM\ManyToOne(inversedBy: 'personnel')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Entreprise $entreprise = null;

    public function __construct()
    {
        $this->missions = new ArrayCollection();
        $this->conversations = new ArrayCollection();
        $this->contrats = new ArrayCollection();
        $this->factures = new ArrayCollection();
        $this->rechercheFreelances = new ArrayCollection();
        $this->entreprises = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function getEntreprise(): ?Entreprise
    {
        return $this->Entreprise;
    }

    public function setEntreprise(?Entreprise $Entreprise): static
    {
        $this->Entreprise = $Entreprise;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection<int, Mission>
     */
    public function getMissions(): Collection
    {
        return $this->missions;
    }

    public function addMission(Mission $mission): static
    {
        if (!$this->missions->contains($mission)) {
            $this->missions->add($mission);
            $mission->setCreateur($this);
        }

        return $this;
    }

    public function removeMission(Mission $mission): static
    {
        if ($this->missions->removeElement($mission)) {
            // set the owning side to null (unless already changed)
            if ($mission->getCreateur() === $this) {
                $mission->setCreateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Conversation>
     */
    public function getConversations(): Collection
    {
        return $this->conversations;
    }

    public function addConversation(Conversation $conversation): static
    {
        if (!$this->conversations->contains($conversation)) {
            $this->conversations->add($conversation);
            $conversation->setExpediteur($this);
        }

        return $this;
    }

    public function removeConversation(Conversation $conversation): static
    {
        if ($this->conversations->removeElement($conversation)) {
            // set the owning side to null (unless already changed)
            if ($conversation->getExpediteur() === $this) {
                $conversation->setExpediteur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Contrat>
     */
    public function getContrats(): Collection
    {
        return $this->contrats;
    }

    public function addContrat(Contrat $contrat): static
    {
        if (!$this->contrats->contains($contrat)) {
            $this->contrats->add($contrat);
            $contrat->setPersonnel($this);
        }

        return $this;
    }

    public function removeContrat(Contrat $contrat): static
    {
        if ($this->contrats->removeElement($contrat)) {
            // set the owning side to null (unless already changed)
            if ($contrat->getPersonnel() === $this) {
                $contrat->setPersonnel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Facture>
     */
    public function getFactures(): Collection
    {
        return $this->factures;
    }

    public function addFacture(Facture $facture): static
    {
        if (!$this->factures->contains($facture)) {
            $this->factures->add($facture);
            $facture->setPersonnel($this);
        }

        return $this;
    }

    public function removeFacture(Facture $facture): static
    {
        if ($this->factures->removeElement($facture)) {
            // set the owning side to null (unless already changed)
            if ($facture->getPersonnel() === $this) {
                $facture->setPersonnel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, RechercheFreelance>
     */
    public function getRechercheFreelances(): Collection
    {
        return $this->rechercheFreelances;
    }

    public function addRechercheFreelance(RechercheFreelance $rechercheFreelance): static
    {
        if (!$this->rechercheFreelances->contains($rechercheFreelance)) {
            $this->rechercheFreelances->add($rechercheFreelance);
            $rechercheFreelance->setPersonnel($this);
        }

        return $this;
    }

    public function removeRechercheFreelance(RechercheFreelance $rechercheFreelance): static
    {
        if ($this->rechercheFreelances->removeElement($rechercheFreelance)) {
            // set the owning side to null (unless already changed)
            if ($rechercheFreelance->getPersonnel() === $this) {
                $rechercheFreelance->setPersonnel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Entreprise>
     */
    public function getEntreprises(): Collection
    {
        return $this->entreprises;
    }

    public function addEntreprise(Entreprise $entreprise): static
    {
        if (!$this->entreprises->contains($entreprise)) {
            $this->entreprises->add($entreprise);
            $entreprise->setGestionnaire($this);
        }

        return $this;
    }

    public function removeEntreprise(Entreprise $entreprise): static
    {
        if ($this->entreprises->removeElement($entreprise)) {
            // set the owning side to null (unless already changed)
            if ($entreprise->getGestionnaire() === $this) {
                $entreprise->setGestionnaire(null);
            }
        }

        return $this;
    }
}
