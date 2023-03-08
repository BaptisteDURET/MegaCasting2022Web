<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230308090430 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artiste (Identifiant INT IDENTITY NOT NULL, cv NVARCHAR(200) NOT NULL, nom NVARCHAR(50) NOT NULL, prenom NVARCHAR(50) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE casting (Identifiant INT IDENTITY NOT NULL, reference NVARCHAR(60) NOT NULL, intitule NVARCHAR(150) NOT NULL, date_debut_publication DATETIME2(6) NOT NULL, duree_diffusion SMALLINT NOT NULL, date_debut_contrat DATE NOT NULL, nombre_poste_dispo SMALLINT NOT NULL, localisation NVARCHAR(150) NOT NULL, description VARCHAR(MAX) NOT NULL, description_profil_recherche VARCHAR(MAX) NOT NULL, email NVARCHAR(150), numero_telephone NVARCHAR(15), fax NVARCHAR(150), site_web NVARCHAR(100), adresse_postale NVARCHAR(200), verifie BIT NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE conseil (Identifiant INT IDENTITY NOT NULL, description VARCHAR(MAX) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE contenu_editorial (Identifiant INT IDENTITY NOT NULL, titre NVARCHAR(50) NOT NULL, discr NVARCHAR(255) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE domaine_metier (Identifiant INT IDENTITY NOT NULL, libelle NVARCHAR(50) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE fiche_metier (Identifiant INT IDENTITY NOT NULL, description VARCHAR(MAX) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE interview (Identifiant INT IDENTITY NOT NULL, lien NVARCHAR(200) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE metier (Identifiant INT IDENTITY NOT NULL, libelle NVARCHAR(50) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE pack_de_castings (Identifiant INT IDENTITY NOT NULL, libelle NVARCHAR(50) NOT NULL, nombre_castings SMALLINT NOT NULL, prix DOUBLE PRECISION NOT NULL, temps_diffusion_offre_en_heures SMALLINT NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE partenaire_diffusion (Identifiant INT IDENTITY NOT NULL, entreprise NVARCHAR(50) NOT NULL, verifie BIT NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE professionnel (Identifiant INT IDENTITY NOT NULL, entreprise NVARCHAR(50) NOT NULL, verifie BIT NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE sexe (Identifiant INT IDENTITY NOT NULL, libelle NVARCHAR(50) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE type_contrat (Identifiant INT IDENTITY NOT NULL, libelle_court NVARCHAR(10) NOT NULL, libelle_long NVARCHAR(50) NOT NULL, PRIMARY KEY (Identifiant))');
        $this->addSql('CREATE TABLE utilisateur (Identifiant INT IDENTITY NOT NULL, nom NVARCHAR(50) NOT NULL, mot_de_passe NVARCHAR(80) NOT NULL, numero_telephone NVARCHAR(15), email NVARCHAR(150), discr NVARCHAR(255) NOT NULL, PRIMARY KEY (Identifiant))');
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
        $this->addSql('DROP TABLE artiste');
        $this->addSql('DROP TABLE casting');
        $this->addSql('DROP TABLE conseil');
        $this->addSql('DROP TABLE contenu_editorial');
        $this->addSql('DROP TABLE domaine_metier');
        $this->addSql('DROP TABLE fiche_metier');
        $this->addSql('DROP TABLE interview');
        $this->addSql('DROP TABLE metier');
        $this->addSql('DROP TABLE pack_de_castings');
        $this->addSql('DROP TABLE partenaire_diffusion');
        $this->addSql('DROP TABLE professionnel');
        $this->addSql('DROP TABLE sexe');
        $this->addSql('DROP TABLE type_contrat');
        $this->addSql('DROP TABLE utilisateur');
    }
}
