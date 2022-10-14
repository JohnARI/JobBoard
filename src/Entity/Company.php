<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CompanyRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ORM\Entity(repositoryClass=CompanyRepository::class)
 * @ApiResource(
 * collectionOperations={"get"},
 * itemOperations={"get"},
 * normalizationContext={"groups"={"company:read"}},
 * )
 * @ApiFilter(SearchFilter::class,
 * properties={"name":"partial", "sector":"partial", "users":"exact", "jobTypes":"partial"})
 */
class Company
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"jobType:read", "company:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"job:read", "user:read", "company:read", "sector:read", "jobType:read"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"user:read", "sector:read", "jobType:read"})
     */
    private $website;

    /**
     * @ORM\ManyToOne(targetEntity=Sector::class, inversedBy="companies")
     * @Groups({"user:read", "company:read", "jobType:read"})
     */
    private $sector;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="company")
     * @Groups({"company:read"})
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity=JobTypes::class, inversedBy="companies")
     */
    private $jobTypes;

    public function __construct()
    {
        $this->Sector = new ArrayCollection();
        $this->users = new ArrayCollection();
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

    public function getSector(): ?Sector
    {
        return $this->sector;
    }

    public function setSector(?Sector $sector): self
    {
        $this->sector = $sector;

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setCompany($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getCompany() === $this) {
                $user->setCompany(null);
            }
        }

        return $this;
    }

    public function getJobTypes(): ?JobTypes
    {
        return $this->jobTypes;
    }

    public function setJobTypes(?JobTypes $jobTypes): self
    {
        $this->jobTypes = $jobTypes;

        return $this;
    }
}
