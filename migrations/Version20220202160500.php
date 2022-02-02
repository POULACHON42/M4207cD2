<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220202160500 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE acces (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, fich_id INT NOT NULL, autho_id_id INT NOT NULL, utilisateur_id INT NOT NULL, authorisation_id INT NOT NULL, documentid INT NOT NULL, INDEX IDX_D0F43B109D86650F (user_id_id), INDEX IDX_D0F43B10E3F13660 (fich_id), INDEX IDX_D0F43B107DBC707B (autho_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE authorisation (id INT AUTO_INCREMENT NOT NULL, lecture TINYINT(1) NOT NULL, ecriture TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE document (id INT AUTO_INCREMENT NOT NULL, chemin VARCHAR(255) NOT NULL, date DATETIME NOT NULL, actif TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, utilisateur VARCHAR(255) NOT NULL, login VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE acces ADD CONSTRAINT FK_D0F43B109D86650F FOREIGN KEY (user_id_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE acces ADD CONSTRAINT FK_D0F43B10E3F13660 FOREIGN KEY (fich_id) REFERENCES document (id)');
        $this->addSql('ALTER TABLE acces ADD CONSTRAINT FK_D0F43B107DBC707B FOREIGN KEY (autho_id_id) REFERENCES authorisation (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE acces DROP FOREIGN KEY FK_D0F43B107DBC707B');
        $this->addSql('ALTER TABLE acces DROP FOREIGN KEY FK_D0F43B10E3F13660');
        $this->addSql('ALTER TABLE acces DROP FOREIGN KEY FK_D0F43B109D86650F');
        $this->addSql('DROP TABLE acces');
        $this->addSql('DROP TABLE authorisation');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE utilisateur');
    }
}
