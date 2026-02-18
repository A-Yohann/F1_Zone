<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'pilote_stat')]
class PiloteStat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\OneToOne(targetEntity: 'App\\Entity\\Pilote')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?Pilote $pilote = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $pointsTotal = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $victoires = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $podiums = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPilote(): ?Pilote
    {
        return $this->pilote;
    }

    public function setPilote(Pilote $pilote): static
    {
        $this->pilote = $pilote;
        return $this;
    }

    public function getPointsTotal(): ?float
    {
        return $this->pointsTotal;
    }

    public function setPointsTotal(?float $pointsTotal): static
    {
        $this->pointsTotal = $pointsTotal;
        return $this;
    }

    public function getVictoires(): ?int
    {
        return $this->victoires;
    }

    public function setVictoires(?int $victoires): static
    {
        $this->victoires = $victoires;
        return $this;
    }

    public function getPodiums(): ?int
    {
        return $this->podiums;
    }

    public function setPodiums(?int $podiums): static
    {
        $this->podiums = $podiums;
        return $this;
    }
}
