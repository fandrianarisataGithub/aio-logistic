<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    
    public $c_password;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hotel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $profile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pass_clair;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $receptionniste;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $comptable;

    /**
     * @ORM\OneToMany(targetEntity=Sessions::class, mappedBy="user")
     */
    private $sessions;

    /**
     * @ORM\ManyToMany(targetEntity=Hotel::class, inversedBy="users")
     */
    private $etablissement;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $transport_voyage;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $transport_garage;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $transport_carburant;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $transport_pneu;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $transport_vehicule;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $transport_chauffeur;

    public function __construct()
    {
        $this->hotels = new ArrayCollection();
        $this->sessions = new ArrayCollection();
        $this->etablissement = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getProfile(): ?string
    {
        return $this->profile;
    }
    

    public function setProfile(?string $profile): self
    {
        $this->profile = $profile;

        return $this;
    }

    public function getReceptionniste(): ?string
    {
        return $this->receptionniste;
    }

    public function setReceptionniste(?string $receptionniste): self
    {
        $this->receptionniste = $receptionniste;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
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
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getHotel(): ?string
    {
        return $this->hotel;
    }

    public function setHotel(string $hotel): self
    {
        $this->hotel = $hotel;

        return $this;
    }

    public function getPassClair(): ?string
    {
        return $this->pass_clair;
    }

    public function setPassClair(?string $pass_clair): self
    {
        $this->pass_clair = $pass_clair;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getComptable(): ?string
    {
        return $this->comptable;
    }

    public function setComptable(?string $comptable): self
    {
        $this->comptable = $comptable;

        return $this;
    }

    /**
     * @return Collection|Sessions[]
     */
    public function getSessions(): Collection
    {
        return $this->sessions;
    }

    public function addSession(Sessions $session): self
    {
        if (!$this->sessions->contains($session)) {
            $this->sessions[] = $session;
            $session->setUser($this);
        }

        return $this;
    }

    public function removeSession(Sessions $session): self
    {
        if ($this->sessions->removeElement($session)) {
            // set the owning side to null (unless already changed)
            if ($session->getUser() === $this) {
                $session->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Hotel[]
     */
    public function getEtablissement(): Collection
    {
        return $this->etablissement;
    }

    public function addEtablissement(Hotel $etablissement): self
    {
        if (!$this->etablissement->contains($etablissement)) {
            $this->etablissement[] = $etablissement;
        }

        return $this;
    }

    public function removeEtablissement(Hotel $etablissement): self
    {
        $this->etablissement->removeElement($etablissement);

        return $this;
    }

    public function getTransportVoyage(): ?bool
    {
        return $this->transport_voyage;
    }

    public function setTransportVoyage(?bool $transport_voyage): self
    {
        $this->transport_voyage = $transport_voyage;

        return $this;
    }

    public function getTransportGarage(): ?bool
    {
        return $this->transport_garage;
    }

    public function setTransportGarage(?bool $transport_garage): self
    {
        $this->transport_garage = $transport_garage;

        return $this;
    }

    public function getTransportCarburant(): ?bool
    {
        return $this->transport_carburant;
    }

    public function setTransportCarburant(?bool $transport_carburant): self
    {
        $this->transport_carburant = $transport_carburant;

        return $this;
    }

    public function getTransportPneu(): ?bool
    {
        return $this->transport_pneu;
    }

    public function setTransportPneu(?bool $transport_pneu): self
    {
        $this->transport_pneu = $transport_pneu;

        return $this;
    }

    public function getTransportVehicule(): ?bool
    {
        return $this->transport_vehicule;
    }

    public function setTransportVehicule(?bool $transport_vehicule): self
    {
        $this->transport_vehicule = $transport_vehicule;

        return $this;
    }

    public function getTransportChauffeur(): ?bool
    {
        return $this->transport_chauffeur;
    }

    public function setTransportChauffeur(?bool $transport_chauffeur): self
    {
        $this->transport_chauffeur = $transport_chauffeur;

        return $this;
    }
}
