<?php

namespace App\Entity;

use App\Repository\TransInterventionDetailRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TransInterventionDetailRepository::class)
 */
class TransInterventionDetail
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=TransIntervention::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $intervention;

    /**
     * @ORM\ManyToOne(targetEntity=TransPiece::class, inversedBy="interventionDetails")
     * @ORM\JoinColumn(nullable=false)
     */
    private $piece;

    /**
     * @ORM\Column(type="float")
     */
    private $qte;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPiece(): ?TransPiece
    {
        return $this->piece;
    }

    public function setPiece(?TransPiece $piece): self
    {
        $this->piece = $piece;

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
}
