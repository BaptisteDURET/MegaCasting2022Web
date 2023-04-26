<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230425131154 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Casting DROP CONSTRAINT FK_1EA683CCAD04568C');
        $this->addSql('DROP INDEX IDX_1EA683CCAD04568C ON Casting');
        $this->addSql('sp_rename \'Casting.Identifiant_Professionnel\', \'IdentifiantProfessionnel\', \'COLUMN\'');
        $this->addSql('ALTER TABLE Casting ADD CONSTRAINT FK_1EA683CCAA795E4A FOREIGN KEY (IdentifiantProfessionnel) REFERENCES Professionnel (Identifiant)');
        $this->addSql('CREATE INDEX IDX_1EA683CCAA795E4A ON Casting (IdentifiantProfessionnel)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA db_accessadmin');
        $this->addSql('CREATE SCHEMA db_backupoperator');
        $this->addSql('CREATE SCHEMA db_datareader');
        $this->addSql('CREATE SCHEMA db_datawriter');
        $this->addSql('CREATE SCHEMA db_ddladmin');
        $this->addSql('CREATE SCHEMA db_denydatareader');
        $this->addSql('CREATE SCHEMA db_denydatawriter');
        $this->addSql('CREATE SCHEMA db_owner');
        $this->addSql('CREATE SCHEMA db_securityadmin');
        $this->addSql('CREATE SCHEMA dbo');
        $this->addSql('ALTER TABLE Casting DROP CONSTRAINT FK_1EA683CCAA795E4A');
        $this->addSql('DROP INDEX IDX_1EA683CCAA795E4A ON Casting');
        $this->addSql('sp_rename \'Casting.IdentifiantProfessionnel\', \'Identifiant_Professionnel\', \'COLUMN\'');
        $this->addSql('ALTER TABLE Casting ADD CONSTRAINT FK_1EA683CCAD04568C FOREIGN KEY (Identifiant_Professionnel) REFERENCES Professionnel (Identifiant) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE NONCLUSTERED INDEX IDX_1EA683CCAD04568C ON Casting (Identifiant_Professionnel)');
    }
}
