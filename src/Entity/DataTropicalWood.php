<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\DataTropicalWoodRepository;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=DataTropicalWoodRepository::class)
 */
class DataTropicalWood
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("read:entrepriseTW")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("read:entrepriseTW")
     */
    private $entreprise;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("read:entrepriseTW")
     */
    private $contact;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("read:entrepriseTW")
     */
    private $detail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("read:entrepriseTW")
     */
    private $type_transaction;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("read:entrepriseTW")
     */
    private $etat_production;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("read:entrepriseTW")
     */
    private $paiement;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0, nullable=true)
     * @Groups("read:entrepriseTW")
     */
    private $montant_total;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups("read:entrepriseTW")
     */
    private $date_confirmation;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups("read:entrepriseTW")
     */
    private $devis;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0, nullable=true)
     * @Groups("read:entrepriseTW")
     */
    private $montant_paye; // total reglé
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("read:entrepriseTW")
     */
    private $idPro;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0, nullable=true)
     * @Groups("read:entrepriseTW")
     */
    private $total_reglement;

    /**
     * @ORM\Column(type="float", nullable = true)
     * @Groups("read:entrepriseTW")
     */
    private $reste;

    /**
     * @ORM\Column(type="datetime", nullable = true)
     * @Groups("read:entrepriseTW")
     */
    private $date_facture;

    /**
     * @ORM\Column(type="float", nullable = true)
     * @Groups("read:entrepriseTW")
     */
    private $etape_production;

    /**
     * @ORM\Column(type="datetime", nullable = true)
     * @Groups("read:entrepriseTW")
     */
    private $date_paiement_prevu;

    /**
     * @ORM\Column(type="datetime", nullable = true)
     * @Groups("read:entrepriseTW")
     */
    private $date_paiement_effectif;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups("read:entrepriseTW")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity=EntrepriseTW::class, inversedBy="dataTropicalWood")
     */
    private $entrepriseTw;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("read:entrepriseTW")
     */
    private $requestedSituation;

    /**
     * @ORM\OneToMany(targetEntity=DetailsOffer::class, mappedBy="dataTropicalWood")
     */
    private $detailsOffers;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    public function __construct()
    {
        $this->detailsOffers = new ArrayCollection();
        $this->dateMajs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEntreprise(): ?string
    {
        return $this->entreprise;
    }

    public function setEntreprise(?string $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(?string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getDetail(): ?string
    {
        return $this->detail;
    }

    public function setDetail(?string $detail): self
    {
        $this->detail = $detail;

        return $this;
    }

    public function getTypeTransaction(): ?string
    {
        return $this->type_transaction;
    }

    public function setTypeTransaction(?string $type_transaction): self
    {
        $this->type_transaction = $type_transaction;

        return $this;
    }

    public function getEtatProduction(): ?string
    {
        return $this->etat_production;
    }

    public function setEtatProduction(?string $etat_production): self
    {
        $this->etat_production = $etat_production;

        return $this;
    }

    public function getPaiement(): ?string
    {
        return $this->paiement;
    }

    public function setPaiement(): self
    {
        $m = $this->montant_paye;
        $mt = $this->montant_total;
        if($m == ""){
            $this->paiement = "Aucun paiement";
        }
        
        else if($m < $mt){
            $this->paiement = "Paimenet partiel effectué";
        }
        else if($m == $mt){
            $this->paiement = "Paimenet total effectué";
        }
       
        return $this;
    }

    public function getMontantTotal(): ?string
    {
        return $this->montant_total;
    }

    public function setMontantTotal(?string $montant_total): self
    {
        $this->montant_total = $montant_total;

        return $this;
    }

    public function getDateConfirmation(): ?\DateTimeInterface
    {
        return $this->date_confirmation;
    }

    public function setDateConfirmation($date_confirmation): self
    {
        $this->date_confirmation = $date_confirmation;

        return $this;
    }

    public function getDevis(): ?string
    {
        return $this->devis;
    }

    public function setDevis(?string $devis): self
    {
        $this->devis = $devis;

        return $this;
    }

    public function getMontantPaye(): ?string
    {
        return $this->montant_paye;
    }

    public function setMontantPaye(?string $montant_paye): self
    {
        $this->montant_paye = $montant_paye;

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

    public function getTotalReglement(): ?string
    {
        return $this->total_reglement;
    }

    public function setTotalReglement(?string $total_reglement): self
    {
        $this->total_reglement = $total_reglement;

        return $this;
    }

    public function getReste(): ?float
    {
        return $this->reste;
    }

    public function setReste(?float $reste): self
    {
        $this->reste = $reste;

        return $this;
    }

    public function getDateFacture(): ?\DateTimeInterface
    {
        return $this->date_facture;
    }

    public function setDateFacture(?\DateTimeInterface $date_facture): self
    {
        $this->date_facture = $date_facture;

        return $this;
    }

    public function getEtapeProduction(): ?float
    {
        return $this->etape_production;
    }

    public function setEtapeProduction(?float $etape_production): self
    {
        $this->etape_production = $etape_production;

        return $this;
    }

    public function getDatePaiementPrevu(): ?\DateTimeInterface
    {
        return $this->date_paiement_prevu;
    }

    public function setDatePaiementPrevu(?\DateTimeInterface $date_paiement_prevu): self
    {
        $this->date_paiement_prevu = $date_paiement_prevu;

        return $this;
    }

    public function getDatePaiementEffectif(): ?\DateTimeInterface
    {
        return $this->date_paiement_effectif;
    }

    public function setDatePaiementEffectif(?\DateTimeInterface $date_paiement_effectif): self
    {
        $this->date_paiement_effectif = $date_paiement_effectif;

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

    public function getEntrepriseTw(): ?EntrepriseTW
    {
        return $this->entrepriseTw;
    }

    public function setEntrepriseTw(?EntrepriseTW $entrepriseTw): self
    {
        $this->entrepriseTw = $entrepriseTw;

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

    /**
     * @return Collection|DetailsOffer[]
     */
    public function getDetailsOffers(): Collection
    {
        return $this->detailsOffers;
    }

    public function addDetailsOffer(DetailsOffer $detailsOffer): self
    {
        if (!$this->detailsOffers->contains($detailsOffer)) {
            $this->detailsOffers[] = $detailsOffer;
            $detailsOffer->setDataTropicalWood($this);
        }

        return $this;
    }

    public function removeDetailsOffer(DetailsOffer $detailsOffer): self
    {
        if ($this->detailsOffers->removeElement($detailsOffer)) {
            // set the owning side to null (unless already changed)
            if ($detailsOffer->getDataTropicalWood() === $this) {
                $detailsOffer->setDataTropicalWood(null);
            }
        }

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
