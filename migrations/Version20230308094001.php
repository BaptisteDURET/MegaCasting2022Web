<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230308094001 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artiste (sexe_id INT NOT NULL, Identifiant INT IDENTITY NOT NULL, CV NVARCHAR(200) NOT NULL, Nom NVARCHAR(50) NOT NULL, Prenom NVARCHAR(50) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE INDEX IDX_9C07354F448F3B3C ON artiste (sexe_id)');
        $this->addSql('CREATE TABLE casting (professionnel_id INT, Identifiant INT IDENTITY NOT NULL, Reference NVARCHAR(60) NOT NULL, Intitule NVARCHAR(150) NOT NULL, DateDebutPublication DATETIME2(6) NOT NULL, DureeDiffusion SMALLINT NOT NULL, DateDebutContrat DATE NOT NULL, NombrePosteDispo SMALLINT NOT NULL, Localisation NVARCHAR(150) NOT NULL, Description VARCHAR(MAX) NOT NULL, DescriptionProfilRecherche VARCHAR(MAX) NOT NULL, Email NVARCHAR(150), NumeroTelephone NVARCHAR(15), Fax NVARCHAR(150), SiteWeb NVARCHAR(100), AdressePostale NVARCHAR(200), Verifie BIT NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE INDEX IDX_D11BBA508A49CC82 ON casting (professionnel_id)');
        $this->addSql('CREATE TABLE Recherche (casting_id INT NOT NULL, sexe_id INT NOT NULL, PRIMARY KEY (casting_id, sexe_id))');
        $this->addSql('CREATE INDEX IDX_36D699E59EB2648F ON Recherche (casting_id)');
        $this->addSql('CREATE INDEX IDX_36D699E5448F3B3C ON Recherche (sexe_id)');
        $this->addSql('CREATE TABLE Propose (casting_id INT NOT NULL, type_contrat_id INT NOT NULL, PRIMARY KEY (casting_id, type_contrat_id))');
        $this->addSql('CREATE INDEX IDX_F24FE9FC9EB2648F ON Propose (casting_id)');
        $this->addSql('CREATE INDEX IDX_F24FE9FC520D03A ON Propose (type_contrat_id)');
        $this->addSql('CREATE TABLE casting_metier (casting_id INT NOT NULL, metier_id INT NOT NULL, PRIMARY KEY (casting_id, metier_id))');
        $this->addSql('CREATE INDEX IDX_B9CF4BC49EB2648F ON casting_metier (casting_id)');
        $this->addSql('CREATE INDEX IDX_B9CF4BC4ED16FA20 ON casting_metier (metier_id)');
        $this->addSql('CREATE TABLE conseil (Identifiant INT IDENTITY NOT NULL, Description VARCHAR(MAX) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE contenu_editorial (Identifiant INT IDENTITY NOT NULL, Titre NVARCHAR(50) NOT NULL, discr NVARCHAR(255) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE domaine_metier (Identifiant INT IDENTITY NOT NULL, Libelle NVARCHAR(50) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE fiche_metier (Identifiant INT IDENTITY NOT NULL, Description VARCHAR(MAX) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE interview (Identifiant INT IDENTITY NOT NULL, Lien NVARCHAR(200) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE metier (domaine_metier_id INT NOT NULL, fiche_metier_id INT, Identifiant INT IDENTITY NOT NULL, Libelle NVARCHAR(50) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE INDEX IDX_51A00D8CFBCD54E0 ON metier (domaine_metier_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_51A00D8C6A7847C8 ON metier (fiche_metier_id) WHERE fiche_metier_id IS NOT NULL');
        $this->addSql('CREATE TABLE pack_de_castings (Identifiant INT IDENTITY NOT NULL, Libelle NVARCHAR(50) NOT NULL, NombreCastings SMALLINT NOT NULL, Prix DOUBLE PRECISION NOT NULL, TempsDiffusionOffreEnHeures SMALLINT NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE Acheter (pack_de_castings_id INT NOT NULL, professionnel_id INT NOT NULL, PRIMARY KEY (pack_de_castings_id, professionnel_id))');
        $this->addSql('CREATE INDEX IDX_A1B3A884A8617E9 ON Acheter (pack_de_castings_id)');
        $this->addSql('CREATE INDEX IDX_A1B3A8848A49CC82 ON Acheter (professionnel_id)');
        $this->addSql('CREATE TABLE partenaire_diffusion (Identifiant INT IDENTITY NOT NULL, Entreprise NVARCHAR(50) NOT NULL, Verifie BIT NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE professionnel (Identifiant INT IDENTITY NOT NULL, Entreprise NVARCHAR(50) NOT NULL, Verifie BIT NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE sexe (Identifiant INT IDENTITY NOT NULL, Libelle NVARCHAR(50) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE type_contrat (Identifiant INT IDENTITY NOT NULL, LibelleCourt NVARCHAR(10) NOT NULL, LibelleLong NVARCHAR(50) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE utilisateur (Identifiant INT IDENTITY NOT NULL, Nom NVARCHAR(50) NOT NULL, MotDePasse NVARCHAR(80) NOT NULL, NumeroTelephone NVARCHAR(15), Email NVARCHAR(150), discr NVARCHAR(255) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('ALTER TABLE artiste ADD CONSTRAINT FK_9C07354F448F3B3C FOREIGN KEY (sexe_id) REFERENCES sexe (id)');
        $this->addSql('ALTER TABLE casting ADD CONSTRAINT FK_D11BBA508A49CC82 FOREIGN KEY (professionnel_id) REFERENCES professionnel (id)');
        $this->addSql('ALTER TABLE Recherche ADD CONSTRAINT FK_36D699E59EB2648F FOREIGN KEY (casting_id) REFERENCES casting (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Recherche ADD CONSTRAINT FK_36D699E5448F3B3C FOREIGN KEY (sexe_id) REFERENCES sexe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Propose ADD CONSTRAINT FK_F24FE9FC9EB2648F FOREIGN KEY (casting_id) REFERENCES casting (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Propose ADD CONSTRAINT FK_F24FE9FC520D03A FOREIGN KEY (type_contrat_id) REFERENCES type_contrat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE casting_metier ADD CONSTRAINT FK_B9CF4BC49EB2648F FOREIGN KEY (casting_id) REFERENCES casting (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE casting_metier ADD CONSTRAINT FK_B9CF4BC4ED16FA20 FOREIGN KEY (metier_id) REFERENCES metier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE metier ADD CONSTRAINT FK_51A00D8CFBCD54E0 FOREIGN KEY (domaine_metier_id) REFERENCES domaine_metier (id)');
        $this->addSql('ALTER TABLE metier ADD CONSTRAINT FK_51A00D8C6A7847C8 FOREIGN KEY (fiche_metier_id) REFERENCES fiche_metier (id)');
        $this->addSql('ALTER TABLE Acheter ADD CONSTRAINT FK_A1B3A884A8617E9 FOREIGN KEY (pack_de_castings_id) REFERENCES pack_de_castings (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Acheter ADD CONSTRAINT FK_A1B3A8848A49CC82 FOREIGN KEY (professionnel_id) REFERENCES professionnel (id) ON DELETE CASCADE');
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
        $this->addSql('ALTER TABLE artiste DROP CONSTRAINT FK_9C07354F448F3B3C');
        $this->addSql('ALTER TABLE casting DROP CONSTRAINT FK_D11BBA508A49CC82');
        $this->addSql('ALTER TABLE Recherche DROP CONSTRAINT FK_36D699E59EB2648F');
        $this->addSql('ALTER TABLE Recherche DROP CONSTRAINT FK_36D699E5448F3B3C');
        $this->addSql('ALTER TABLE Propose DROP CONSTRAINT FK_F24FE9FC9EB2648F');
        $this->addSql('ALTER TABLE Propose DROP CONSTRAINT FK_F24FE9FC520D03A');
        $this->addSql('ALTER TABLE casting_metier DROP CONSTRAINT FK_B9CF4BC49EB2648F');
        $this->addSql('ALTER TABLE casting_metier DROP CONSTRAINT FK_B9CF4BC4ED16FA20');
        $this->addSql('ALTER TABLE metier DROP CONSTRAINT FK_51A00D8CFBCD54E0');
        $this->addSql('ALTER TABLE metier DROP CONSTRAINT FK_51A00D8C6A7847C8');
        $this->addSql('ALTER TABLE Acheter DROP CONSTRAINT FK_A1B3A884A8617E9');
        $this->addSql('ALTER TABLE Acheter DROP CONSTRAINT FK_A1B3A8848A49CC82');
        $this->addSql('DROP TABLE artiste');
        $this->addSql('DROP TABLE casting');
        $this->addSql('DROP TABLE Recherche');
        $this->addSql('DROP TABLE Propose');
        $this->addSql('DROP TABLE casting_metier');
        $this->addSql('DROP TABLE conseil');
        $this->addSql('DROP TABLE contenu_editorial');
        $this->addSql('DROP TABLE domaine_metier');
        $this->addSql('DROP TABLE fiche_metier');
        $this->addSql('DROP TABLE interview');
        $this->addSql('DROP TABLE metier');
        $this->addSql('DROP TABLE pack_de_castings');
        $this->addSql('DROP TABLE Acheter');
        $this->addSql('DROP TABLE partenaire_diffusion');
        $this->addSql('DROP TABLE professionnel');
        $this->addSql('DROP TABLE sexe');
        $this->addSql('DROP TABLE type_contrat');
        $this->addSql('DROP TABLE utilisateur');
    }
}
