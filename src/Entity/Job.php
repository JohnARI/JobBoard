<?php

namespace App\Entity;

use App\Repository\JobRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JobRepository::class)
 */
class Job
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
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $link;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $salary;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contract_type;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $created_at;

    /**
     * @ORM\Column(type="date_immutable", nullable=true)
     */
    private $start;

    /**
     * @ORM\Column(type="date_immutable", nullable=true)
     */
    private $end;

    /**
     * @ORM\ManyToOne(targetEntity=JobTypes::class, inversedBy="jobs")
     */
    private $jobType;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="jobs")
     */
    private $User;

    /**
     * @ORM\ManyToOne(targetEntity=Sector::class, inversedBy="jobs")
     */
    private $sector;

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
}
