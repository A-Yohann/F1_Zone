<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'quiz_resultat')]
#[ORM\Index(columns: ['user_id'], name: 'idx_quiz_resultat_user_id')]
#[ORM\Index(columns: ['quiz_id'], name: 'idx_quiz_resultat_quiz_id')]
#[ORM\Index(columns: ['completed_at'], name: 'idx_quiz_resultat_completed_at')]
class QuizResultat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'quizResultats')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?User $user = null;

    #[ORM\ManyToOne(targetEntity: Quiz::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?Quiz $quiz = null;

    #[ORM\Column(type: 'integer')]
    private int $score;

    #[ORM\Column(type: 'integer')]
    private int $totalQuestions;

    #[ORM\Column(type: 'datetime_immutable', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private \DateTimeImmutable $completedAt;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $tempsSecondes = null;

    public function __construct()
    {
        $this->completedAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function getQuiz(): ?Quiz
    {
        return $this->quiz;
    }

    public function setQuiz(?Quiz $quiz): self
    {
        $this->quiz = $quiz;
        return $this;
    }

    public function getScore(): int
    {
        return $this->score;
    }

    public function setScore(int $score): self
    {
        $this->score = $score;
        return $this;
    }

    public function getTotalQuestions(): int
    {
        return $this->totalQuestions;
    }

    public function setTotalQuestions(int $totalQuestions): self
    {
        $this->totalQuestions = $totalQuestions;
        return $this;
    }

    public function getCompletedAt(): \DateTimeImmutable
    {
        return $this->completedAt;
    }

    public function setCompletedAt(\DateTimeImmutable $completedAt): self
    {
        $this->completedAt = $completedAt;
        return $this;
    }

    public function getTempsSecondes(): ?int
    {
        return $this->tempsSecondes;
    }

    public function setTempsSecondes(?int $tempsSecondes): self
    {
        $this->tempsSecondes = $tempsSecondes;
        return $this;
    }
}
