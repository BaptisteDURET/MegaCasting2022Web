<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230308103847 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE __EFMigrationsHistory');
        $this->addSql('ALTER TABLE Artiste DROP CONSTRAINT FK__Artiste__Identif__3D5E1FD2');
        $this->addSql('ALTER TABLE Artiste DROP CONSTRAINT FK_Artiste_Utilisateur_Identifiant');
        $this->addSql('ALTER TABLE Artiste ALTER COLUMN Identifiant INT IDENTITY NOT NULL');
        $this->addSql('ALTER TABLE Artiste ALTER COLUMN Identifiant_Sexe INT NOT NULL');
        $this->addSql('ALTER TABLE Artiste ADD CONSTRAINT FK_53BA0CD3ABD9BA5B FOREIGN KEY (Identifiant_Sexe) REFERENCES Sexe (id)');
        $this->addSql('EXEC sp_rename N\'Artiste.ix_artiste_identifiant_sexe\', N\'IDX_53BA0CD3ABD9BA5B\', N\'INDEX\'');
        $this->addSql('ALTER TABLE Casting DROP CONSTRAINT FK__Casting__Identif__48CFD27E');
        $this->addSql('DROP INDEX UQ__Casting__062B9EB889BBAFC1 ON Casting');
        $this->addSql('ALTER TABLE Casting ALTER COLUMN Identifiant INT IDENTITY NOT NULL');
        $this->addSql('ALTER TABLE Casting ALTER COLUMN Identifiant_Professionnel INT');
        $this->addSql('ALTER TABLE Casting ADD CONSTRAINT FK_1EA683CCAD04568C FOREIGN KEY (Identifiant_Professionnel) REFERENCES Professionnel (id)');
        $this->addSql('EXEC sp_rename N\'Casting.ix_casting_identifiant_professionnel\', N\'IDX_1EA683CCAD04568C\', N\'INDEX\'');
        $this->addSql('ALTER TABLE Recherche ALTER COLUMN IdentifiantCasting INT NOT NULL');
        $this->addSql('ALTER TABLE Recherche ALTER COLUMN IdentifiantSexe INT NOT NULL');
        $this->addSql('EXEC sp_rename N\'Recherche.ix_recherche_identifiantsexe\', N\'IDX_36D699E5F1B75433\', N\'INDEX\'');
        $this->addSql('ALTER TABLE Propose ALTER COLUMN IdentifiantCasting INT NOT NULL');
        $this->addSql('ALTER TABLE Propose ALTER COLUMN IdentifiantTypeContrat INT NOT NULL');
        $this->addSql('EXEC sp_rename N\'Propose.ix_propose_identifianttypecontrat\', N\'IDX_F24FE9FC9251261A\', N\'INDEX\'');
        $this->addSql('ALTER TABLE Cherche ALTER COLUMN IdentifiantCasting INT NOT NULL');
        $this->addSql('ALTER TABLE Cherche ALTER COLUMN IdentifiantMetier INT NOT NULL');
        $this->addSql('EXEC sp_rename N\'Cherche.ix_cherche_identifiantmetier\', N\'IDX_46A1AC86525B950\', N\'INDEX\'');
        $this->addSql('ALTER TABLE Conseil DROP CONSTRAINT FK_Conseil_ContenuEditorial_Identifiant');
        $this->addSql('ALTER TABLE Conseil ALTER COLUMN Identifiant INT IDENTITY NOT NULL');
        $this->addSql('ALTER TABLE ContenuEditorial ADD discr NVARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE ContenuEditorial ALTER COLUMN Identifiant INT IDENTITY NOT NULL');
        $this->addSql('ALTER TABLE DomaineMetier ALTER COLUMN Identifiant INT IDENTITY NOT NULL');
        $this->addSql('ALTER TABLE FicheMetier DROP CONSTRAINT FK_FicheMetier_ContenuEditorial_Identifiant');
        $this->addSql('ALTER TABLE FicheMetier DROP CONSTRAINT FK__FicheMeti__Ident__44FF419A');
        $this->addSql('ALTER TABLE FicheMetier ALTER COLUMN Identifiant INT IDENTITY NOT NULL');
        $this->addSql('ALTER TABLE FicheMetier ALTER COLUMN Identifiant_Metier INT NOT NULL');
        $this->addSql('ALTER TABLE FicheMetier ADD CONSTRAINT FK_202881CEEFB3CDEE FOREIGN KEY (Identifiant_Metier) REFERENCES Metier (id)');
        $this->addSql('EXEC sp_rename N\'FicheMetier.uq__fichemet__062015daa4983d76\', N\'UNIQ_202881CEEFB3CDEE\', N\'INDEX\'');
        $this->addSql('ALTER TABLE Interview DROP CONSTRAINT FK_Interview_ContenuEditorial_Identifiant');
        $this->addSql('ALTER TABLE Interview ALTER COLUMN Identifiant INT IDENTITY NOT NULL');
        $this->addSql('ALTER TABLE Metier DROP CONSTRAINT FK__Metier__Identifi__403A8C7D');
        $this->addSql('ALTER TABLE Metier ALTER COLUMN Identifiant INT IDENTITY NOT NULL');
        $this->addSql('ALTER TABLE Metier ALTER COLUMN Identifiant_Domaine_Metier INT NOT NULL');
        $this->addSql('ALTER TABLE Metier ADD CONSTRAINT FK_560C08BA2D834799 FOREIGN KEY (Identifiant_Domaine_Metier) REFERENCES DomaineMetier (id)');
        $this->addSql('EXEC sp_rename N\'Metier.ix_metier_identifiant_domaine_metier\', N\'IDX_560C08BA2D834799\', N\'INDEX\'');
        $this->addSql('sp_rename \'PackDeCastings.TempsDiffusionOffreEnHeure\', \'TempsDiffusionOffreEnHeures\', \'COLUMN\'');
        $this->addSql('ALTER TABLE PackDeCastings ALTER COLUMN Identifiant INT IDENTITY NOT NULL');
        $this->addSql('ALTER TABLE PackDeCastings ALTER COLUMN Prix DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE Acheter DROP CONSTRAINT FK__Acheter__Identif__5070F446');
        $this->addSql('DROP INDEX IX_Acheter_IdentifiantProfessionel ON Acheter');
        $this->addSql('DROP INDEX [primary] ON Acheter');
        $this->addSql('ALTER TABLE Acheter ADD IdentifiantProfessionnel INT NOT NULL');
        $this->addSql('ALTER TABLE Acheter DROP COLUMN IdentifiantProfessionel');
        $this->addSql('ALTER TABLE Acheter ALTER COLUMN IdentifiantPack INT NOT NULL');
        $this->addSql('ALTER TABLE Acheter ADD CONSTRAINT FK_A1B3A884AA795E4A FOREIGN KEY (IdentifiantProfessionnel) REFERENCES Professionnel (Identifiant)');
        $this->addSql('CREATE INDEX IDX_A1B3A884AA795E4A ON Acheter (IdentifiantProfessionnel)');
        $this->addSql('ALTER TABLE Acheter ADD PRIMARY KEY (IdentifiantPack, IdentifiantProfessionnel)');
        $this->addSql('ALTER TABLE PartenaireDiffusion DROP CONSTRAINT FK_PartenaireDiffusion_Utilisateur_Identifiant');
        $this->addSql('ALTER TABLE PartenaireDiffusion ALTER COLUMN Identifiant INT IDENTITY NOT NULL');
        $this->addSql('ALTER TABLE professionnel DROP CONSTRAINT FK_professionnel_Utilisateur_Identifiant');
        $this->addSql('ALTER TABLE professionnel ALTER COLUMN Identifiant INT IDENTITY NOT NULL');
        $this->addSql('ALTER TABLE Sexe ALTER COLUMN Identifiant INT IDENTITY NOT NULL');
        $this->addSql('ALTER TABLE TypeContrat ALTER COLUMN Identifiant INT IDENTITY NOT NULL');
        $this->addSql('DROP INDEX UQ__Utilisat__49EDB0E51B4D8934 ON Utilisateur');
        $this->addSql('sp_rename \'Utilisateur.NomUtilisateur\', \'Nom\', \'COLUMN\'');
        $this->addSql('ALTER TABLE Utilisateur ADD discr NVARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE Utilisateur ALTER COLUMN Identifiant INT IDENTITY NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE __EFMigrationsHistory (MigrationId NVARCHAR(150) COLLATE French_CI_AS NOT NULL, ProductVersion NVARCHAR(32) COLLATE French_CI_AS NOT NULL, PRIMARY KEY (MigrationId))');
        $this->addSql('ALTER TABLE ContenuEditorial DROP COLUMN discr');
        $this->addSql('ALTER TABLE ContenuEditorial ALTER COLUMN Identifiant BIGINT IDENTITY NOT NULL');
        $this->addSql('ALTER TABLE DomaineMetier ALTER COLUMN Identifiant BIGINT IDENTITY NOT NULL');
        $this->addSql('sp_rename \'PackDeCastings.TempsDiffusionOffreEnHeures\', \'TempsDiffusionOffreEnHeure\', \'COLUMN\'');
        $this->addSql('ALTER TABLE PackDeCastings ALTER COLUMN Identifiant BIGINT IDENTITY NOT NULL');
        $this->addSql('ALTER TABLE PackDeCastings ALTER COLUMN Prix NUMERIC(5, 2) NOT NULL');
        $this->addSql('ALTER TABLE Sexe ALTER COLUMN Identifiant BIGINT IDENTITY NOT NULL');
        $this->addSql('ALTER TABLE TypeContrat ALTER COLUMN Identifiant BIGINT IDENTITY NOT NULL');
        $this->addSql('sp_rename \'Utilisateur.Nom\', \'NomUtilisateur\', \'COLUMN\'');
        $this->addSql('ALTER TABLE Utilisateur DROP COLUMN discr');
        $this->addSql('ALTER TABLE Utilisateur ALTER COLUMN Identifiant BIGINT IDENTITY NOT NULL');
        $this->addSql('CREATE UNIQUE NONCLUSTERED INDEX UQ__Utilisat__49EDB0E51B4D8934 ON Utilisateur (NomUtilisateur) WHERE NomUtilisateur IS NOT NULL');
        $this->addSql('ALTER TABLE Conseil ALTER COLUMN Identifiant BIGINT NOT NULL');
        $this->addSql('ALTER TABLE Conseil ADD CONSTRAINT FK_Conseil_ContenuEditorial_Identifiant FOREIGN KEY (Identifiant) REFERENCES ContenuEditorial (Identifiant) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Interview ALTER COLUMN Identifiant BIGINT NOT NULL');
        $this->addSql('ALTER TABLE Interview ADD CONSTRAINT FK_Interview_ContenuEditorial_Identifiant FOREIGN KEY (Identifiant) REFERENCES ContenuEditorial (Identifiant) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Metier DROP CONSTRAINT FK_560C08BA2D834799');
        $this->addSql('ALTER TABLE Metier ALTER COLUMN Identifiant BIGINT IDENTITY NOT NULL');
        $this->addSql('ALTER TABLE Metier ALTER COLUMN Identifiant_Domaine_Metier BIGINT NOT NULL');
        $this->addSql('ALTER TABLE Metier ADD CONSTRAINT FK__Metier__Identifi__403A8C7D FOREIGN KEY (Identifiant_Domaine_Metier) REFERENCES DomaineMetier (Identifiant) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('EXEC sp_rename N\'Metier.idx_560c08ba2d834799\', N\'IX_Metier_Identifiant_Domaine_Metier\', N\'INDEX\'');
        $this->addSql('ALTER TABLE Artiste DROP CONSTRAINT FK_53BA0CD3ABD9BA5B');
        $this->addSql('ALTER TABLE Artiste ALTER COLUMN Identifiant BIGINT NOT NULL');
        $this->addSql('ALTER TABLE Artiste ALTER COLUMN Identifiant_Sexe BIGINT NOT NULL');
        $this->addSql('ALTER TABLE Artiste ADD CONSTRAINT FK__Artiste__Identif__3D5E1FD2 FOREIGN KEY (Identifiant_Sexe) REFERENCES Sexe (Identifiant) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE Artiste ADD CONSTRAINT FK_Artiste_Utilisateur_Identifiant FOREIGN KEY (Identifiant) REFERENCES Utilisateur (Identifiant) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('EXEC sp_rename N\'Artiste.idx_53ba0cd3abd9ba5b\', N\'IX_Artiste_Identifiant_Sexe\', N\'INDEX\'');
        $this->addSql('ALTER TABLE PartenaireDiffusion ALTER COLUMN Identifiant BIGINT NOT NULL');
        $this->addSql('ALTER TABLE PartenaireDiffusion ADD CONSTRAINT FK_PartenaireDiffusion_Utilisateur_Identifiant FOREIGN KEY (Identifiant) REFERENCES Utilisateur (Identifiant) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Professionnel ALTER COLUMN Identifiant BIGINT NOT NULL');
        $this->addSql('ALTER TABLE Professionnel ADD CONSTRAINT FK_professionnel_Utilisateur_Identifiant FOREIGN KEY (Identifiant) REFERENCES Utilisateur (Identifiant) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE FicheMetier DROP CONSTRAINT FK_202881CEEFB3CDEE');
        $this->addSql('ALTER TABLE FicheMetier ALTER COLUMN Identifiant BIGINT NOT NULL');
        $this->addSql('ALTER TABLE FicheMetier ALTER COLUMN Identifiant_Metier BIGINT NOT NULL');
        $this->addSql('ALTER TABLE FicheMetier ADD CONSTRAINT FK_FicheMetier_ContenuEditorial_Identifiant FOREIGN KEY (Identifiant) REFERENCES ContenuEditorial (Identifiant) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE FicheMetier ADD CONSTRAINT FK__FicheMeti__Ident__44FF419A FOREIGN KEY (Identifiant_Metier) REFERENCES Metier (Identifiant) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('EXEC sp_rename N\'FicheMetier.uniq_202881ceefb3cdee\', N\'UQ__FicheMet__062015DAA4983D76\', N\'INDEX\'');
        $this->addSql('ALTER TABLE Acheter DROP CONSTRAINT FK_A1B3A884AA795E4A');
        $this->addSql('DROP INDEX IDX_A1B3A884AA795E4A ON Acheter');
        $this->addSql('DROP INDEX PK__Acheter__1F59587722AF3638 ON Acheter');
        $this->addSql('ALTER TABLE Acheter ADD IdentifiantProfessionel BIGINT NOT NULL');
        $this->addSql('ALTER TABLE Acheter DROP COLUMN IdentifiantProfessionnel');
        $this->addSql('ALTER TABLE Acheter ALTER COLUMN IdentifiantPack BIGINT NOT NULL');
        $this->addSql('ALTER TABLE Acheter ADD CONSTRAINT FK__Acheter__Identif__5070F446 FOREIGN KEY (IdentifiantProfessionel) REFERENCES professionnel (Identifiant) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE NONCLUSTERED INDEX IX_Acheter_IdentifiantProfessionel ON Acheter (IdentifiantProfessionel)');
        $this->addSql('ALTER TABLE Acheter ADD PRIMARY KEY (IdentifiantPack, IdentifiantProfessionel)');
        $this->addSql('ALTER TABLE Casting DROP CONSTRAINT FK_1EA683CCAD04568C');
        $this->addSql('ALTER TABLE Casting ALTER COLUMN Identifiant BIGINT IDENTITY NOT NULL');
        $this->addSql('ALTER TABLE Casting ALTER COLUMN Identifiant_Professionnel BIGINT NOT NULL');
        $this->addSql('ALTER TABLE Casting ADD CONSTRAINT FK__Casting__Identif__48CFD27E FOREIGN KEY (Identifiant_Professionnel) REFERENCES professionnel (Identifiant) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE NONCLUSTERED INDEX UQ__Casting__062B9EB889BBAFC1 ON Casting (Reference) WHERE Reference IS NOT NULL');
        $this->addSql('EXEC sp_rename N\'Casting.idx_1ea683ccad04568c\', N\'IX_Casting_Identifiant_Professionnel\', N\'INDEX\'');
        $this->addSql('ALTER TABLE Cherche ALTER COLUMN IdentifiantCasting BIGINT NOT NULL');
        $this->addSql('ALTER TABLE Cherche ALTER COLUMN IdentifiantMetier BIGINT NOT NULL');
        $this->addSql('EXEC sp_rename N\'Cherche.idx_46a1ac86525b950\', N\'IX_Cherche_IdentifiantMetier\', N\'INDEX\'');
        $this->addSql('ALTER TABLE Propose ALTER COLUMN IdentifiantCasting BIGINT NOT NULL');
        $this->addSql('ALTER TABLE Propose ALTER COLUMN IdentifiantTypeContrat BIGINT NOT NULL');
        $this->addSql('EXEC sp_rename N\'Propose.idx_f24fe9fc9251261a\', N\'IX_Propose_IdentifiantTypeContrat\', N\'INDEX\'');
        $this->addSql('ALTER TABLE Recherche ALTER COLUMN IdentifiantCasting BIGINT NOT NULL');
        $this->addSql('ALTER TABLE Recherche ALTER COLUMN IdentifiantSexe BIGINT NOT NULL');
        $this->addSql('EXEC sp_rename N\'Recherche.idx_36d699e5f1b75433\', N\'IX_Recherche_IdentifiantSexe\', N\'INDEX\'');
    }
}
