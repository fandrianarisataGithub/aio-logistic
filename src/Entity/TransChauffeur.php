<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use App\Repository\TransChauffeurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=TransChauffeurRepository::class)
 */
class TransChauffeur
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
    private $matricule;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("read:arrayCarburant")
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("read:arrayCarburant")
     */
    private $prenom;

    /**
     * @ORM\OneToMany(targetEntity=TransCarburantSortie::class, mappedBy="transChauffeur")
     */
    private $carburantSortie;

    /**
     * @ORM\OneToMany(targetEntity=TransVoyage::class, mappedBy="chauffeur")
     */
    private $voyages;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $appellation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity=TransPneu::class, mappedBy="chauffeur")
     */
    private $pneus;

    /**
     * @ORM\OneToMany(targetEntity=TransIntervention::class, mappedBy="chauffeur")
     */
    private $interventions;

    /**
     * @ORM\OneToMany(targetEntity=TransPneuHist::class, mappedBy="chauffeur")
     */
    private $pneuHists;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $embauche;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $anciennete;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cin;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_naissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $permis;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $visite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    public function __construct()
    {
        $this->carburant = new ArrayCollection();
        $this->voyages = new ArrayCollection();
        $this->pneus = new ArrayCollection();
        $this->interventions = new ArrayCollection();
        $this->pneuHists = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
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

    public function getExpired()
    {
        return $this->visite > new \DateTime("yesterday");
    }

    public function getAge()
    {
        if($this->date_naissance){
            $diff = date_diff($this->date_naissance, new \DateTime());
            return $diff->format('%y');
        }else{
            return '';
        }
    }

    /**
     * @return Collection|TransCarburantSortie[]
     */
    public function getCarburantSortie(): Collection
    {
        return $this->carburantSortie;
    }

    public function addCarburant(TransCarburantSortie $carburantSortie): self
    {
        if (!$this->carburantSortie->contains($carburantSortie)) {
            $this->carburantSortie[] = $carburantSortie;
            $carburantSortie->setChauffeur($this);
        }

        return $this;
    }

    public function removeCarburant(TransCarburantSortie $carburantSortie): self
    {
        if ($this->carburantSortie->removeElement($carburantSortie)) {
            // set the owning side to null (unless already changed)
            if ($carburantSortie->getChauffeur() === $this) {
                $carburantSortie->setChauffeur(null);
            }
        }

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
            $voyage->setChauffeur($this);
        }

        return $this;
    }

    public function removeVoyage(TransVoyage $voyage): self
    {
        if ($this->voyages->removeElement($voyage)) {
            // set the owning side to null (unless already changed)
            if ($voyage->getChauffeur() === $this) {
                $voyage->setChauffeur(null);
            }
        }

        return $this;
    }

    public function getAppellation(): ?string
    {
        return $this->appellation;
    }

    public function setAppellation(string $appellation): self
    {
        $this->appellation = $appellation;

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
            $pneu->setChauffeur($this);
        }

        return $this;
    }

    public function removePneu(TransPneu $pneu): self
    {
        if ($this->pneus->removeElement($pneu)) {
            // set the owning side to null (unless already changed)
            if ($pneu->getChauffeur() === $this) {
                $pneu->setChauffeur(null);
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
            $intervention->setChauffeur($this);
        }

        return $this;
    }

    public function removeIntervention(TransIntervention $intervention): self
    {
        if ($this->interventions->removeElement($intervention)) {
            // set the owning side to null (unless already changed)
            if ($intervention->getChauffeur() === $this) {
                $intervention->setChauffeur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TransPneuHist[]
     */
    public function getPneuHists(): Collection
    {
        return $this->pneuHists;
    }

    public function addPneuHist(TransPneuHist $pneuHist): self
    {
        if (!$this->pneuHists->contains($pneuHist)) {
            $this->pneuHists[] = $pneuHist;
            $pneuHist->setChauffeur($this);
        }

        return $this;
    }

    public function removePneuHist(TransPneuHist $pneuHist): self
    {
        if ($this->pneuHists->removeElement($pneuHist)) {
            // set the owning side to null (unless already changed)
            if ($pneuHist->getChauffeur() === $this) {
                $pneuHist->setChauffeur(null);
            }
        }

        return $this;
    }

    public function getEmbauche(): ?\DateTimeInterface
    {
        return $this->embauche;
    }

    public function setEmbauche(?\DateTimeInterface $embauche): self
    {
        $this->embauche = $embauche;

        return $this;
    }

    public function getAnciennete(): ?string
    {
        return $this->anciennete;
    }

    public function setAnciennete(?string $anciennete): self
    {
        $this->anciennete = $anciennete;

        return $this;
    }

    public function getCin(): ?string
    {
        return $this->cin;
    }

    public function setCin(?string $cin): self
    {
        $this->cin = $cin;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(?\DateTimeInterface $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getPermis(): ?string
    {
        return $this->permis;
    }

    public function setPermis(?string $permis): self
    {
        $this->permis = $permis;

        return $this;
    }

    public function getVisite(): ?\DateTimeInterface
    {
        return $this->visite;
    }

    public function setVisite(?\DateTimeInterface $visite): self
    {
        $this->visite = $visite;

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
   
}
