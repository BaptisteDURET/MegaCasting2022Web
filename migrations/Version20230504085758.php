<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230504085758 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Artiste (CV NVARCHAR(200) NOT NULL, Prenom NVARCHAR(50) NOT NULL, IdentifiantSexe INT NOT NULL, Identifiant INT NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE INDEX IDX_53BA0CD3F1B75433 ON Artiste (IdentifiantSexe)');
        $this->addSql('CREATE TABLE Casting (Identifiant INT IDENTITY NOT NULL, Reference NVARCHAR(60) NOT NULL, Intitule NVARCHAR(150) NOT NULL, DateDebutPublication DATETIME2(6) NOT NULL, DureeDiffusion SMALLINT NOT NULL, DateDebutContrat DATE NOT NULL, NombrePosteDispo SMALLINT NOT NULL, Localisation NVARCHAR(150) NOT NULL, Description VARCHAR(MAX) NOT NULL, DescriptionProfilRecherche VARCHAR(MAX) NOT NULL, Email NVARCHAR(150), NumeroTelephone NVARCHAR(15), Fax NVARCHAR(150), SiteWeb NVARCHAR(100), AdressePostale NVARCHAR(200), Verifie BIT NOT NULL, IdentifiantMetier INT, IdentifiantSexe INT, IdentifiantTypeContrat INT NOT NULL, IdentifiantProfessionnel INT NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE INDEX IDX_1EA683CC525B950 ON Casting (IdentifiantMetier)');
        $this->addSql('CREATE INDEX IDX_1EA683CCF1B75433 ON Casting (IdentifiantSexe)');
        $this->addSql('CREATE INDEX IDX_1EA683CC9251261A ON Casting (IdentifiantTypeContrat)');
        $this->addSql('CREATE INDEX IDX_1EA683CCAA795E4A ON Casting (IdentifiantProfessionnel)');
        $this->addSql('CREATE TABLE Conseil (Description VARCHAR(MAX) NOT NULL, Identifiant INT NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE ContenuEditorial (Identifiant INT IDENTITY NOT NULL, Titre NVARCHAR(50) NOT NULL, discr NVARCHAR(255) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE DomaineMetier (Identifiant INT IDENTITY NOT NULL, Libelle NVARCHAR(50) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE FicheMetier (Description VARCHAR(MAX) NOT NULL, Identifiant_Metier INT NOT NULL, Identifiant INT NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_202881CEEFB3CDEE ON FicheMetier (Identifiant_Metier) WHERE Identifiant_Metier IS NOT NULL');
        $this->addSql('CREATE TABLE Interview (Lien NVARCHAR(200) NOT NULL, Identifiant INT NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE Metier (Identifiant INT IDENTITY NOT NULL, Libelle NVARCHAR(50) NOT NULL, IdentifiantDomaineMetier INT NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE INDEX IDX_560C08BAE52D612A ON Metier (IdentifiantDomaineMetier)');
        $this->addSql('CREATE TABLE PackDeCastings (Identifiant INT IDENTITY NOT NULL, Libelle NVARCHAR(50) NOT NULL, NombreCastings SMALLINT NOT NULL, Prix INT NOT NULL, TempsDiffusionOffreEnHeures SMALLINT NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE Acheter (IdentifiantPack INT NOT NULL, IdentifiantProfessionnel INT NOT NULL, PRIMARY KEY (IdentifiantPack, IdentifiantProfessionnel))');
        $this->addSql('CREATE INDEX IDX_A1B3A884AA85B59C ON Acheter (IdentifiantPack)');
        $this->addSql('CREATE INDEX IDX_A1B3A884AA795E4A ON Acheter (IdentifiantProfessionnel)');
        $this->addSql('CREATE TABLE PartenaireDiffusion (Entreprise NVARCHAR(50) NOT NULL, Verifie BIT NOT NULL, Identifiant INT NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE Professionnel (Entreprise NVARCHAR(50) NOT NULL, Verifie BIT NOT NULL, Identifiant INT NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE Sexe (Identifiant INT IDENTITY NOT NULL, Libelle NVARCHAR(50) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE TypeContrat (Identifiant INT IDENTITY NOT NULL, LibelleCourt NVARCHAR(10) NOT NULL, LibelleLong NVARCHAR(50) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE Utilisateur (Identifiant INT IDENTITY NOT NULL, Nom NVARCHAR(50) NOT NULL, MotDePasse NVARCHAR(80) NOT NULL, NumeroTelephone NVARCHAR(15), Email NVARCHAR(150), Roles VARCHAR(MAX) NOT NULL, PhotoProfil NVARCHAR(255), discr NVARCHAR(255) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('EXEC sp_addextendedproperty N\'MS_Description\', N\'(DC2Type:json)\', N\'SCHEMA\', \'dbo\', N\'TABLE\', \'Utilisateur\', N\'COLUMN\', Roles');
        $this->addSql('ALTER TABLE Artiste ADD CONSTRAINT FK_53BA0CD3F1B75433 FOREIGN KEY (IdentifiantSexe) REFERENCES Sexe (Identifiant)');
        $this->addSql('ALTER TABLE Artiste ADD CONSTRAINT FK_53BA0CD34F98863B FOREIGN KEY (Identifiant) REFERENCES Utilisateur (Identifiant) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Casting ADD CONSTRAINT FK_1EA683CC525B950 FOREIGN KEY (IdentifiantMetier) REFERENCES Metier (Identifiant)');
        $this->addSql('ALTER TABLE Casting ADD CONSTRAINT FK_1EA683CCF1B75433 FOREIGN KEY (IdentifiantSexe) REFERENCES Sexe (Identifiant)');
        $this->addSql('ALTER TABLE Casting ADD CONSTRAINT FK_1EA683CC9251261A FOREIGN KEY (IdentifiantTypeContrat) REFERENCES TypeContrat (Identifiant)');
        $this->addSql('ALTER TABLE Casting ADD CONSTRAINT FK_1EA683CCAA795E4A FOREIGN KEY (IdentifiantProfessionnel) REFERENCES Professionnel (Identifiant)');
        $this->addSql('ALTER TABLE Conseil ADD CONSTRAINT FK_F0823F1D4F98863B FOREIGN KEY (Identifiant) REFERENCES ContenuEditorial (Identifiant) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE FicheMetier ADD CONSTRAINT FK_202881CEEFB3CDEE FOREIGN KEY (Identifiant_Metier) REFERENCES Metier (Identifiant)');
        $this->addSql('ALTER TABLE FicheMetier ADD CONSTRAINT FK_202881CE4F98863B FOREIGN KEY (Identifiant) REFERENCES ContenuEditorial (Identifiant) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Interview ADD CONSTRAINT FK_4DECBE974F98863B FOREIGN KEY (Identifiant) REFERENCES ContenuEditorial (Identifiant) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Metier ADD CONSTRAINT FK_560C08BAE52D612A FOREIGN KEY (IdentifiantDomaineMetier) REFERENCES DomaineMetier (Identifiant)');
        $this->addSql('ALTER TABLE Acheter ADD CONSTRAINT FK_A1B3A884AA85B59C FOREIGN KEY (IdentifiantPack) REFERENCES PackDeCastings (Identifiant)');
        $this->addSql('ALTER TABLE Acheter ADD CONSTRAINT FK_A1B3A884AA795E4A FOREIGN KEY (IdentifiantProfessionnel) REFERENCES Professionnel (Identifiant)');
        $this->addSql('ALTER TABLE PartenaireDiffusion ADD CONSTRAINT FK_CB2546054F98863B FOREIGN KEY (Identifiant) REFERENCES Utilisateur (Identifiant) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Professionnel ADD CONSTRAINT FK_C9568AFA4F98863B FOREIGN KEY (Identifiant) REFERENCES Utilisateur (Identifiant) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Artiste DROP CONSTRAINT FK_53BA0CD3F1B75433');
        $this->addSql('ALTER TABLE Artiste DROP CONSTRAINT FK_53BA0CD34F98863B');
        $this->addSql('ALTER TABLE Casting DROP CONSTRAINT FK_1EA683CC525B950');
        $this->addSql('ALTER TABLE Casting DROP CONSTRAINT FK_1EA683CCF1B75433');
        $this->addSql('ALTER TABLE Casting DROP CONSTRAINT FK_1EA683CC9251261A');
        $this->addSql('ALTER TABLE Casting DROP CONSTRAINT FK_1EA683CCAA795E4A');
        $this->addSql('ALTER TABLE Conseil DROP CONSTRAINT FK_F0823F1D4F98863B');
        $this->addSql('ALTER TABLE FicheMetier DROP CONSTRAINT FK_202881CEEFB3CDEE');
        $this->addSql('ALTER TABLE FicheMetier DROP CONSTRAINT FK_202881CE4F98863B');
        $this->addSql('ALTER TABLE Interview DROP CONSTRAINT FK_4DECBE974F98863B');
        $this->addSql('ALTER TABLE Metier DROP CONSTRAINT FK_560C08BAE52D612A');
        $this->addSql('ALTER TABLE Acheter DROP CONSTRAINT FK_A1B3A884AA85B59C');
        $this->addSql('ALTER TABLE Acheter DROP CONSTRAINT FK_A1B3A884AA795E4A');
        $this->addSql('ALTER TABLE PartenaireDiffusion DROP CONSTRAINT FK_CB2546054F98863B');
        $this->addSql('ALTER TABLE Professionnel DROP CONSTRAINT FK_C9568AFA4F98863B');
        $this->addSql('DROP TABLE Artiste');
        $this->addSql('DROP TABLE Casting');
        $this->addSql('DROP TABLE Conseil');
        $this->addSql('DROP TABLE ContenuEditorial');
        $this->addSql('DROP TABLE DomaineMetier');
        $this->addSql('DROP TABLE FicheMetier');
        $this->addSql('DROP TABLE Interview');
        $this->addSql('DROP TABLE Metier');
        $this->addSql('DROP TABLE PackDeCastings');
        $this->addSql('DROP TABLE Acheter');
        $this->addSql('DROP TABLE PartenaireDiffusion');
        $this->addSql('DROP TABLE Professionnel');
        $this->addSql('DROP TABLE Sexe');
        $this->addSql('DROP TABLE TypeContrat');
        $this->addSql('DROP TABLE Utilisateur');
    }
}
