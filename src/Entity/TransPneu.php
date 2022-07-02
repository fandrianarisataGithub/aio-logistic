<?php

namespace App\Entity;

use App\Repository\TransPneuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TransPneuRepository::class)
 */
class TransPneu
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=TransVehicule::class, inversedBy="pneus")
     */
    private $vehicule;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $kilometrage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $serie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $marque;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reference;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $position;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="integer")
     */
    private $qte;

    /**
     * @ORM\OneToMany(targetEntity=TransPneuHist::class, mappedBy="pneu")
     */
    private $transPneuHists;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity=TransChauffeur::class, inversedBy="Pneus")
     */
    private $chauffeur;

    public function __construct()
    {
        $this->transPneuHists = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVehicule(): ?TransVehicule
    {
        return $this->vehicule;
    }

    public function setVehicule(?TransVehicule $vehicule): self
    {
        $this->vehicule = $vehicule;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getKilometrage(): ?string
    {
        return $this->kilometrage;
    }

    public function setKilometrage(?string $kilometrage): self
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    public function getSerie(): ?string
    {
        return $this->serie;
    }

    public function setSerie(string $serie): self
    {
        $this->serie = $serie;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
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

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(?string $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getQte(): ?int
    {
        return $this->qte;
    }

    public function setQte(int $qte): self
    {
        $this->qte = $qte;

        return $this;
    }

    /**
     * @return Collection|TransPneuHist[]
     */
    public function getTransPneuHists(): Collection
    {
        return $this->transPneuHists;
    }

    public function addTransPneuHist(TransPneuHist $transPneuHist): self
    {
        if (!$this->transPneuHists->contains($transPneuHist)) {
            $this->transPneuHists[] = $transPneuHist;
            $transPneuHist->setPneu($this);
        }

        return $this;
    }

    public function removeTransPneuHist(TransPneuHist $transPneuHist): self
    {
        if ($this->transPneuHists->removeElement($transPneuHist)) {
            // set the owning side to null (unless already changed)
            if ($transPneuHist->getPneu() === $this) {
                $transPneuHist->setPneu(null);
            }
        }

        return $this;
    }

    public function getClient(): ?string
    {
        return $this->client;
    }

    public function setClient(?string $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getChauffeur(): ?TransChauffeur
    {
        return $this->chauffeur;
    }

    public function setChauffeur(?TransChauffeur $chauffeur): self
    {
        $this->chauffeur = $chauffeur;

        return $this;
    }
}
