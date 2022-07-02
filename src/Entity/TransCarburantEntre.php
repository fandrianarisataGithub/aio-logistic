<?php

namespace App\Entity;

use App\Entity\TransCarburant;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\TransCarburantEntreRepository;

/**
 * @ORM\Entity(repositoryClass=TransCarburantEntreRepository::class)
 */
class TransCarburantEntre extends TransCarburant
{
    
}
