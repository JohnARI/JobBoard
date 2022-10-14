<?php

namespace App\Entity;

use App\Entity\Sector;
use App\Entity\JobTypes;
use App\Entity\JobApplication;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\JobRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ORM\Entity(repositoryClass=JobRepository::class)
 * @ApiResource(
 * collectionOperations={"get"},
 * itemOperations={"get"},
 *      attributes={
 *          "order"={"created_at":"DESC"},
 *          "pagination_enabled"=true,
 *          "pagination_items_per_page"=10,
 * },
 * normalizationContext={"groups"={"job:read"}},
 * 
 * )
 * @ApiFilter(SearchFilter::class,
 * properties={"contract_type":"partial", "jobType.title":"partial", "title":"partial", "description":"partial"})
 */
class Job
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"job:read", "jobType:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"job:read", "jobType:read", "user:read"})
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @Groups({"job:read", "user:read", "jobType:read"})
     */
    private $description;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"job:read"})
     */
     private $shortDesc;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $link;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"job:read", "user:read"})
     */
    private $salary;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"job:read", "user:read"})
     */
    private $contract_type;

    /**
     * @ORM\Column(type="datetime_immutable")
     * @Groups({"user:read"})
     */
    private $created_at;

    /**
     * @ORM\Column(type="date_immutable", nullable=true)
     * @Groups({"user:read", "job:read"})
     */
    private $start;

    /**
     * @ORM\Column(type="date_immutable", nullable=true)
     * @Groups({"user:read", "job:read"})
     */
    private $end;

    /**
     * @ORM\ManyToOne(targetEntity=JobTypes::class, inversedBy="jobs")
     * @Groups({"user:read", "job:read"})
     */
    private $jobType;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="jobs")
     * @Groups({"job:read"})
     */
    private $User;

    /**
     * @ORM\ManyToOne(targetEntity=Sector::class, inversedBy="jobs")
     * @Groups({"job:read", "user:read"})
     */
    private $sector;

    /**
     * @ORM\OneToMany(targetEntity=JobApplication::class, mappedBy="job")
     */
    private $jobApplications;

    public function __construct()
    {
        $this->jobApplications = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getShortDesc(): ?string
    {
        return $this->shortDesc;
    }

    public function setShortDesc(string $shortDesc): self
    {
        $this->shortDesc = $shortDesc;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getSalary(): ?string
    {
        return $this->salary;
    }

    public function setSalary(?string $salary): self
    {
        $this->salary = $salary;

        return $this;
    }

    public function getContractType(): ?string
    {
        return $this->contract_type;
    }

    public function setContractType(string $contract_type): self
    {
        $this->contract_type = $contract_type;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getStart(): ?\DateTimeImmutable
    {
        return $this->start;
    }

    public function setStart(?\DateTimeImmutable $start): self
    {
        $this->start = $start;

        return $this;
    }

    public function getEnd(): ?\DateTimeImmutable
    {
        return $this->end;
    }

    public function setEnd(?\DateTimeImmutable $end): self
    {
        $this->end = $end;

        return $this;
    }

    public function getJobType(): ?JobTypes
    {
        return $this->jobType;
    }

    public function setJobType(?JobTypes $jobType): self
    {
        $this->jobType = $jobType;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

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

    /**
     * @return Collection<int, JobApplication>
     */
    public function getJobApplications(): Collection
    {
        return $this->jobApplications;
    }

    public function addJobApplication(JobApplication $jobApplication): self
    {
        if (!$this->jobApplications->contains($jobApplication)) {
            $this->jobApplications[] = $jobApplication;
            $jobApplication->setJob($this);
        }

        return $this;
    }

    public function removeJobApplication(JobApplication $jobApplication): self
    {
        if ($this->jobApplications->removeElement($jobApplication)) {
            // set the owning side to null (unless already changed)
            if ($jobApplication->getJob() === $this) {
                $jobApplication->setJob(null);
            }
        }

        return $this;
    }
}
