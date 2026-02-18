<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260218194643 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pilote_stat (id INT AUTO_INCREMENT NOT NULL, points_total DOUBLE PRECISION DEFAULT NULL, victoires INT DEFAULT NULL, podiums INT DEFAULT NULL, pilote_id INT NOT NULL, UNIQUE INDEX UNIQ_F06A1EF4F510AAE9 (pilote_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE pilote_stat ADD CONSTRAINT FK_F06A1EF4F510AAE9 FOREIGN KEY (pilote_id) REFERENCES pilote (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC87262ABB FOREIGN KEY (resume_video_id) REFERENCES resume_video (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB9CF2182C8 FOREIGN KEY (circuit_id) REFERENCES circuits (id) ON DELETE RESTRICT');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB957F92A74 FOREIGN KEY (ecurie_id) REFERENCES ecurie (id) ON DELETE RESTRICT');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB9F510AAE9 FOREIGN KEY (pilote_id) REFERENCES pilote (id) ON DELETE RESTRICT');
        $this->addSql('ALTER TABLE ecurie_pilote ADD CONSTRAINT FK_580BCF2357F92A74 FOREIGN KEY (ecurie_id) REFERENCES ecurie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ecurie_pilote ADD CONSTRAINT FK_580BCF23F510AAE9 FOREIGN KEY (pilote_id) REFERENCES pilote (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE essai_libre_classement ADD CONSTRAINT FK_4D1D551C56D08907 FOREIGN KEY (essai_libre_id) REFERENCES essai_libre (id)');
        $this->addSql('ALTER TABLE pilote ADD CONSTRAINT FK_6A3254DD57F92A74 FOREIGN KEY (ecurie_id) REFERENCES ecurie (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE qualification_classement ADD CONSTRAINT FK_8B3353B31A75EE38 FOREIGN KEY (qualification_id) REFERENCES qualification (id)');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E853CD175 FOREIGN KEY (quiz_id) REFERENCES quiz (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE quiz_resultat ADD CONSTRAINT FK_311FA4A7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE quiz_resultat ADD CONSTRAINT FK_311FA4A7853CD175 FOREIGN KEY (quiz_id) REFERENCES quiz (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC71E27F6BF FOREIGN KEY (question_id) REFERENCES question (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sprint_classement ADD CONSTRAINT FK_238D7C9B8C24077B FOREIGN KEY (sprint_id) REFERENCES sprint (id)');
        $this->addSql('ALTER TABLE user_reponse ADD CONSTRAINT FK_7BBC0CDA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_reponse ADD CONSTRAINT FK_7BBC0CD1E27F6BF FOREIGN KEY (question_id) REFERENCES question (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_reponse ADD CONSTRAINT FK_7BBC0CDCF18BB82 FOREIGN KEY (reponse_id) REFERENCES reponse (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pilote_stat DROP FOREIGN KEY FK_F06A1EF4F510AAE9');
        $this->addSql('DROP TABLE pilote_stat');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66A76ED395');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCA76ED395');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC7294869C');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC87262ABB');
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB9CF2182C8');
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB957F92A74');
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB9F510AAE9');
        $this->addSql('ALTER TABLE ecurie_pilote DROP FOREIGN KEY FK_580BCF2357F92A74');
        $this->addSql('ALTER TABLE ecurie_pilote DROP FOREIGN KEY FK_580BCF23F510AAE9');
        $this->addSql('ALTER TABLE essai_libre_classement DROP FOREIGN KEY FK_4D1D551C56D08907');
        $this->addSql('ALTER TABLE pilote DROP FOREIGN KEY FK_6A3254DD57F92A74');
        $this->addSql('ALTER TABLE qualification_classement DROP FOREIGN KEY FK_8B3353B31A75EE38');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494E853CD175');
        $this->addSql('ALTER TABLE quiz_resultat DROP FOREIGN KEY FK_311FA4A7A76ED395');
        $this->addSql('ALTER TABLE quiz_resultat DROP FOREIGN KEY FK_311FA4A7853CD175');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC71E27F6BF');
        $this->addSql('ALTER TABLE sprint_classement DROP FOREIGN KEY FK_238D7C9B8C24077B');
        $this->addSql('ALTER TABLE user_reponse DROP FOREIGN KEY FK_7BBC0CDA76ED395');
        $this->addSql('ALTER TABLE user_reponse DROP FOREIGN KEY FK_7BBC0CD1E27F6BF');
        $this->addSql('ALTER TABLE user_reponse DROP FOREIGN KEY FK_7BBC0CDCF18BB82');
    }
}
