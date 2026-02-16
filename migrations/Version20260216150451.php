<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260216150451 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, contenu LONGTEXT NOT NULL, image VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT NULL, is_published TINYINT DEFAULT 0 NOT NULL, vues INT DEFAULT 0 NOT NULL, user_id INT NOT NULL, INDEX idx_article_user_id (user_id), INDEX idx_article_created_at (created_at), INDEX idx_article_is_published (is_published), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE circuit (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(150) NOT NULL, pays VARCHAR(100) NOT NULL, ville VARCHAR(100) DEFAULT NULL, longueur_km NUMERIC(5, 3) NOT NULL, nombre_tours INT NOT NULL, image VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, INDEX idx_circuit_nom (nom), INDEX idx_circuit_pays (pays), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, contenu LONGTEXT NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, is_approved TINYINT DEFAULT 0 NOT NULL, user_id INT NOT NULL, article_id INT NOT NULL, INDEX idx_commentaire_user_id (user_id), INDEX idx_commentaire_article_id (article_id), INDEX idx_commentaire_created_at (created_at), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE course (id INT AUTO_INCREMENT NOT NULL, nom_grand_prix VARCHAR(200) NOT NULL, date_course DATE NOT NULL, position INT NOT NULL, temps VARCHAR(50) DEFAULT NULL, points INT DEFAULT 0 NOT NULL, circuit_id INT NOT NULL, ecurie_id INT NOT NULL, pilote_id INT NOT NULL, INDEX idx_course_circuit_id (circuit_id), INDEX idx_course_ecurie_id (ecurie_id), INDEX idx_course_pilote_id (pilote_id), INDEX idx_course_date_course (date_course), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE ecurie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, pays VARCHAR(100) NOT NULL, annee_creation INT DEFAULT NULL, couleur_principale VARCHAR(50) DEFAULT NULL, logo VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_B51A9B7E6C6E55B5 (nom), INDEX idx_ecurie_nom (nom), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE pilote (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) NOT NULL, nationalite VARCHAR(100) NOT NULL, date_naissance DATE DEFAULT NULL, numero INT DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, biographie LONGTEXT DEFAULT NULL, ecurie_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_6A3254DDF55AE19E (numero), INDEX idx_pilote_ecurie_id (ecurie_id), INDEX idx_pilote_nom (nom), INDEX idx_pilote_numero (numero), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, question LONGTEXT NOT NULL, type VARCHAR(50) DEFAULT \'choix_multiple\' NOT NULL, points INT DEFAULT 1 NOT NULL, ordre INT NOT NULL, quiz_id INT NOT NULL, INDEX idx_question_quiz_id (quiz_id), INDEX idx_question_ordre (ordre), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE quiz (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(200) NOT NULL, description LONGTEXT DEFAULT NULL, difficulte VARCHAR(50) DEFAULT \'moyen\' NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, is_active TINYINT DEFAULT 1 NOT NULL, INDEX idx_quiz_is_active (is_active), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE quiz_resultat (id INT AUTO_INCREMENT NOT NULL, score INT NOT NULL, total_questions INT NOT NULL, completed_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, temps_secondes INT DEFAULT NULL, user_id INT NOT NULL, quiz_id INT NOT NULL, INDEX idx_quiz_resultat_user_id (user_id), INDEX idx_quiz_resultat_quiz_id (quiz_id), INDEX idx_quiz_resultat_completed_at (completed_at), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE reponse (id INT AUTO_INCREMENT NOT NULL, reponse LONGTEXT NOT NULL, is_correct TINYINT DEFAULT 0 NOT NULL, question_id INT NOT NULL, INDEX idx_reponse_question_id (question_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, username VARCHAR(100) NOT NULL, roles JSON NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, is_verified TINYINT DEFAULT 0 NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX idx_user_email (email), INDEX idx_user_username (username), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE user_reponse (id INT AUTO_INCREMENT NOT NULL, answered_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, user_id INT NOT NULL, question_id INT NOT NULL, reponse_id INT NOT NULL, INDEX IDX_7BBC0CDCF18BB82 (reponse_id), INDEX idx_user_reponse_user_id (user_id), INDEX idx_user_reponse_question_id (question_id), INDEX idx_user_reponse_answered_at (answered_at), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB9CF2182C8 FOREIGN KEY (circuit_id) REFERENCES circuit (id) ON DELETE RESTRICT');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB957F92A74 FOREIGN KEY (ecurie_id) REFERENCES ecurie (id) ON DELETE RESTRICT');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB9F510AAE9 FOREIGN KEY (pilote_id) REFERENCES pilote (id) ON DELETE RESTRICT');
        $this->addSql('ALTER TABLE pilote ADD CONSTRAINT FK_6A3254DD57F92A74 FOREIGN KEY (ecurie_id) REFERENCES ecurie (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E853CD175 FOREIGN KEY (quiz_id) REFERENCES quiz (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE quiz_resultat ADD CONSTRAINT FK_311FA4A7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE quiz_resultat ADD CONSTRAINT FK_311FA4A7853CD175 FOREIGN KEY (quiz_id) REFERENCES quiz (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC71E27F6BF FOREIGN KEY (question_id) REFERENCES question (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_reponse ADD CONSTRAINT FK_7BBC0CDA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_reponse ADD CONSTRAINT FK_7BBC0CD1E27F6BF FOREIGN KEY (question_id) REFERENCES question (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_reponse ADD CONSTRAINT FK_7BBC0CDCF18BB82 FOREIGN KEY (reponse_id) REFERENCES reponse (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66A76ED395');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCA76ED395');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC7294869C');
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB9CF2182C8');
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB957F92A74');
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB9F510AAE9');
        $this->addSql('ALTER TABLE pilote DROP FOREIGN KEY FK_6A3254DD57F92A74');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494E853CD175');
        $this->addSql('ALTER TABLE quiz_resultat DROP FOREIGN KEY FK_311FA4A7A76ED395');
        $this->addSql('ALTER TABLE quiz_resultat DROP FOREIGN KEY FK_311FA4A7853CD175');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC71E27F6BF');
        $this->addSql('ALTER TABLE user_reponse DROP FOREIGN KEY FK_7BBC0CDA76ED395');
        $this->addSql('ALTER TABLE user_reponse DROP FOREIGN KEY FK_7BBC0CD1E27F6BF');
        $this->addSql('ALTER TABLE user_reponse DROP FOREIGN KEY FK_7BBC0CDCF18BB82');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE circuit');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE ecurie');
        $this->addSql('DROP TABLE pilote');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE quiz');
        $this->addSql('DROP TABLE quiz_resultat');
        $this->addSql('DROP TABLE reponse');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_reponse');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
