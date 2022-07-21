<?php

namespace App\Entity;

use App\Repository\GetNextNumberIDSRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GetNextNumberIDSRepository::class)]
class GetNextNumberIDS
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, unique: true)]
    private $ObjectSignatureNamespace;

    #[ORM\Column(type: 'string', length: 32)]
    private $PrefixID;

    #[ORM\Column(type: 'string',length: 100)]
    private $NextValueSlot ;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private $UpdatedAt;

    #[ORM\Column(type: 'string', length: 32)]
    private $CompanyID;

    #[ORM\Column(type: 'string', length: 32)]
    private $BranchID;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getObjectSignatureNamespace(): ?string
    {
        return $this->ObjectSignatureNamespace;
    }

    public function setObjectSignatureNamespace(string $ObjectSignatureNamespace): self
    {
        $this->ObjectSignatureNamespace = $ObjectSignatureNamespace;

        return $this;
    }

    public function getPrefixID(): ?string
    {
        return $this->PrefixID;
    }

    public function setPrefixID(string $PrefixID): self
    {
        $this->PrefixID = $PrefixID;

        return $this;
    }

    public function getStartValue(): ?int
    {
        return $this->StartValue;
    }

    public function setStartValue(int $StartValue): self
    {
        $this->StartValue = $StartValue;

        return $this;
    }

    public function getNextValueSlot(): ?int
    {
        return $this->NextValueSlot;
    }

    public function setNextValueSlot(int $NextValueSlot): self
    {
        $this->NextValueSlot = $NextValueSlot;

        return $this;
    }

    public function getToForceRandomIdGeneration(): ?bool
    {
        return $this->ToForceRandomIdGeneration;
    }

    public function setToForceRandomIdGeneration(?bool $ToForceRandomIdGeneration): self
    {
        $this->ToForceRandomIdGeneration = $ToForceRandomIdGeneration;

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
