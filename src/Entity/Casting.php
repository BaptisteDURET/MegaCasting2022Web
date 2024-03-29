<?php

namespace App\Entity;

use App\Repository\CastingRepository;
use DateTimeInterface;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CastingRepository::class)]
#[ORM\Table(name: 'Casting')]
class Casting
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'Identifiant')]
    private ?int $id = null;

    #[ORM\Column(name: 'Reference', length: 60)]
    private ?string $reference = null;

    #[ORM\Column(name: 'Intitule', length: 150)]
    private ?string $intitule = null;

    #[ORM\Column(name: 'DateDebutPublication', type: Types::DATETIME_MUTABLE)]
    private ?DateTimeInterface $dateDebutPublication = null;

    #[ORM\Column(name: 'DureeDiffusion', type: Types::SMALLINT)]
    private ?int $dureeDiffusion = null;

    #[ORM\Column(name: 'DateDebutContrat', type: Types::DATE_MUTABLE)]
    private ?DateTimeInterface $dateDebutContrat = null;

    #[ORM\Column(name: 'NombrePosteDispo', type: Types::SMALLINT)]
    private ?int $nombrePosteDispo = null;

    #[ORM\Column(name: 'Localisation', length: 150)]
    private ?string $localisation = null;

    #[ORM\Column(name: 'Description', type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(name: 'DescriptionProfilRecherche', type: Types::TEXT)]
    private ?string $descriptionProfilRecherche = null;

    #[ORM\Column(name: 'Email', length: 150, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(name: 'NumeroTelephone', length: 15, nullable: true)]
    private ?string $numeroTelephone = null;

    #[ORM\Column(name: 'Fax', length: 150, nullable: true)]
    private ?string $fax = null;

    #[ORM\Column(name: 'SiteWeb', length: 100, nullable: true)]
    private ?string $siteWeb = null;

    #[ORM\Column(name: 'AdressePostale', length: 200, nullable: true)]
    private ?string $adressePostale = null;

    #[ORM\Column(name: 'Verifie')]
    private ?bool $verifie = null;

    #[ORM\ManyToOne(targetEntity: Metier::class, inversedBy: 'casting')]
    #[ORM\JoinColumn(name: 'IdentifiantMetier', referencedColumnName: 'Identifiant')]
    private ?Metier $metier = null;

    #[ORM\ManyToOne(targetEntity: Sexe::class, inversedBy: 'castings')]
    #[ORM\JoinColumn(name: 'IdentifiantSexe', referencedColumnName: 'Identifiant')]
    private ?Sexe $sexe = null;

    #[ORM\ManyToOne(targetEntity: TypeContrat::class, inversedBy: 'castings')]
    #[ORM\JoinColumn(name: 'IdentifiantTypeContrat', referencedColumnName: 'Identifiant', nullable: false)]
    private ?TypeContrat $typeContrat = null;

    #[ORM\ManyToOne(targetEntity: Professionnel::class, inversedBy: 'castings')]
    #[ORM\JoinColumn(name: 'IdentifiantProfessionnel', referencedColumnName: 'Identifiant', nullable: false)]
    private ?Professionnel $professionnel = null;

    #[ORM\ManyToOne(targetEntity: Region::class ,inversedBy: 'castings')]
    #[ORM\JoinColumn(name: 'IdentifiantRegion', referencedColumnName: 'Identifiant')]
    private ?Region $Region = null;

    public function __construct()
    {

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
    }

    public function getDateDebutPublication(): ?DateTimeInterface
    {
        return $this->dateDebutPublication;
    }

    public function setDateDebutPublication(DateTimeInterface $dateDebutPublication): self
    {
        $this->dateDebutPublication = $dateDebutPublication;

        return $this;
    }

    public function getDureeDiffusion(): ?int
    {
        return $this->dureeDiffusion;
    }

    public function setDureeDiffusion(int $dureeDiffusion): self
    {
        $this->dureeDiffusion = $dureeDiffusion;

        return $this;
    }

    public function getDateDebutContrat(): ?DateTimeInterface
    {
        return $this->dateDebutContrat;
    }

    public function setDateDebutContrat(DateTimeInterface $dateDebutContrat): self
    {
        $this->dateDebutContrat = $dateDebutContrat;

        return $this;
    }

    public function getNombrePosteDispo(): ?int
    {
        return $this->nombrePosteDispo;
    }

    public function setNombrePosteDispo(int $nombrePosteDispo): self
    {
        $this->nombrePosteDispo = $nombrePosteDispo;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDescriptionProfilRecherche(): ?string
    {
        return $this->descriptionProfilRecherche;
    }

    public function setDescriptionProfilRecherche(string $descriptionProfilRecherche): self
    {
        $this->descriptionProfilRecherche = $descriptionProfilRecherche;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getNumeroTelephone(): ?string
    {
        return $this->numeroTelephone;
    }

    public function setNumeroTelephone(?string $numeroTelephone): self
    {
        $this->numeroTelephone = $numeroTelephone;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(?string $fax): self
    {
        $this->fax = $fax;

        return $this;
    }

    public function getSiteWeb(): ?string
    {
        return $this->siteWeb;
    }

    public function setSiteWeb(?string $siteWeb): self
    {
        $this->siteWeb = $siteWeb;

        return $this;
    }

    public function getAdressePostale(): ?string
    {
        return $this->adressePostale;
    }

    public function setAdressePostale(?string $adressePostale): self
    {
        $this->adressePostale = $adressePostale;

        return $this;
    }

    public function isVerifie(): ?bool
    {
        return $this->verifie;
    }

    public function setVerifie(bool $verifie): self
    {
        $this->verifie = $verifie;

        return $this;
    }
    public function getMetier(): ?Metier
    {
        return $this->metier;
    }
    public function setMetier(?Metier $metier): self
    {
        $this->metier = $metier;

        return $this;
    }
    public function __toString(): string
    {
        return ''.$this;
    }

    public function getSexe(): ?Sexe
    {
        return $this->sexe;
    }

    public function setSexe(?Sexe $Sexe): self
    {
        $this->sexe = $Sexe;

        return $this;
    }

    public function getTypeContrat(): ?TypeContrat
    {
        return $this->typeContrat;
    }

    public function setTypeContrat(?TypeContrat $TypeContrat): self
    {
        $this->typeContrat = $TypeContrat;

        return $this;
    }

    public function getProfessionnel(): ?Professionnel
    {
        return $this->professionnel;
    }

    public function setProfessionnel(?Professionnel $Professionnel): self
    {
        $this->professionnel = $Professionnel;

        return $this;
    }

    public function getRegion(): ?Region
    {
        return $this->Region;
    }

    public function setRegion(?Region $Region): self
    {
        $this->Region = $Region;

        return $this;
    }
}
