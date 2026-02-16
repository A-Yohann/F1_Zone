<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'course')]
#[ORM\Index(columns: ['circuit_id'], name: 'idx_course_circuit_id')]
#[ORM\Index(columns: ['ecurie_id'], name: 'idx_course_ecurie_id')]
#[ORM\Index(columns: ['pilote_id'], name: 'idx_course_pilote_id')]
#[ORM\Index(columns: ['date_course'], name: 'idx_course_date_course')]
class Course
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Circuit::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'RESTRICT')]
    private ?Circuit $circuit = null;

    #[ORM\ManyToOne(targetEntity: Ecurie::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'RESTRICT')]
    private ?Ecurie $ecurie = null;

    #[ORM\ManyToOne(targetEntity: Pilote::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'RESTRICT')]
    private ?Pilote $pilote = null;

    #[ORM\Column(type: 'string', length: 200)]
    private string $nomGrandPrix;

    #[ORM\Column(type: 'date')]
    private \DateTimeInterface $dateCourse;

    #[ORM\Column(type: 'integer')]
    private int $position;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private ?string $temps = null;

    #[ORM\Column(type: 'integer', options: ['default' => 0])]
    private int $points = 0;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCircuit(): ?Circuit
    {
        return $this->circuit;
    }

    public function setCircuit(?Circuit $circuit): self
    {
        $this->circuit = $circuit;
        return $this;
    }

    public function getEcurie(): ?Ecurie
    {
        return $this->ecurie;
    }

    public function setEcurie(?Ecurie $ecurie): self
    {
        $this->ecurie = $ecurie;
        return $this;
    }

    public function getPilote(): ?Pilote
    {
        return $this->pilote;
    }

    public function setPilote(?Pilote $pilote): self
    {
        $this->pilote = $pilote;
        return $this;
    }

    public function getNomGrandPrix(): string
    {
        return $this->nomGrandPrix;
    }

    public function setNomGrandPrix(string $nomGrandPrix): self
    {
        $this->nomGrandPrix = $nomGrandPrix;
        return $this;
    }

    public function getDateCourse(): \DateTimeInterface
    {
        return $this->dateCourse;
    }

    public function setDateCourse(\DateTimeInterface $dateCourse): self
    {
        $this->dateCourse = $dateCourse;
        return $this;
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;
        return $this;
    }

    public function getTemps(): ?string
    {
        return $this->temps;
    }

    public function setTemps(?string $temps): self
    {
        $this->temps = $temps;
        return $this;
    }

    public function getPoints(): int
    {
        return $this->points;
    }

    public function setPoints(int $points): self
    {
        $this->points = $points;
        return $this;
    }
}
