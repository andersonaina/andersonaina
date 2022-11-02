<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221101140039 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE acteur (id INT AUTO_INCREMENT NOT NULL, type_acteur_id INT NOT NULL, pays_id INT DEFAULT NULL, nom_acteur VARCHAR(255) NOT NULL, contact VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, INDEX IDX_EAFAD3626EA9165A (type_acteur_id), INDEX IDX_EAFAD362A6E44244 (pays_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE acteur_acteur (acteur_source INT NOT NULL, acteur_target INT NOT NULL, INDEX IDX_200CEE0C957C421D (acteur_source), INDEX IDX_200CEE0C8C991292 (acteur_target), PRIMARY KEY(acteur_source, acteur_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE acteur_propriete (acteur_id INT NOT NULL, propriete_id INT NOT NULL, INDEX IDX_FD7A2E4DA6F574A (acteur_id), INDEX IDX_FD7A2E418566CAF (propriete_id), PRIMARY KEY(acteur_id, propriete_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE langue (id INT AUTO_INCREMENT NOT NULL, libelle_langue VARCHAR(255) NOT NULL, codification_langue VARCHAR(10) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE multimedia (id INT AUTO_INCREMENT NOT NULL, publication_id INT DEFAULT NULL, type_multimedia_id INT NOT NULL, nom_multimedia VARCHAR(255) NOT NULL, chemin_multimedia VARCHAR(255) NOT NULL, description_multimedia LONGTEXT DEFAULT NULL, INDEX IDX_6131286338B217A7 (publication_id), INDEX IDX_6131286350BEA98D (type_multimedia_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pays (id INT AUTO_INCREMENT NOT NULL, nom_pays VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE propriete (id INT AUTO_INCREMENT NOT NULL, type_propriete_id INT NOT NULL, libelle_propriete VARCHAR(255) NOT NULL, libelle_court_propriete VARCHAR(150) DEFAULT NULL, INDEX IDX_73A85B939F15D6AA (type_propriete_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE publication (id INT AUTO_INCREMENT NOT NULL, acteur_id INT DEFAULT NULL, type_publication_id INT NOT NULL, libelle_publication VARCHAR(255) NOT NULL, date_publication DATE NOT NULL, heure_publication TIME NOT NULL, INDEX IDX_AF3C6779DA6F574A (acteur_id), INDEX IDX_AF3C67796E713E33 (type_publication_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE publication_propriete (publication_id INT NOT NULL, propriete_id INT NOT NULL, INDEX IDX_6FEB5D0438B217A7 (publication_id), INDEX IDX_6FEB5D0418566CAF (propriete_id), PRIMARY KEY(publication_id, propriete_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE region (id INT AUTO_INCREMENT NOT NULL, pays_id INT NOT NULL, nom_region VARCHAR(255) NOT NULL, longitude_region VARCHAR(60) DEFAULT NULL, latitude_region VARCHAR(60) DEFAULT NULL, INDEX IDX_F62F176A6E44244 (pays_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_acteur (id INT AUTO_INCREMENT NOT NULL, nom_type_acteur VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_acteur_propriete (type_acteur_id INT NOT NULL, propriete_id INT NOT NULL, INDEX IDX_584823556EA9165A (type_acteur_id), INDEX IDX_5848235518566CAF (propriete_id), PRIMARY KEY(type_acteur_id, propriete_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_multimedia (id INT AUTO_INCREMENT NOT NULL, libelle_type_multimedia VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_propriete (id INT AUTO_INCREMENT NOT NULL, libelle_type_propriete VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_publication (id INT AUTO_INCREMENT NOT NULL, libelle_type_publication VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_publication_propriete (type_publication_id INT NOT NULL, propriete_id INT NOT NULL, INDEX IDX_141C99A06E713E33 (type_publication_id), INDEX IDX_141C99A018566CAF (propriete_id), PRIMARY KEY(type_publication_id, propriete_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE acteur ADD CONSTRAINT FK_EAFAD3626EA9165A FOREIGN KEY (type_acteur_id) REFERENCES type_acteur (id)');
        $this->addSql('ALTER TABLE acteur ADD CONSTRAINT FK_EAFAD362A6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id)');
        $this->addSql('ALTER TABLE acteur_acteur ADD CONSTRAINT FK_200CEE0C957C421D FOREIGN KEY (acteur_source) REFERENCES acteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE acteur_acteur ADD CONSTRAINT FK_200CEE0C8C991292 FOREIGN KEY (acteur_target) REFERENCES acteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE acteur_propriete ADD CONSTRAINT FK_FD7A2E4DA6F574A FOREIGN KEY (acteur_id) REFERENCES acteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE acteur_propriete ADD CONSTRAINT FK_FD7A2E418566CAF FOREIGN KEY (propriete_id) REFERENCES propriete (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE multimedia ADD CONSTRAINT FK_6131286338B217A7 FOREIGN KEY (publication_id) REFERENCES publication (id)');
        $this->addSql('ALTER TABLE multimedia ADD CONSTRAINT FK_6131286350BEA98D FOREIGN KEY (type_multimedia_id) REFERENCES type_multimedia (id)');
        $this->addSql('ALTER TABLE propriete ADD CONSTRAINT FK_73A85B939F15D6AA FOREIGN KEY (type_propriete_id) REFERENCES type_propriete (id)');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C6779DA6F574A FOREIGN KEY (acteur_id) REFERENCES acteur (id)');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C67796E713E33 FOREIGN KEY (type_publication_id) REFERENCES type_publication (id)');
        $this->addSql('ALTER TABLE publication_propriete ADD CONSTRAINT FK_6FEB5D0438B217A7 FOREIGN KEY (publication_id) REFERENCES publication (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE publication_propriete ADD CONSTRAINT FK_6FEB5D0418566CAF FOREIGN KEY (propriete_id) REFERENCES propriete (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE region ADD CONSTRAINT FK_F62F176A6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id)');
        $this->addSql('ALTER TABLE type_acteur_propriete ADD CONSTRAINT FK_584823556EA9165A FOREIGN KEY (type_acteur_id) REFERENCES type_acteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE type_acteur_propriete ADD CONSTRAINT FK_5848235518566CAF FOREIGN KEY (propriete_id) REFERENCES propriete (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE type_publication_propriete ADD CONSTRAINT FK_141C99A06E713E33 FOREIGN KEY (type_publication_id) REFERENCES type_publication (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE type_publication_propriete ADD CONSTRAINT FK_141C99A018566CAF FOREIGN KEY (propriete_id) REFERENCES propriete (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE acteur DROP FOREIGN KEY FK_EAFAD3626EA9165A');
        $this->addSql('ALTER TABLE acteur DROP FOREIGN KEY FK_EAFAD362A6E44244');
        $this->addSql('ALTER TABLE acteur_acteur DROP FOREIGN KEY FK_200CEE0C957C421D');
        $this->addSql('ALTER TABLE acteur_acteur DROP FOREIGN KEY FK_200CEE0C8C991292');
        $this->addSql('ALTER TABLE acteur_propriete DROP FOREIGN KEY FK_FD7A2E4DA6F574A');
        $this->addSql('ALTER TABLE acteur_propriete DROP FOREIGN KEY FK_FD7A2E418566CAF');
        $this->addSql('ALTER TABLE multimedia DROP FOREIGN KEY FK_6131286338B217A7');
        $this->addSql('ALTER TABLE multimedia DROP FOREIGN KEY FK_6131286350BEA98D');
        $this->addSql('ALTER TABLE propriete DROP FOREIGN KEY FK_73A85B939F15D6AA');
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C6779DA6F574A');
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C67796E713E33');
        $this->addSql('ALTER TABLE publication_propriete DROP FOREIGN KEY FK_6FEB5D0438B217A7');
        $this->addSql('ALTER TABLE publication_propriete DROP FOREIGN KEY FK_6FEB5D0418566CAF');
        $this->addSql('ALTER TABLE region DROP FOREIGN KEY FK_F62F176A6E44244');
        $this->addSql('ALTER TABLE type_acteur_propriete DROP FOREIGN KEY FK_584823556EA9165A');
        $this->addSql('ALTER TABLE type_acteur_propriete DROP FOREIGN KEY FK_5848235518566CAF');
        $this->addSql('ALTER TABLE type_publication_propriete DROP FOREIGN KEY FK_141C99A06E713E33');
        $this->addSql('ALTER TABLE type_publication_propriete DROP FOREIGN KEY FK_141C99A018566CAF');
        $this->addSql('DROP TABLE acteur');
        $this->addSql('DROP TABLE acteur_acteur');
        $this->addSql('DROP TABLE acteur_propriete');
        $this->addSql('DROP TABLE langue');
        $this->addSql('DROP TABLE multimedia');
        $this->addSql('DROP TABLE pays');
        $this->addSql('DROP TABLE propriete');
        $this->addSql('DROP TABLE publication');
        $this->addSql('DROP TABLE publication_propriete');
        $this->addSql('DROP TABLE region');
        $this->addSql('DROP TABLE type_acteur');
        $this->addSql('DROP TABLE type_acteur_propriete');
        $this->addSql('DROP TABLE type_multimedia');
        $this->addSql('DROP TABLE type_propriete');
        $this->addSql('DROP TABLE type_publication');
        $this->addSql('DROP TABLE type_publication_propriete');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
