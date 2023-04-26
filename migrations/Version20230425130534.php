<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230425130534 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Recherche DROP CONSTRAINT FK_36D699E55E2AA11B');
        $this->addSql('ALTER TABLE Recherche DROP CONSTRAINT FK_36D699E5F1B75433');
        $this->addSql('ALTER TABLE Propose DROP CONSTRAINT FK_F24FE9FC5E2AA11B');
        $this->addSql('ALTER TABLE Propose DROP CONSTRAINT FK_F24FE9FC9251261A');
        $this->addSql('ALTER TABLE Cherche DROP CONSTRAINT FK_46A1AC865E2AA11B');
        $this->addSql('ALTER TABLE Cherche DROP CONSTRAINT FK_46A1AC86525B950');
        $this->addSql('DROP TABLE Recherche');
        $this->addSql('DROP TABLE Propose');
        $this->addSql('DROP TABLE Cherche');
        $this->addSql('ALTER TABLE Casting ADD IdentifiantCasting INT');
        $this->addSql('CREATE INDEX IDX_1EA683CC5E2AA11B ON Casting (IdentifiantCasting)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Recherche (IdentifiantCasting INT NOT NULL, IdentifiantSexe INT NOT NULL, PRIMARY KEY (IdentifiantCasting, IdentifiantSexe))');
        $this->addSql('CREATE NONCLUSTERED INDEX IDX_36D699E55E2AA11B ON Recherche (IdentifiantCasting)');
        $this->addSql('CREATE NONCLUSTERED INDEX IDX_36D699E5F1B75433 ON Recherche (IdentifiantSexe)');
        $this->addSql('CREATE TABLE Propose (IdentifiantCasting INT NOT NULL, IdentifiantTypeContrat INT NOT NULL, PRIMARY KEY (IdentifiantCasting, IdentifiantTypeContrat))');
        $this->addSql('CREATE NONCLUSTERED INDEX IDX_F24FE9FC5E2AA11B ON Propose (IdentifiantCasting)');
        $this->addSql('CREATE NONCLUSTERED INDEX IDX_F24FE9FC9251261A ON Propose (IdentifiantTypeContrat)');
        $this->addSql('CREATE TABLE Cherche (IdentifiantCasting INT NOT NULL, IdentifiantMetier INT NOT NULL, PRIMARY KEY (IdentifiantCasting, IdentifiantMetier))');
        $this->addSql('CREATE NONCLUSTERED INDEX IDX_46A1AC865E2AA11B ON Cherche (IdentifiantCasting)');
        $this->addSql('CREATE NONCLUSTERED INDEX IDX_46A1AC86525B950 ON Cherche (IdentifiantMetier)');
        $this->addSql('ALTER TABLE Recherche ADD CONSTRAINT FK_36D699E55E2AA11B FOREIGN KEY (IdentifiantCasting) REFERENCES Casting (Identifiant) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE Recherche ADD CONSTRAINT FK_36D699E5F1B75433 FOREIGN KEY (IdentifiantSexe) REFERENCES Sexe (Identifiant) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE Propose ADD CONSTRAINT FK_F24FE9FC5E2AA11B FOREIGN KEY (IdentifiantCasting) REFERENCES Casting (Identifiant) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE Propose ADD CONSTRAINT FK_F24FE9FC9251261A FOREIGN KEY (IdentifiantTypeContrat) REFERENCES TypeContrat (Identifiant) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE Cherche ADD CONSTRAINT FK_46A1AC865E2AA11B FOREIGN KEY (IdentifiantCasting) REFERENCES Casting (Identifiant) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE Cherche ADD CONSTRAINT FK_46A1AC86525B950 FOREIGN KEY (IdentifiantMetier) REFERENCES Metier (Identifiant) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP INDEX IDX_1EA683CC5E2AA11B ON Casting');
        $this->addSql('ALTER TABLE Casting DROP COLUMN IdentifiantCasting');
    }
}
