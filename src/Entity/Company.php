<?php

namespace App\Entity;

use App\Repository\CompanyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompanyRepository::class)
 */
class Company
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $website;

    /**
     * @ORM\ManyToMany(targetEntity=Sector::class, inversedBy="companies")
     */
    private $Sector;

    public function __construct()
    {
        $this->Sector = new ArrayCollection();
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

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    /**
     * @return Collection<int, Sector>
     */
    public function getSector(): Collection
    {
        return $this->Sector;
    }

    public function addSector(Sector $sector): self
    {
        if (!$this->Sector->contains($sector)) {
            $this->Sector[] = $sector;
        }

        return $this;
    }

    public function removeSector(Sector $sector): self
    {
        $this->Sector->removeElement($sector);

        return $this;
    }
}
