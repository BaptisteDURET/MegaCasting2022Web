<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\ORM\Mapping\InheritanceType;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
#[ORM\Table(name: 'Utilisateur')]
#[InheritanceType('JOINED')]
#[DiscriminatorColumn(name: 'discr', type: 'string')]
#[DiscriminatorMap(['PartenaireDiffusion' => PartenaireDiffusion::class, 'Professionnel' => Professionnel::class, 'Artiste' => Artiste::class])]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class Utilisateur implements UserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'Identifiant')]
    private ?int $id = null;

    #[ORM\Column(name: 'Nom', length: 50)]
    private ?string $nom = null;

    #[ORM\Column(name: 'MotDePasse', length: 80)]
    private ?string $motDePasse = null;

    #[ORM\Column(name: 'NumeroTelephone', length: 15, nullable: true)]
    private ?string $numeroTelephone = null;

    #[ORM\Column(name: 'Email', length: 150, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(name: 'Roles', type: "json")]
    private ?array $roles = [];

    private ?string $discr = null;

    #[ORM\Column(name: 'PhotoProfil', length: 255, nullable: true)]
    #[Assert\Image(maxSize: "2M", mimeTypes: ["image/jpeg", "image/png"], detectCorrupted: true, maxSizeMessage: "Le fichier est trop volumineux, il doit faire maximum 2Mo", mimeTypesMessage: "Le fichier doit être une image au format jpeg ou png", corruptedMessage: "Le fichier est corrompu")]
    private ?string $photoProfil = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->motDePasse;
    }

    public function setPassword(string $motDePasse): self
    {
        $this->motDePasse = $motDePasse;

        return $this;
    }

    public function  getDiscr(): ?string
    {
        return $this->discr;
    }

    public function setDiscr(string $discr): self
    {
        $this->discr = $discr;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getPhotoProfil(): ?string
    {
        return $this->photoProfil;
    }

    public function setPhotoProfil(?string $photoProfil): self
    {
        $this->photoProfil = $photoProfil;

        return $this;
    }
}
