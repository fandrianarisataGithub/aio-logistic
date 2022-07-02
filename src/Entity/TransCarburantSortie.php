<?php

namespace App\Entity;

use App\Entity\TransCarburant;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\TransCarburantSortieRepository;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=TransCarburantSortieRepository::class)
 */
class TransCarburantSortie extends TransCarburant
{

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("read:arrayCarburant")
     */
    private $station;

    /**
     * @ORM\ManyToOne(targetEntity=TransVehicule::class, inversedBy="transCarburantSorties")
     * 
     */
    private $vehicule;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("read:arrayCarburant")
     */
    private $kilometrage;

    /**
     * @ORM\Column(type="integer")
     * @Groups("read:arrayCarburant")
     */
    private $fondReservoir;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("read:arrayCarburant")
     */
    private $trajet;

    /**
     * @ORM\ManyToOne(targetEntity=TransChauffeur::class, inversedBy="transCarburantSorties")
     * 
     */
    private $chauffeur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("read:arrayCarburant")
     */
    private $client;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStation(): ?string
    {
        return $this->station;
    }

    public function setStation(?string $station): self
    {
        $this->station = $station;

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

    public function getKilometrage(): ?string
    {
        return $this->kilometrage;
    }

    public function setKilometrage(?string $kilometrage): self
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    public function getFondReservoir(): ?int
    {
        return $this->fondReservoir;
    }

    public function setFondReservoir(int $fondReservoir): self
    {
        $this->fondReservoir = $fondReservoir;

        return $this;
    }

    public function getTrajet(): ?string
    {
        return $this->trajet;
    }

    public function setTrajet(?string $trajet): self
    {
        $this->trajet = $trajet;

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

    public function getClient(): ?string
    {
        return $this->client;
    }

    public function setClient(?string $client): self
    {
        $this->client = $client;

        return $this;
    }

}
