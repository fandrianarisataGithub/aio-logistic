<?php

namespace App\Entity;

use App\Repository\DateMajRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DateMajRepository::class)
 */
class DateMaj
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
    private $majDataTrop;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $majDataDetail;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $majDataTres;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMajDataTrop(): ?\DateTimeInterface
    {
        return $this->majDataTrop;
    }

    public function setMajDataTrop(?\DateTimeInterface $majDataTrop): self
    {
        $this->majDataTrop = $majDataTrop;

        return $this;
    }

    public function getMajDataDetail(): ?\DateTimeInterface
    {
        return $this->majDataDetail;
    }

    public function setMajDataDetail(?\DateTimeInterface $majDataDetail): self
    {
        $this->majDataDetail = $majDataDetail;

        return $this;
    }

    public function getMajDataTres(): ?\DateTimeInterface
    {
        return $this->majDataTres;
    }

    public function setMajDataTres(?\DateTimeInterface $majDataTres): self
    {
        $this->majDataTres = $majDataTres;
        
        return $this;
    }
}
