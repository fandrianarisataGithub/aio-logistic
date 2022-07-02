<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Criteria;
use App\Repository\TransVehiculeRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=TransVehiculeRepository::class)
 */
class TransVehicule
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("read:arrayCarburant")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("read:arrayCarburant")
     */
    private $immatriculation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $centre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $marque;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $energie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reservoir;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_circulation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity=TransVoyage::class, mappedBy="vehicule")
     */
    private $voyages;

    /**
     * @ORM\OneToMany(targetEntity=TransPneu::class, mappedBy="vehicule")
     */
    private $pneus;

    /**
     * @ORM\OneToMany(targetEntity=TransCarburantSortie::class, mappedBy="vehicule")
     */
    private $transCarburantSorties;

    /**
     * @ORM\OneToMany(targetEntity=TransIntervention::class, mappedBy="vehicule")
     */
    private $interventions;

    /**
     * @ORM\OneToMany(targetEntity=TransPneuHist::class, mappedBy="vehicule")
     */
    private $pneuSorties;

    public function __construct()
    {
        $this->voyages = new ArrayCollection();
        $this->pneus = new ArrayCollection();
        $this->transCarburantSorties = new ArrayCollection();
        $this->interventions = new ArrayCollection();
        $this->pneuSorties = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImmatriculation(): ?string
    {
        return $this->immatriculation;
    }

    public function setImmatriculation(string $immatriculation): self
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    public function getCentre(): ?string
    {
        return $this->centre;
    }

    public function setCentre(string $centre): self
    {
        $this->centre = $centre;

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

    public function getEnergie(): ?string
    {
        return $this->energie;
    }

    public function setEnergie(string $energie): self
    {
        $this->energie = $energie;

        return $this;
    }

    public function getReservoir(): ?string
    {
        return $this->reservoir;
    }

    public function setReservoir(string $reservoir): self
    {
        $this->reservoir = $reservoir;

        return $this;
    }

    public function getDateCirculation(): ?\DateTimeInterface
    {
        return $this->date_circulation;
    }

    public function setDateCirculation(?\DateTimeInterface $date_circulation): self
    {
        $this->date_circulation = $date_circulation;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|TransVoyage[]
     */
    public function getVoyages(): Collection
    {
        return $this->voyages;
    }

    public function addVoyage(TransVoyage $voyage): self
    {
        if (!$this->voyages->contains($voyage)) {
            $this->voyages[] = $voyage;
            $voyage->setVehicule($this);
        }

        return $this;
    }

    public function removeVoyage(TransVoyage $voyage): self
    {
        if ($this->voyages->removeElement($voyage)) {
            // set the owning side to null (unless already changed)
            if ($voyage->getVehicule() === $this) {
                $voyage->setVehicule(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TransPneu[]
     */
    public function getPneus(): Collection
    {
        return $this->pneus;
    }

    public function addPneu(TransPneu $pneu): self
    {
        if (!$this->pneus->contains($pneu)) {
            $this->pneus[] = $pneu;
            $pneu->setVehicule($this);
        }

        return $this;
    }

    public function removePneu(TransPneu $pneu): self
    {
        if ($this->pneus->removeElement($pneu)) {
            // set the owning side to null (unless already changed)
            if ($pneu->getVehicule() === $this) {
                $pneu->setVehicule(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TransCarburantSortie[]
     */
    public function getTransCarburantSorties(): Collection
    {
        return $this->transCarburantSorties;
        // $criteria = Criteria::create()
        // ->orderBy(array("kilometrage" => Criteria::ASC));

        // return $this->transCarburantSorties->matching($criteria);
    }

    public function addTransCarburantSorty(TransCarburantSortie $transCarburantSorty): self
    {
        if (!$this->transCarburantSorties->contains($transCarburantSorty)) {
            $this->transCarburantSorties[] = $transCarburantSorty;
            $transCarburantSorty->setVehicule($this);
        }

        return $this;
    }

    public function removeTransCarburantSorty(TransCarburantSortie $transCarburantSorty): self
    {
        if ($this->transCarburantSorties->removeElement($transCarburantSorty)) {
            // set the owning side to null (unless already changed)
            if ($transCarburantSorty->getVehicule() === $this) {
                $transCarburantSorty->setVehicule(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TransIntervention[]
     */
    public function getInterventions(): Collection
    {
        return $this->interventions;
    }

    public function addIntervention(TransIntervention $intervention): self
    {
        if (!$this->interventions->contains($intervention)) {
            $this->interventions[] = $intervention;
            $intervention->setVehicule($this);
        }

        return $this;
    }

    public function removeIntervention(TransIntervention $intervention): self
    {
        if ($this->interventions->removeElement($intervention)) {
            // set the owning side to null (unless already changed)
            if ($intervention->getVehicule() === $this) {
                $intervention->setVehicule(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TransPneuHist[]
     */
    public function getPneuSorties(): Collection
    {
        return $this->pneuSorties;
    }

    public function addPneuSorty(TransPneuHist $pneuSorty): self
    {
        if (!$this->pneuSorties->contains($pneuSorty)) {
            $this->pneuSorties[] = $pneuSorty;
            $pneuSorty->setVehicule($this);
        }

        return $this;
    }

    public function removePneuSorty(TransPneuHist $pneuSorty): self
    {
        if ($this->pneuSorties->removeElement($pneuSorty)) {
            // set the owning side to null (unless already changed)
            if ($pneuSorty->getVehicule() === $this) {
                $pneuSorty->setVehicule(null);
            }
        }

        return $this;
    }
}
