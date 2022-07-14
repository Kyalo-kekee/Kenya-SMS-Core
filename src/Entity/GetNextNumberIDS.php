<?php

namespace App\Entity;

use App\Repository\GetNextNumberIDSRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GetNextNumberIDSRepository::class)]
class GetNextNumberIDS
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'App\Service\NextEntityKey')]
    #[ORM\Column(type: 'string')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, unique: true)]
    private $ObjectSignatureNamespace;

    #[ORM\Column(type: 'string', length: 10)]
    private $PrefixID;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $StartValue;

    #[ORM\Column(type: 'integer',nullable: true)]
    private $NextValueSlot ;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $ToForceRandomIdGeneration;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private $UpdatedAt;

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
}