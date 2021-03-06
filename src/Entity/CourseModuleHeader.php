<?php

namespace App\Entity;

use App\Repository\CourseModuleHeaderRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CourseModuleHeaderRepository::class)]
class CourseModuleHeader
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "CUSTOM")]
    #[ORM\CustomIdGenerator(class: "App\Service\CompanyNextNumbers")]
    #[ORM\Column(type: 'string',length: 72)]
    private $id;

    #[ORM\Column(type: 'string', length: 10)]
    private $ModuleID;

    #[ORM\ManyToOne(targetEntity: CourseHeader::class, inversedBy: 'CourseModules')]
    #[ORM\JoinColumn(nullable: false)]
    private $CourseId;

    #[ORM\Column(type: 'string', length: 255)]
    private $ModuleName;

    #[ORM\Column(type: 'datetime_immutable')]
    private $CreatedAt ;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private $UpdatedAt;

    #[ORM\Column(type: 'string', length: 255)]
    private $CreatedBy;

    #[ORM\Column(type: 'string', length: 32)]
    private $CompanyID;

    #[ORM\Column(type: 'string', length: 32)]
    private $BranchID;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getModuleID(): ?string
    {
        return $this->ModuleID;
    }

    public function setModuleID(string $ModuleID): self
    {
        $this->ModuleID = $ModuleID;

        return $this;
    }

    public function getCourseId(): ?CourseHeader
    {
        return $this->CourseId;
    }

    public function setCourseId(?CourseHeader $CourseId): self
    {
        $this->CourseId = $CourseId;

        return $this;
    }

    public function getModuleName(): ?string
    {
        return $this->ModuleName;
    }

    public function setModuleName(string $ModuleName): self
    {
        $this->ModuleName = $ModuleName;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->CreatedAt;
    }

    public function setCreatedAt(\DateTimeImmutable $CreatedAt ): self
    {
        $this->CreatedAt = $CreatedAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->UpdatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $UpdatedAt = new \DateTimeImmutable()): self
    {
        $this->UpdatedAt = $UpdatedAt;

        return $this;
    }

    public function getCreatedBy(): ?string
    {
        return $this->CreatedBy;
    }

    public function setCreatedBy(string $CreatedBy): self
    {
        $this->CreatedBy = $CreatedBy;

        return $this;
    }

    public function getCompanyID(): ?string
    {
        return $this->CompanyID;
    }

    public function setCompanyID(string $CompanyID): self
    {
        $this->CompanyID = $CompanyID;

        return $this;
    }

    public function getBranchID(): ?string
    {
        return $this->BranchID;
    }

    public function setBranchID(string $BranchID): self
    {
        $this->BranchID = $BranchID;

        return $this;
    }
}
