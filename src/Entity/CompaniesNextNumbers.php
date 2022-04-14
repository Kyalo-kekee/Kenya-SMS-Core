<?php

namespace App\Entity;

use App\Repository\CompaniesNextNumbersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompaniesNextNumbersRepository::class)]
class CompaniesNextNumbers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $CompaniesNextNumbers;

    #[ORM\Column(type: 'string', length: 5)]
    private $Prefix;

    #[ORM\Column(type: 'string', length: 10)]
    private $NextNumberValue;

    #[ORM\Column(type: 'string', length: 255)]
    private $EntityClass;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompaniesNextNumbers(): ?string
    {
        return $this->CompaniesNextNumbers;
    }

    public function setCompaniesNextNumbers(string $CompaniesNextNumbers): self
    {
        $this->CompaniesNextNumbers = $CompaniesNextNumbers;

        return $this;
    }

    public function getPrefix(): ?string
    {
        return $this->Prefix;
    }

    public function setPrefix(string $Prefix): self
    {
        $this->Prefix = $Prefix;

        return $this;
    }

    public function getNextNumberValue(): ?string
    {
        return $this->NextNumberValue;
    }

    public function setNextNumberValue(string $NextNumberValue): self
    {
        $this->NextNumberValue = $NextNumberValue;

        return $this;
    }

    public function getEntityClass(): ?string
    {
        return $this->EntityClass;
    }

    public function setEntityClass(string $EntityClass): self
    {
        $this->EntityClass = $EntityClass;

        return $this;
    }
}
