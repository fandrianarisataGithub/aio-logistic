<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\EntrepriseTWRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=EntrepriseTWRepository::class)
 */
class EntrepriseTW
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("read:entrepriseTW")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("read:entrepriseTW")
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=ContactEntrepriseTW::class, mappedBy="entreprise")
     * 
     */
    private $contactEntrepriseTWs;

    /**
     * @ORM\OneToMany(targetEntity=RemarqueEntrepriseTW::class, mappedBy="entreprise")
     */
    private $remarqueEntrepriseTWs;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("read:entrepriseTW")
     */
    private $adresse;

    /**
     * @ORM\OneToMany(targetEntity=DataTropicalWood::class, mappedBy="entrepriseTw")
     * @Groups("read:entrepriseTW")
     */
    private $dataTropicalWood;

    public function __construct()
    {
        $this->contactEntrepriseTWs = new ArrayCollection();
        $this->remarqueEntrepriseTWs = new ArrayCollection();
        $this->dataTropicalWood = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection|ContactEntrepriseTW[]
     */
    public function getContactEntrepriseTWs(): Collection
    {
        return $this->contactEntrepriseTWs;
    }

    public function addContactEntrepriseTW(ContactEntrepriseTW $contactEntrepriseTW): self
    {
        if (!$this->contactEntrepriseTWs->contains($contactEntrepriseTW)) {
            $this->contactEntrepriseTWs[] = $contactEntrepriseTW;
            $contactEntrepriseTW->setEntreprise($this);
        }

        return $this;
    }

    public function removeContactEntrepriseTW(ContactEntrepriseTW $contactEntrepriseTW): self
    {
        if ($this->contactEntrepriseTWs->removeElement($contactEntrepriseTW)) {
            // set the owning side to null (unless already changed)
            if ($contactEntrepriseTW->getEntreprise() === $this) {
                $contactEntrepriseTW->setEntreprise(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|RemarqueEntrepriseTW[]
     */
    public function getRemarqueEntrepriseTWs(): Collection
    {
        return $this->remarqueEntrepriseTWs;
    }

    public function addRemarqueEntrepriseTW(RemarqueEntrepriseTW $remarqueEntrepriseTW): self
    {
        if (!$this->remarqueEntrepriseTWs->contains($remarqueEntrepriseTW)) {
            $this->remarqueEntrepriseTWs[] = $remarqueEntrepriseTW;
            $remarqueEntrepriseTW->setEntreprise($this);
        }
        return $this;
    }

    public function removeRemarqueEntrepriseTW(RemarqueEntrepriseTW $remarqueEntrepriseTW): self
    {
        if ($this->remarqueEntrepriseTWs->removeElement($remarqueEntrepriseTW)) {
            // set the owning side to null (unless already changed)
            if ($remarqueEntrepriseTW->getEntreprise() === $this) {
                $remarqueEntrepriseTW->setEntreprise(null);
            }
        }

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * @return Collection|DataTropicalWood[]
     */
    public function getDataTropicalWood(): Collection
    {
        return $this->dataTropicalWood;
    }

    public function addDataTropicalWood(DataTropicalWood $dataTropicalWood): self
    {
        if (!$this->dataTropicalWood->contains($dataTropicalWood)) {
            $this->dataTropicalWood[] = $dataTropicalWood;
            $dataTropicalWood->setEntrepriseTw($this);
        }

        return $this;
    }

    public function removeDataTropicalWood(DataTropicalWood $dataTropicalWood): self
    {
        if ($this->dataTropicalWood->removeElement($dataTropicalWood)) {
            // set the owning side to null (unless already changed)
            if ($dataTropicalWood->getEntrepriseTw() === $this) {
                $dataTropicalWood->setEntrepriseTw(null);
            }
        }
        return $this;
    }
}
