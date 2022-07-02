<?php

namespace App\Entity;

use App\Repository\DetailsOfferRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DetailsOfferRepository::class)
 */
class DetailsOffer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $quantity;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $unitePrice;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * c'est le produit de unitePrice par quantity
     */
    private $amount;

    /**
     * @ORM\Column(type="float", nullable=true)
     * formule : 1/2(quantity*unitePrice + amout)
     */
    private $delivredQuantity;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $PourcentWorkProgress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $requestedSituation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $depositReceived;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $theRestOf;

    /**
     * @ORM\ManyToOne(targetEntity=DataTropicalWood::class, inversedBy="detailsOffers")
     */
    private $dataTropicalWood;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $companyConfirmation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sector;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $idPro;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    public function __construct()
    {
        $this->dateMajs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    public function setQuantity(?float $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getUnitePrice(): ?string
    {
        return $this->unitePrice;
    }

    public function setUnitePrice(?string $unitePrice): self
    {
        $this->unitePrice = $unitePrice;

        return $this;
    }

    public function getAmount(): ?string
    {
        return $this->amount;
    }

    public function setAmount(?string $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getDelivredQuantity(): ?float
    {
        return $this->delivredQuantity;
    }

    public function setDelivredQuantity(?float $delivredQuantity): self
    {
        $this->delivredQuantity = $delivredQuantity;

        return $this;
    }

    public function getPourcentWorkProgress(): ?float
    {
        return $this->PourcentWorkProgress;
    }

    public function setPourcentWorkProgress(?float $PourcentWorkProgress): self
    {
        $this->PourcentWorkProgress = $PourcentWorkProgress;

        return $this;
    }

    public function getRequestedSituation(): ?string
    {
        return $this->requestedSituation;
    }

    public function setRequestedSituation(?string $requestedSituation): self
    {
        $this->requestedSituation = $requestedSituation;

        return $this;
    }

    public function getDepositReceived(): ?string
    {
        return $this->depositReceived;
    }

    public function setDepositReceived(?string $depositReceived): self
    {
        $this->depositReceived = $depositReceived;

        return $this;
    }

    public function getTheRestOf(): ?string
    {
        return $this->theRestOf;
    }

    public function setTheRestOf(?string $theRestOf): self
    {
        $this->theRestOf = $theRestOf;

        return $this;
    }

    public function getDataTropicalWood(): ?DataTropicalWood
    {
        return $this->dataTropicalWood;
    }

    public function setDataTropicalWood(?DataTropicalWood $dataTropicalWood): self
    {
        $this->dataTropicalWood = $dataTropicalWood;

        return $this;
    }

    public function getCompanyConfirmation(): ?string
    {
        return $this->companyConfirmation;
    }

    public function setCompanyConfirmation(?string $companyConfirmation): self
    {
        $this->companyConfirmation = $companyConfirmation;

        return $this;
    }

    public function getSector(): ?string
    {
        return $this->sector;
    }

    public function setSector(?string $sector): self
    {
        $this->sector = $sector;

        return $this;
    }

    public function getIdPro(): ?string
    {
        return $this->idPro;
    }

    public function setIdPro(?string $idPro): self
    {
        $this->idPro = $idPro;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    
}
