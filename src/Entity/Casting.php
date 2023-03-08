<?php

namespace App\Entity;

use App\Repository\CastingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinTable;

#[ORM\Entity(repositoryClass: CastingRepository::class)]
#[ORM\Table(name: 'Casting')]
class Casting
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'Identifiant')]
    private ?int $id = null;

    #[ORM\Column(length: 60, name: 'Reference')]
    private ?string $reference = null;

    #[ORM\Column(length: 150, name: 'Intitule')]
    private ?string $intitule = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, name: 'DateDebutPublication')]
    private ?\DateTimeInterface $dateDebutPublication = null;

    #[ORM\Column(type: Types::SMALLINT, name: 'DureeDiffusion')]
    private ?int $dureeDiffusion = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, name: 'DateDebutContrat')]
    private ?\DateTimeInterface $dateDebutContrat = null;

    #[ORM\Column(type: Types::SMALLINT, name: 'NombrePosteDispo')]
    private ?int $nombrePosteDispo = null;

    #[ORM\Column(length: 150, name: 'Localisation')]
    private ?string $localisation = null;

    #[ORM\Column(type: Types::TEXT, name: 'Description')]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT, name: 'DescriptionProfilRecherche')]
    private ?string $descriptionProfilRecherche = null;

    #[ORM\Column(length: 150, nullable: true, name: 'Email')]
    private ?string $email = null;

    #[ORM\Column(length: 15, nullable: true, name: 'NumeroTelephone')]
    private ?string $numeroTelephone = null;

    #[ORM\Column(length: 150, nullable: true, name: 'Fax')]
    private ?string $fax = null;

    #[ORM\Column(length: 100, nullable: true, name: 'SiteWeb')]
    private ?string $siteWeb = null;

    #[ORM\Column(length: 200, nullable: true, name: 'AdressePostale')]
    private ?string $adressePostale = null;

    #[ORM\Column(name: 'Verifie')]
    private ?bool $verifie = null;

    #[ORM\ManyToOne(inversedBy: 'Casting', targetEntity: Professionnel::class)]
    #[ORM\JoinColumn(name: 'Identifiant_Professionnel', nullable: true, referencedColumnName: 'Identifiant')]
    private ?Professionnel $professionnel = null;

    #[ORM\ManyToMany(targetEntity: Sexe::class, inversedBy: 'castings')]
    #[JoinTable(name: 'Recherche')]
    #[ORM\JoinColumn(name: 'IdentifiantCasting', referencedColumnName: 'Identifiant')]
    #[ORM\InverseJoinColumn(name: 'IdentifiantSexe', referencedColumnName: 'Identifiant')]
    private Collection $sexe;

    #[ORM\ManyToMany(targetEntity: TypeContrat::class, inversedBy: 'castings')]
    #[JoinTable(name: 'Propose')]
    #[ORM\JoinColumn(name: 'IdentifiantCasting', referencedColumnName: 'Identifiant')]
    #[ORM\InverseJoinColumn(name: 'IdentifiantTypeContrat', referencedColumnName: 'Identifiant')]
    private Collection $typeContrat;

    #[ORM\ManyToMany(targetEntity: Metier::class, inversedBy: 'castings')]
    #[ORM\JoinTable(name: 'Cherche')]
    #[ORM\JoinColumn(name: 'IdentifiantCasting', referencedColumnName: 'Identifiant')]
    #[ORM\InverseJoinColumn(name: 'IdentifiantMetier', referencedColumnName: 'Identifiant')]
    private Collection $Metier;

    public function __construct()
    {
        $this->sexe = new ArrayCollection();
        $this->typeContrat = new ArrayCollection();
        $this->Metier = new ArrayCollection();
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

    public function getDateDebutPublication(): ?\DateTimeInterface
    {
        return $this->dateDebutPublication;
    }

    public function setDateDebutPublication(\DateTimeInterface $dateDebutPublication): self
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

    public function getDateDebutContrat(): ?\DateTimeInterface
    {
        return $this->dateDebutContrat;
    }

    public function setDateDebutContrat(\DateTimeInterface $dateDebutContrat): self
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

    public function getProfessionnel(): ?Professionnel
    {
        return $this->professionnel;
    }

    public function setProfessionnel(?Professionnel $professionnel): self
    {
        $this->professionnel = $professionnel;

        return $this;
    }

    /**
     * @return Collection<int, Sexe>
     */
    public function getSexe(): Collection
    {
        return $this->sexe;
    }

    public function addSexe(Sexe $sexe): self
    {
        if (!$this->sexe->contains($sexe)) {
            $this->sexe->add($sexe);
        }

        return $this;
    }

    public function removeSexe(Sexe $sexe): self
    {
        $this->sexe->removeElement($sexe);

        return $this;
    }

    /**
     * @return Collection<int, TypeContrat>
     */
    public function getTypeContrat(): Collection
    {
        return $this->typeContrat;
    }

    public function addTypeContrat(TypeContrat $typeContrat): self
    {
        if (!$this->typeContrat->contains($typeContrat)) {
            $this->typeContrat->add($typeContrat);
        }

        return $this;
    }

    public function removeTypeContrat(TypeContrat $typeContrat): self
    {
        $this->typeContrat->removeElement($typeContrat);

        return $this;
    }

    /**
     * @return Collection<int, Metier>
     */
    public function getMetier(): Collection
    {
        return $this->Metier;
    }

    public function addMetier(Metier $metier): self
    {
        if (!$this->Metier->contains($metier)) {
            $this->Metier->add($metier);
        }

        return $this;
    }

    public function removeMetier(Metier $metier): self
    {
        $this->Metier->removeElement($metier);

        return $this;
    }
}
