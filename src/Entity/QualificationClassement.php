<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class QualificationClassement
{
    // Setters
    public function setQualification(Qualification $qualification): self
    {
        $this->qualification = $qualification;
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
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Qualification::class)]
    #[ORM\JoinColumn(nullable: false)]
    private Qualification $qualification;

    #[ORM\Column(type: 'string', length: 100)]
    private string $pilote;

    #[ORM\Column(type: 'integer')]
    private int $position;

    #[ORM\Column(type: 'string', length: 20)]
    private string $temps;

    // getters/setters ...
}
