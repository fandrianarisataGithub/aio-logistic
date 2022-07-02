<?php

namespace App\Entity;

use App\Repository\SessionsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SessionsRepository::class)
 */
class Sessions
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sess_hotel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sess_current_page;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sess_lifetime;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sess_time;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="sessions")
     */
    private $user;

    /**
     * @ORM\Column(type="blob", nullable=true)
     */
    private $sess_data;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sess_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSessHotel(): ?string
    {
        return $this->sess_hotel;
    }

    public function setSessHotel(?string $sess_hotel): self
    {
        $this->sess_hotel = $sess_hotel;

        return $this;
    }

    public function getSessCurrentPage(): ?string
    {
        return $this->sess_current_page;
    }

    public function setSessCurrentPage(?string $sess_current_page): self
    {
        $this->sess_current_page = $sess_current_page;

        return $this;
    }

    public function getSessLifetime(): ?int
    {
        return $this->sess_lifetime;
    }

    public function setSessLifetime(?int $sess_lifetime): self
    {
        $this->sess_lifetime = $sess_lifetime;

        return $this;
    }

    public function getSessTime(): ?int
    {
        return $this->sess_time;
    }

    public function setSessTime(?int $sess_time): self
    {
        $this->sess_time = $sess_time;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getSessData()
    {
        return $this->sess_data;
    }

    public function setSessData($sess_data): self
    {
        $this->sess_data = $sess_data;

        return $this;
    }

    public function getSessId(): ?string
    {
        return $this->sess_id;
    }

    public function setSessId(string $sess_id): self
    {
        $this->sess_id = $sess_id;

        return $this;
    }
}
