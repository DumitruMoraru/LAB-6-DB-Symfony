<?php

namespace App\Entity;

use App\Repository\RogerCityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RogerCityRepository::class)
 */
class RogerCity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\Column(type="integer")
     */
    private $Population;

    /**
    * @ORM\OneToMany(targetEntity="App\Entity\RickPick", mappedBy="RogerCity")
    */
    private $RickPick;

    public function __construct()
    {
        $this->RickPick = new ArrayCollection();
    }
	
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getPopulation(): ?int
    {
        return $this->Population;
    }

    public function setPopulation(int $Population): self
    {
        $this->Population = $Population;

        return $this;
    }

    /**
     * @return Collection|RickPick[]
     */
    public function getRickPick(): Collection
    {
        return $this->RickPick;
    }

    public function addRickPick(RickPick $rickPick): self
    {
        if (!$this->RickPick->contains($rickPick)) {
            $this->RickPick[] = $rickPick;
            $rickPick->setRogerCity($this);
        }

        return $this;
    }

    public function removeRickPick(RickPick $rickPick): self
    {
        if ($this->RickPick->removeElement($rickPick)) {
            // set the owning side to null (unless already changed)
            if ($rickPick->getRogerCity() === $this) {
                $rickPick->setRogerCity(null);
            }
        }

        return $this;
    }

public function __toString(){
    return $this->getName();
}

}


