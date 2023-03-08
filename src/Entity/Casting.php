<?php

namespace App\Entity;

use App\Repository\CastingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinTable;

#[ORM\Entity(repositoryClass: CastingRepository::class)]
class Casting
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'Identifiant')]
    private ?int $id = null;

    #[ORM\Column(length: 60, name: 'Reference')]
    private ?string $Reference = null;

    #[ORM\Column(length: 150, name: 'Intitule')]
    private ?string $Intitule = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, name: 'DateDebutPublication')]
    private ?\DateTimeInterface $DateDebutPublication = null;

    #[ORM\Column(type: Types::SMALLINT, name: 'DureeDiffusion')]
    private ?int $DureeDiffusion = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, name: 'DateDebutContrat')]
    private ?\DateTimeInterface $DateDebutContrat = null;

    #[ORM\Column(type: Types::SMALLINT, name: 'NombrePosteDispo')]
    private ?int $NombrePosteDispo = null;

    #[ORM\Column(length: 150, name: 'Localisation')]
    private ?string $Localisation = null;

    #[ORM\Column(type: Types::TEXT, name: 'Description')]
    private ?string $Description = null;

    #[ORM\Column(type: Types::TEXT, name: 'DescriptionProfilRecherche')]
    private ?string $DescriptionProfilRecherche = null;

    #[ORM\Column(length: 150, nullable: true, name: 'Email')]
    private ?string $Email = null;

    #[ORM\Column(length: 15, nullable: true, name: 'NumeroTelephone')]
    private ?string $NumeroTelephone = null;

    #[ORM\Column(length: 150, nullable: true, name: 'Fax')]
    private ?string $Fax = null;

    #[ORM\Column(length: 100, nullable: true, name: 'SiteWeb')]
    private ?string $SiteWeb = null;

    #[ORM\Column(length: 200, nullable: true, name: 'AdressePostale')]
    private ?string $AdressePostale = null;

    #[ORM\Column(name: 'Verifie')]
    private ?bool $Verifie = null;

    #[ORM\ManyToOne(inversedBy: 'Casting')]
    private ?Professionnel $professionnel = null;

    #[ORM\ManyToMany(targetEntity: Sexe::class, inversedBy: 'castings')]
    #[JoinTable(name: 'Recherche')]
    private Collection $Sexe;

    #[ORM\ManyToMany(targetEntity: TypeContrat::class, inversedBy: 'castings')]
    #[JoinTable(name: 'Propose')]
    private Collection $TypeContrat;

    #[ORM\ManyToMany(targetEntity: Metier::class, inversedBy: 'castings')]
    private Collection $Metier;

    public function __construct()
    {
        $this->Sexe = new ArrayCollection();
        $this->TypeContrat = new ArrayCollection();
        $this->Metier = new ArrayCollection();
    }

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
        return $this->Sexe;
    }

    public function addSexe(Sexe $sexe): self
    {
        if (!$this->Sexe->contains($sexe)) {
            $this->Sexe->add($sexe);
        }

        return $this;
    }

    public function removeSexe(Sexe $sexe): self
    {
        $this->Sexe->removeElement($sexe);

        return $this;
    }

    /**
     * @return Collection<int, TypeContrat>
     */
    public function getTypeContrat(): Collection
    {
        return $this->TypeContrat;
    }

    public function addTypeContrat(TypeContrat $typeContrat): self
    {
        if (!$this->TypeContrat->contains($typeContrat)) {
            $this->TypeContrat->add($typeContrat);
        }

        return $this;
    }

    public function removeTypeContrat(TypeContrat $typeContrat): self
    {
        $this->TypeContrat->removeElement($typeContrat);

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
