<?php

namespace App\Entity;

use App\Repository\EtablissementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: EtablissementRepository::class)]
class Etablissement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(min: 3, max: 255, minMessage: "Le nom doit faire au moins {{ limit }} caractères.")]
    private ?string $return = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(min: 3, max: 255, minMessage: "Le nom doit faire au moins {{ limit }} caractères.")]
    private ?string $relation = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min: 3, max: 255, minMessage: "Le nom doit faire au moins {{ limit }} caractères.")]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min: 3, max: 255, minMessage: "La ville doit faire au moins {{ limit }} caractères.")]
    private ?string $ville = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min: 3, max: 255, minMessage: "Le type doit faire au moins {{ limit }} caractères.")]
    private ?string $type = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    /**
     * @var Collection<int, Filiere>
     */
    #[ORM\ManyToMany(targetEntity: Filiere::class, mappedBy: 'etablissements')]
    private Collection $filieres;

    /**
     * @var Collection<int, Evenement>
     */
    #[ORM\OneToMany(targetEntity: Evenement::class, mappedBy: 'etablissement')]
    private Collection $evenements;

    public function __construct()
    {
        $this->filieres = new ArrayCollection();
        $this->evenements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReturn(): ?string
    {
        return $this->return;
    }

    public function setReturn(?string $return): static
    {
        $this->return = $return;

        return $this;
    }

    public function getRelation(): ?string
    {
        return $this->relation;
    }

    public function setRelation(?string $relation): static
    {
        $this->relation = $relation;

        return $this;
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

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Filiere>
     */
    public function getFilieres(): Collection
    {
        return $this->filieres;
    }

    public function addFiliere(Filiere $filiere): static
    {
        if (!$this->filieres->contains($filiere)) {
            $this->filieres->add($filiere);
            $filiere->addEtablissement($this);
        }

        return $this;
    }

    public function removeFiliere(Filiere $filiere): static
    {
        if ($this->filieres->removeElement($filiere)) {
            $filiere->removeEtablissement($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Evenement>
     */
    public function getEvenements(): Collection
    {
        return $this->evenements;
    }

    public function addEvenement(Evenement $evenement): static
    {
        if (!$this->evenements->contains($evenement)) {
            $this->evenements->add($evenement);
            $evenement->setEtablissement($this);
        }

        return $this;
    }

    public function removeEvenement(Evenement $evenement): static
    {
        if ($this->evenements->removeElement($evenement)) {
            // set the owning side to null (unless already changed)
            if ($evenement->getEtablissement() === $this) {
                $evenement->setEtablissement(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->nom; // Permet à Symfony d'afficher le nom de l'école dans les listes déroulantes
    }

}
