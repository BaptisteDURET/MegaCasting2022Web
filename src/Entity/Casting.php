<?php

namespace App\Entity;

use App\Repository\CastingRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CastingRepository::class)]
class Casting
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'Identifiant')]
    private ?int $id = null;

    #[ORM\Column(length: 60)]
    private ?string $Reference = null;

    #[ORM\Column(length: 150)]
    private ?string $Intitule = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateDebutPublication = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $DureeDiffusion = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DateDebutContrat = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $NombrePosteDispo = null;

    #[ORM\Column(length: 150)]
    private ?string $Localisation = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Description = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $DescriptionProfilRecherche = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $Email = null;

    #[ORM\Column(length: 15, nullable: true)]
    private ?string $NumeroTelephone = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $Fax = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $SiteWeb = null;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $AdressePostale = null;

    #[ORM\Column]
    private ?bool $Verifie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->Reference;
    }

    public function setReference(string $Reference): self
    {
        $this->Reference = $Reference;

        return $this;
    }

    public function getIntitule(): ?string
    {
        return $this->Intitule;
    }

    public function setIntitule(string $Intitule): self
    {
        $this->Intitule = $Intitule;

        return $this;
    }

    public function getDateDebutPublication(): ?\DateTimeInterface
    {
        return $this->DateDebutPublication;
    }

    public function setDateDebutPublication(\DateTimeInterface $DateDebutPublication): self
    {
        $this->DateDebutPublication = $DateDebutPublication;

        return $this;
    }

    public function getDureeDiffusion(): ?int
    {
        return $this->DureeDiffusion;
    }

    public function setDureeDiffusion(int $DureeDiffusion): self
    {
        $this->DureeDiffusion = $DureeDiffusion;

        return $this;
    }

    public function getDateDebutContrat(): ?\DateTimeInterface
    {
        return $this->DateDebutContrat;
    }

    public function setDateDebutContrat(\DateTimeInterface $DateDebutContrat): self
    {
        $this->DateDebutContrat = $DateDebutContrat;

        return $this;
    }

    public function getNombrePosteDispo(): ?int
    {
        return $this->NombrePosteDispo;
    }

    public function setNombrePosteDispo(int $NombrePosteDispo): self
    {
        $this->NombrePosteDispo = $NombrePosteDispo;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->Localisation;
    }

    public function setLocalisation(string $Localisation): self
    {
        $this->Localisation = $Localisation;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getDescriptionProfilRecherche(): ?string
    {
        return $this->DescriptionProfilRecherche;
    }

    public function setDescriptionProfilRecherche(string $DescriptionProfilRecherche): self
    {
        $this->DescriptionProfilRecherche = $DescriptionProfilRecherche;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(?string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getNumeroTelephone(): ?string
    {
        return $this->NumeroTelephone;
    }

    public function setNumeroTelephone(?string $NumeroTelephone): self
    {
        $this->NumeroTelephone = $NumeroTelephone;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->Fax;
    }

    public function setFax(?string $Fax): self
    {
        $this->Fax = $Fax;

        return $this;
    }

    public function getSiteWeb(): ?string
    {
        return $this->SiteWeb;
    }

    public function setSiteWeb(?string $SiteWeb): self
    {
        $this->SiteWeb = $SiteWeb;

        return $this;
    }

    public function getAdressePostale(): ?string
    {
        return $this->AdressePostale;
    }

    public function setAdressePostale(?string $AdressePostale): self
    {
        $this->AdressePostale = $AdressePostale;

        return $this;
    }

    public function isVerifie(): ?bool
    {
        return $this->Verifie;
    }

    public function setVerifie(bool $Verifie): self
    {
        $this->Verifie = $Verifie;

        return $this;
    }
}
