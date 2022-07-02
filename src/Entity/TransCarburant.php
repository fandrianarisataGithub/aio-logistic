<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use App\Repository\TransCarburantRepository;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=TransCarburantRepository::class)
 * @InheritanceType("JOINED")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"transCarburant" = "TransCarburant", "transCarburantEntre" = "TransCarburantEntre", "transCarburantSortie" = "TransCarburantSortie"})
 */
abstract class TransCarburant // doc : https://www.doctrine-project.org/projects/doctrine-orm/en/2.11/reference/inheritance-mapping.html
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("read:arrayCarburant")
     */
    protected $id;

    /**
     * @ORM\Column(type="datetime")
     * @Groups("read:arrayCarburant")
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("read:arrayCarburant")
     */
    protected $typeCarburant;

    /**
     * @ORM\Column(type="integer")
     * @Groups("read:arrayCarburant")
     */
    protected $litrage;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("read:arrayCarburant")
     */
    protected $montant;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getTypeCarburant(): ?string
    {
        return $this->typeCarburant;
    }

    public function setTypeCarburant(string $typeCarburant): self
    {
        $this->typeCarburant = $typeCarburant;

        return $this;
    }

    public function getLitrage(): ?int
    {
        return $this->litrage;
    }

    public function setLitrage(int $litrage): self
    {
        $this->litrage = $litrage;

        return $this;
    }

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(string $montant): self
    {
        $this->montant = $montant;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

}
