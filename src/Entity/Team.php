<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TeamRepository::class)
 */
class Team
{
/**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

   /**
 * @ORM\Column(type="string", length=255)
 */
private ?string $name = null;


/**
 * @ORM\Column(type="string", length=255)
 */
private ?string $country = null;

/**
 * @ORM\Column(type="string", length=255)
 */    
private ?string $city = null;

/**
 * @ORM\Column(type="string", length=255, nullable=true)
 */
private ?string $logo = null;


    /**
 * @ORM\OneToMany(mappedBy="team", targetEntity=Coach::class)
 */
private $coaches;


    public function __construct()
    {
        $this->coaches = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getCoaches(): Collection
    {
        return $this->coaches;
    }

    public function addCoach(Coach $coach): self
    {
        if (!$this->coaches->contains($coach)) {
            $this->coaches[] = $coach;
            $coach->setTeam($this);
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->name ?? 'Unnamed Team';
    }

    public function removeCoach(Coach $coach): self
    {
        if ($this->coaches->removeElement($coach)) {
            if ($coach->getTeam() === $this) {
                $coach->setTeam(null);
            }
        }

        return $this;
    }
}
