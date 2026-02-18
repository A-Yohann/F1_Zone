<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Sprint
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 100)]
    private string $circuit;

    #[ORM\Column(type: 'string', length: 100)]
    private string $grandPrix;

    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $dateHeure;

    public function getDateHeure(): \DateTimeInterface
    {
        return $this->dateHeure;
    }

    public function setCircuit(string $circuit): self
    {
        $this->circuit = $circuit;
        return $this;
    }

    public function setGrandPrix(string $grandPrix): self
    {
        $this->grandPrix = $grandPrix;
        return $this;
    }

    public function setDateHeure(\DateTimeInterface $dateHeure): self
    {
        $this->dateHeure = $dateHeure;
        return $this;
    }
}
