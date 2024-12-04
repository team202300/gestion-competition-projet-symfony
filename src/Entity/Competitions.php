<?php

namespace App\Entity;

use App\Repository\CompetitionsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\TypeCompetitions; // Corrected import for TypeCompetitions

#[ORM\Entity(repositoryClass: CompetitionsRepository::class)]
class Competitions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateC = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;
    #[ORM\ManyToOne(targetEntity: TypeCompetitions::class)]
    #[ORM\JoinColumn(name: "type_competition_id", referencedColumnName: "id")]
    private ?TypeCompetitions $typeCompetition = null;
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getDateC(): ?\DateTimeInterface
    {
        return $this->dateC;
    }

    public function setDateC(\DateTimeInterface $dateC): static
    {
        $this->dateC = $dateC;
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

    public function getTypeCompetition(): ?TypeCompetitions
    {
        return $this->typeCompetition;
    }

    public function setTypeCompetition(?TypeCompetitions $typeCompetition): static
    {
        $this->typeCompetition = $typeCompetition;
        return $this;
    }
}
