<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class SprintClassement
{
    // Setters
    public function setSprint(Sprint $sprint): self
    {
        $this->sprint = $sprint;
        return $this;
    }

    public function setPilote(string $pilote): self
    {
        $this->pilote = $pilote;
        return $this;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;
        return $this;
    }

    public function setTemps(string $temps): self
    {
        $this->temps = $temps;
        return $this;
    }

    public function setPoints(int $points): self
    {
        $this->points = $points;
        return $this;
    }
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Sprint::class)]
    #[ORM\JoinColumn(nullable: false)]
    private Sprint $sprint;

    #[ORM\Column(type: 'string', length: 100)]
    private string $pilote;

    #[ORM\Column(type: 'integer')]
    private int $position;

    #[ORM\Column(type: 'string', length: 20)]
    private string $temps;

    #[ORM\Column(type: 'integer')]
    private int $points;

    // getters/setters ...
}
