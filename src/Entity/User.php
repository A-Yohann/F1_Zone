<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: 'user')]
#[ORM\Index(columns: ['email'], name: 'idx_user_email')]
#[ORM\Index(columns: ['username'], name: 'idx_user_username')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private string $email;

    #[ORM\Column(type: 'string', length: 255)]
    private string $password;

    #[ORM\Column(type: 'string', length: 100)]
    private string $username;

    #[ORM\Column(type: 'json')]
    private array $roles = [];

    #[ORM\Column(type: 'datetime_immutable', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private \DateTimeImmutable $createdAt;

    #[ORM\Column(type: 'boolean', options: ['default' => false])]
    private bool $isVerified = false;

    // Relations
    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Article::class, orphanRemoval: true, cascade: ['persist', 'remove'])]
    private Collection $articles;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Commentaire::class, orphanRemoval: true, cascade: ['persist', 'remove'])]
    private Collection $commentaires;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: UserReponse::class, orphanRemoval: true, cascade: ['persist', 'remove'])]
    private Collection $userReponses;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: QuizResultat::class, orphanRemoval: true, cascade: ['persist', 'remove'])]
    private Collection $quizResultats;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
        $this->userReponses = new ArrayCollection();
        $this->quizResultats = new ArrayCollection();
        $this->createdAt = new \DateTimeImmutable();
        $this->roles = ['ROLE_USER'];
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        if (!in_array('ROLE_USER', $roles)) {
            $roles[] = 'ROLE_USER';
        }
        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;
        return $this;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;
        return $this;
    }

    // UserInterface
    public function getUserIdentifier(): string
    {
        return $this->email;
    }

    public function eraseCredentials(): void {}

    // Relations getters/setters à compléter selon vos besoins
}
