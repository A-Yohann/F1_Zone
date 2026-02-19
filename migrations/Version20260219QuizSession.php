<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260219QuizSession extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Ajout du champ quizSession à user_reponse';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE user_reponse ADD quiz_session VARCHAR(36) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE user_reponse DROP quiz_session');
    }
}
