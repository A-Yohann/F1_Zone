<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'ecurie')]
#[ORM\Index(columns: ['nom'], name: 'idx_ecurie_nom')]
class Ecurie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 100, unique: true)]
    private string $nom;

    #[ORM\Column(type: 'string', length: 100)]
    private string $pays;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $anneeCreation = null;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private ?string $couleurPrincipale = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $logo = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getPays(): string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;
        return $this;
    }

    public function getAnneeCreation(): ?int
    {
        return $this->anneeCreation;
    }

    public function setAnneeCreation(?int $anneeCreation): self
    {
        $this->anneeCreation = $anneeCreation;
        return $this;
    }

    public function getCouleurPrincipale(): ?string
    {
        return $this->couleurPrincipale;
    }

    public function setCouleurPrincipale(?string $couleurPrincipale): self
    {
        $this->couleurPrincipale = $couleurPrincipale;
        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }
}
