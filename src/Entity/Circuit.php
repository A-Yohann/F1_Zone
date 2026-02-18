<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'circuits')]
#[ORM\HasLifecycleCallbacks]
#[ORM\Index(name: 'idx_round', columns: ['round'])]
#[ORM\Index(name: 'idx_pays', columns: ['pays'])]
#[ORM\Index(name: 'idx_date_debut', columns: ['date_debut'])]
#[ORM\Index(name: 'idx_sprint', columns: ['sprint_weekend'])]
class Circuit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private int $round;

    #[ORM\Column(length: 100)]
    private string $nomGp;

    #[ORM\Column(length: 100)]
    private string $nomCircuit;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $imageSvg = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $imageAvif = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $ville = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $pays = null;

    #[ORM\Column(length: 2, nullable: true)]
    private ?string $codePays = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateDebut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateFin = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 3, nullable: true)]
    private ?string $longueurKm = null;

    #[ORM\Column(nullable: true)]
    private ?int $nombreTours = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 3, nullable: true)]
    private ?string $distanceTotaleKm = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $typeCircuit = null;

    #[ORM\Column]
    private bool $sprintWeekend = false;

    #[ORM\Column(nullable: true)]
    private ?int $premiereApparition = null;

    #[ORM\Column(nullable: true)]
    private ?int $nombreVirages = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $sensCircuit = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 7, nullable: true)]
    private ?string $latitude = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 7, nullable: true)]
    private ?string $longitude = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private \DateTimeInterface $createdAt;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private \DateTimeInterface $updatedAt;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    #[ORM\PreUpdate]
    public function setUpdatedAtValue(): void
    {
        $this->updatedAt = new \DateTime();
    }

    public function getId(): ?int { return $this->id; }

    public function getRound(): int { return $this->round; }
    public function setRound(int $round): static { $this->round = $round; return $this; }

    public function getNomGp(): string { return $this->nomGp; }
    public function setNomGp(string $nomGp): static { $this->nomGp = $nomGp; return $this; }


    public function getNomCircuit(): string { return $this->nomCircuit; }
    public function setNomCircuit(string $nomCircuit): static { $this->nomCircuit = $nomCircuit; return $this; }

    public function getImageSvg(): ?string { return $this->imageSvg; }
    public function setImageSvg(?string $imageSvg): static { $this->imageSvg = $imageSvg; return $this; }

    public function getImageAvif(): ?string { return $this->imageAvif; }
    public function setImageAvif(?string $imageAvif): static { $this->imageAvif = $imageAvif; return $this; }

    public function getVille(): ?string { return $this->ville; }
    public function setVille(?string $ville): static { $this->ville = $ville; return $this; }

    public function getPays(): ?string { return $this->pays; }
    public function setPays(?string $pays): static { $this->pays = $pays; return $this; }

    public function getCodePays(): ?string { return $this->codePays; }
    public function setCodePays(?string $codePays): static { $this->codePays = $codePays; return $this; }

    public function getDateDebut(): ?\DateTimeInterface { return $this->dateDebut; }
    public function setDateDebut(?\DateTimeInterface $dateDebut): static { $this->dateDebut = $dateDebut; return $this; }

    public function getDateFin(): ?\DateTimeInterface { return $this->dateFin; }
    public function setDateFin(?\DateTimeInterface $dateFin): static { $this->dateFin = $dateFin; return $this; }

    public function getLongueurKm(): ?string { return $this->longueurKm; }
    public function setLongueurKm(?string $longueurKm): static { $this->longueurKm = $longueurKm; return $this; }

    public function getNombreTours(): ?int { return $this->nombreTours; }
    public function setNombreTours(?int $nombreTours): static { $this->nombreTours = $nombreTours; return $this; }

    public function getDistanceTotaleKm(): ?string { return $this->distanceTotaleKm; }
    public function setDistanceTotaleKm(?string $distanceTotaleKm): static { $this->distanceTotaleKm = $distanceTotaleKm; return $this; }

    public function getTypeCircuit(): ?string { return $this->typeCircuit; }
    public function setTypeCircuit(?string $typeCircuit): static { $this->typeCircuit = $typeCircuit; return $this; }

    public function isSprintWeekend(): bool { return $this->sprintWeekend; }
    public function setSprintWeekend(bool $sprintWeekend): static { $this->sprintWeekend = $sprintWeekend; return $this; }

    public function getPremiereApparition(): ?int { return $this->premiereApparition; }
    public function setPremiereApparition(?int $premiereApparition): static { $this->premiereApparition = $premiereApparition; return $this; }

    public function getNombreVirages(): ?int { return $this->nombreVirages; }
    public function setNombreVirages(?int $nombreVirages): static { $this->nombreVirages = $nombreVirages; return $this; }

    public function getSensCircuit(): ?string { return $this->sensCircuit; }
    public function setSensCircuit(?string $sensCircuit): static { $this->sensCircuit = $sensCircuit; return $this; }

    public function getLatitude(): ?string { return $this->latitude; }
    public function setLatitude(?string $latitude): static { $this->latitude = $latitude; return $this; }

    public function getLongitude(): ?string { return $this->longitude; }
    public function setLongitude(?string $longitude): static { $this->longitude = $longitude; return $this; }

    public function getCreatedAt(): \DateTimeInterface { return $this->createdAt; }
    public function getUpdatedAt(): \DateTimeInterface { return $this->updatedAt; }

    public function __toString(): string
    {
        return sprintf('Round %d - %s', $this->round, $this->nomGp);
    }
}
