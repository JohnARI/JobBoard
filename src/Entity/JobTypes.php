<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\JobTypesRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ORM\Entity(repositoryClass=JobTypesRepository::class)
 * @ApiResource(
 * collectionOperations={"get"},
 *      normalizationContext={"groups"={"jobType:read"}},
 * )
 * @ApiFilter(SearchFilter::class,
 * properties={"title":"partial", "jobs":"partial", "companies":"partial"})
 */
class JobTypes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"job:read", "jobType:read"})
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity=Job::class, mappedBy="jobType")
     * @Groups({"jobType:read"})
     */
    private $jobs;

    /**
     * @ORM\OneToMany(targetEntity=Company::class, mappedBy="jobTypes")
     * @Groups({"jobType:read"})
     */
    private $companies;

    public function __construct()
    {
        $this->jobs = new ArrayCollection();
        $this->companies = new ArrayCollection();
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

    /**
     * @return Collection<int, Job>
     */
    public function getJobs(): Collection
    {
        return $this->jobs;
    }

    public function addJob(Job $job): self
    {
        if (!$this->jobs->contains($job)) {
            $this->jobs[] = $job;
            $job->setJobType($this);
        }

        return $this;
    }

    public function removeJob(Job $job): self
    {
        if ($this->jobs->removeElement($job)) {
            // set the owning side to null (unless already changed)
            if ($job->getJobType() === $this) {
                $job->setJobType(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->title;
    }

    /**
     * @return Collection<int, Company>
     */
    public function getCompanies(): Collection
    {
        return $this->companies;
    }

    public function addCompany(Company $company): self
    {
        if (!$this->companies->contains($company)) {
            $this->companies[] = $company;
            $company->setJobTypes($this);
        }

        return $this;
    }

    public function removeCompany(Company $company): self
    {
        if ($this->companies->removeElement($company)) {
            // set the owning side to null (unless already changed)
            if ($company->getJobTypes() === $this) {
                $company->setJobTypes(null);
            }
        }

        return $this;
    }
}
