<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260216181316 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE circuits (id INT AUTO_INCREMENT NOT NULL, round INT NOT NULL, nom_gp VARCHAR(100) NOT NULL, nom_circuit VARCHAR(100) NOT NULL, ville VARCHAR(100) DEFAULT NULL, pays VARCHAR(100) DEFAULT NULL, code_pays VARCHAR(2) DEFAULT NULL, date_debut DATE DEFAULT NULL, date_fin DATE DEFAULT NULL, longueur_km NUMERIC(5, 3) DEFAULT NULL, nombre_tours INT DEFAULT NULL, distance_totale_km NUMERIC(6, 3) DEFAULT NULL, type_circuit VARCHAR(50) DEFAULT NULL, sprint_weekend TINYINT NOT NULL, premiere_apparition INT DEFAULT NULL, nombre_virages INT DEFAULT NULL, sens_circuit VARCHAR(50) DEFAULT NULL, latitude NUMERIC(10, 7) DEFAULT NULL, longitude NUMERIC(10, 7) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX idx_round (round), INDEX idx_pays (pays), INDEX idx_date_debut (date_debut), INDEX idx_sprint (sprint_weekend), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('DROP TABLE circuit');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB9CF2182C8 FOREIGN KEY (circuit_id) REFERENCES circuits (id) ON DELETE RESTRICT');
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
        $this->addSql('CREATE TABLE circuit (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(150) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, pays VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, ville VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, longueur_km NUMERIC(5, 3) NOT NULL, nombre_tours INT NOT NULL, image VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, description LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, INDEX idx_circuit_nom (nom), INDEX idx_circuit_pays (pays), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('DROP TABLE circuits');
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
    }
}
