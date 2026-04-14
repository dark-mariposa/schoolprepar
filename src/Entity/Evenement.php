<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvenementRepository::class)]
class Evenement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $return = null;

    #[ORM\Column(length: 255)]
    private ?string $relation = null;

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

    public function setRelation(string $relation): static
    {
        $this->relation = $relation;

        return $this;
    }
}
