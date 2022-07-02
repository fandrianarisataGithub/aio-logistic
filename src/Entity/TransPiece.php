<?php

namespace App\Entity;

use App\Repository\TransPieceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TransPieceRepository::class)
 */
class TransPiece
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
    private $updated_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $designation;

    /**
     * @ORM\Column(type="float")
     */
    private $qte;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\Column(type="float")
     */
    private $prix_total;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bl;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fournisseur;

    /**
     * @ORM\ManyToOne(targetEntity=TransIntervention::class, inversedBy="piece")
     */
    private $intervention;

    /**
     * @ORM\OneToMany(targetEntity=TransInterventionDetail::class, mappedBy="piece", orphanRemoval=true)
     */
    private $interventionDetails;

    public function __construct()
    {
        $this->interventionDetails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getQte(): ?float
    {
        return $this->qte;
    }

    public function setQte(float $qte): self
    {
        $this->qte = $qte;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getPrixTotal(): ?float
    {
        return $this->prix_total;
    }

    public function setPrixTotal(float $prix_total): self
    {
        $this->prix_total = $prix_total;

        return $this;
    }

    public function getBl(): ?string
    {
        return $this->bl;
    }

    public function setBl(string $bl): self
    {
        $this->bl = $bl;

        return $this;
    }

    public function getFournisseur(): ?string
    {
        return $this->fournisseur;
    }

    public function setFournisseur(string $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getIntervention(): ?TransIntervention
    {
        return $this->intervention;
    }

    public function setIntervention(?TransIntervention $intervention): self
    {
        $this->intervention = $intervention;

        return $this;
    }

    /**
     * @return Collection|TransInterventionDetail[]
     */
    public function getInterventionDetails(): Collection
    {
        return $this->interventionDetails;
    }

    public function addInterventionDetail(TransInterventionDetail $interventionDetail): self
    {
        if (!$this->interventionDetails->contains($interventionDetail)) {
            $this->interventionDetails[] = $interventionDetail;
            $interventionDetail->setPiece($this);
        }

        return $this;
    }

    public function removeInterventionDetail(TransInterventionDetail $interventionDetail): self
    {
        if ($this->interventionDetails->removeElement($interventionDetail)) {
            // set the owning side to null (unless already changed)
            if ($interventionDetail->getPiece() === $this) {
                $interventionDetail->setPiece(null);
            }
        }

        return $this;
    }
}
