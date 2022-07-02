<?php

namespace App\Entity;

use App\Repository\TransPneuHistRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TransPneuHistRepository::class)
 */
class TransPneuHist
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=TransPneu::class, inversedBy="transPneuHists")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pneu;

    /**
     * @ORM\Column(type="integer")
     */
    private $qte;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $montant;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $kilometrage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $serie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $position;

    /**
     * @ORM\ManyToOne(targetEntity=TransVehicule::class, inversedBy="pneuSorties")
     */
    private $vehicule;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity=TransChauffeur::class, inversedBy="pneuHists")
     */
    private $chauffeur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPneu(): ?TransPneu
    {
        return $this->pneu;
    }

    public function setPneu(?TransPneu $pneu): self
    {
        $this->pneu = $pneu;

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

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(string $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

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

    public function setSerie(?string $serie): self
    {
        $this->serie = $serie;

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
