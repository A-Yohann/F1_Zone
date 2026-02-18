<?php


namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Ecurie;

#[ORM\Entity(repositoryClass: 'App\\Repository\\PiloteRepository')]
#[ORM\Table(name: 'pilote')]
#[ORM\Index(columns: ['ecurie_id'], name: 'idx_pilote_ecurie_id')]
#[ORM\Index(columns: ['nom'], name: 'idx_pilote_nom')]
#[ORM\Index(columns: ['numero'], name: 'idx_pilote_numero')]
class Pilote
{
    #[ORM\OneToOne(mappedBy: 'pilote', targetEntity: PiloteStat::class, cascade: ['persist', 'remove'])]
    private ?PiloteStat $piloteStat = null;

    public function getPiloteStat(): ?PiloteStat
    {
        return $this->piloteStat;
    }

    public function setPiloteStat(?PiloteStat $piloteStat): static
    {
        $this->piloteStat = $piloteStat;
        return $this;
    }
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Ecurie::class)]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    private ?Ecurie $ecurie = null;

    #[ORM\Column(type: 'string', length: 100)]
    private string $nom;

    #[ORM\Column(type: 'string', length: 100)]
    private string $prenom;

    #[ORM\Column(type: 'string', length: 100)]
    private string $nationalite;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $dateNaissance = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $numero = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $photo = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $biographie = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getNationalite(): string
    {
        return $this->nationalite;
    }

    public function setNationalite(string $nationalite): self
    {
        $this->nationalite = $nationalite;
        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;
        return $this;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(?int $numero): self
    {
        $this->numero = $numero;
        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;
        return $this;
    }

    public function getBiographie(): ?string
    {
        return $this->biographie;
    }

    public function setBiographie(?string $biographie): self
    {
        $this->biographie = $biographie;
        return $this;
    }
}
