<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\JobApplicationRepository;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ORM\Entity(repositoryClass=JobApplicationRepository::class)
 * @ApiResource(
 * collectionOperations={"get"},
 *      normalizationContext={"groups"={"jobApplication:read"}},
 * )
 * @ApiFilter(SearchFilter::class,
 * properties={"firstname":"partial", "lastname":"partial", "user":"partial", "phone":"partial"})
 */
class JobApplication
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="jobApplications")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"jobApplication:read"})
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * TODO: Une fois le FileUploader fait, mettre nullable=false
     */
    private $resume;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $motivation;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"jobApplication:read"})
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"jobApplication:read"})
     */
    private $lastname;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"jobApplication:read"})
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $experiences;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity=job::class, inversedBy="jobApplications")
     * @ORM\JoinColumn(nullable=false)
     * 
     */
    private $job;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    public function getMotivation(): ?string
    {
        return $this->motivation;
    }

    public function setMotivation(?string $motivation): self
    {
        $this->motivation = $motivation;

        return $this;
    }

    public function getfirstname(): ?string
    {
        return $this->firstname;
    }

    public function setfirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getExperiences(): ?string
    {
        return $this->experiences;
    }

    public function setExperiences(?string $experiences): self
    {
        $this->experiences = $experiences;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getJob(): ?job
    {
        return $this->job;
    }

    public function setJob(?job $job): self
    {
        $this->job = $job;

        return $this;
    }
}
