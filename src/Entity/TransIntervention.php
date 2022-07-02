<?php

namespace App\Entity;

use App\Repository\TransInterventionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TransInterventionRepository::class)
 */
class TransIntervention
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_debut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_fin;

    /**
     * @ORM\ManyToOne(targetEntity=TransVehicule::class, inversedBy="interventions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $vehicule;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $km;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ot;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $motif;

    /**
     * @ORM\OneToMany(targetEntity=TransPiece::class, mappedBy="intervention")
     */
    private $piece;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $intervenant;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $commentaire;

    /**
     * @ORM\Column(type="integer")
     */
    private $total;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lieuIntervention;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity=TransChauffeur::class, inversedBy="Interventions")
     */
    private $chauffeur;

    public function __construct()
    {
        $this->piece = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;

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

    public function getKm(): ?string
    {
        return $this->km;
    }

    public function setKm(string $km): self
    {
        $this->km = $km;

        return $this;
    }

    public function getOt(): ?string
    {
        return $this->ot;
    }

    public function setOt(?string $ot): self
    {
        $this->ot = $ot;

        return $this;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(string $motif): self
    {
        $this->motif = $motif;

        return $this;
    }

    /**
     * @return Collection|TransPiece[]
     */
    public function getPiece(): Collection
    {
        return $this->piece;
    }

    public function addPiece(TransPiece $piece): self
    {
        if (!$this->piece->contains($piece)) {
            $this->piece[] = $piece;
            $piece->setIntervention($this);
        }

        return $this;
    }

    public function removePiece(TransPiece $piece): self
    {
        if ($this->piece->removeElement($piece)) {
            // set the owning side to null (unless already changed)
            if ($piece->getIntervention() === $this) {
                $piece->setIntervention(null);
            }
        }

        return $this;
    }

    public function getIntervenant(): ?string
    {
        return $this->intervenant;
    }

    public function setIntervenant(string $intervenant): self
    {
        $this->intervenant = $intervenant;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getTotal(): ?int
    {
        return $this->total;
    }

    public function setTotal(int $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getLieuIntervention(): ?string
    {
        return $this->lieuIntervention;
    }

    public function setLieuIntervention(?string $lieuIntervention): self
    {
        $this->lieuIntervention = $lieuIntervention;

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
