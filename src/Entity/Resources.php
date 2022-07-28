<?php

namespace App\Entity;

use App\Repository\ResourcesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResourcesRepository::class)]
class Resources
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 72)]
    private $ResourceName;

    #[ORM\Column(type: 'string', length: 72)]
    private $EnityID;

    #[ORM\Column(type: 'text')]
    private $EntityDescription;

    #[ORM\Column(type: 'string', length: 72)]
    private $EntityActionName;

    #[ORM\Column(type: 'string', length: 100)]
    private $EntityActionUrl;

    #[ORM\Column(type: 'string', length: 255)]
    private $CompanyID;

    #[ORM\Column(type: 'string', length: 72)]
    private $BranchID;

    #[ORM\Column(type: 'datetime_immutable')]
    private $CreatedAt;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private $UpdatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getResourceName(): ?string
    {
        return $this->ResourceName;
    }

    public function setResourceName(string $ResourceName): self
    {
        $this->ResourceName = $ResourceName;

        return $this;
    }

    public function getEnityID(): ?string
    {
        return $this->EnityID;
    }

    public function setEnityID(string $EnityID): self
    {
        $this->EnityID = $EnityID;

        return $this;
    }

    public function getEntityDescription(): ?string
    {
        return $this->EntityDescription;
    }

    public function setEntityDescription(string $EntityDescription): self
    {
        $this->EntityDescription = $EntityDescription;

        return $this;
    }

    public function getEntityActionName(): ?string
    {
        return $this->EntityActionName;
    }

    public function setEntityActionName(string $EntityActionName): self
    {
        $this->EntityActionName = $EntityActionName;

        return $this;
    }

    public function getEntityActionUrl(): ?string
    {
        return $this->EntityActionUrl;
    }

    public function setEntityActionUrl(string $EntityActionUrl): self
    {
        $this->EntityActionUrl = $EntityActionUrl;

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

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->CreatedAt;
    }

    public function setCreatedAt(\DateTimeImmutable $CreatedAt): self
    {
        $this->CreatedAt = $CreatedAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->UpdatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $UpdatedAt): self
    {
        $this->UpdatedAt = $UpdatedAt;

        return $this;
    }
}
