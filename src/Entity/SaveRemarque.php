<?php

namespace App\Entity;

use App\Repository\SaveRemarqueRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SaveRemarqueRepository::class)
 */
class SaveRemarque
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_remarque;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $concerne;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $observation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $etat_resultat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $entreprise_nom_for_id_on_remarque;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateRemarque(): ?\DateTimeInterface
    {
        return $this->date_remarque;
    }

    public function setDateRemarque(?\DateTimeInterface $date_remarque): self
    {
        $this->date_remarque = $date_remarque;

        return $this;
    }

    public function getConcerne(): ?string
    {
        return $this->concerne;
    }

    public function setConcerne(?string $concerne): self
    {
        $this->concerne = $concerne;

        return $this;
    }

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(?string $observation): self
    {
        $this->observation = $observation;

        return $this;
    }

    public function getEtatResultat(): ?string
    {
        return $this->etat_resultat;
    }

    public function setEtatResultat(?string $etat_resultat): self
    {
        $this->etat_resultat = $etat_resultat;

        return $this;
    }

    public function getEntrepriseNomForIdOnRemarque(): ?string
    {
        return $this->entreprise_nom_for_id_on_remarque;
    }

    public function setEntrepriseNomForIdOnRemarque(?string $entreprise_nom_for_id_on_remarque): self
    {
        $this->entreprise_nom_for_id_on_remarque = $entreprise_nom_for_id_on_remarque;

        return $this;
    }
}
