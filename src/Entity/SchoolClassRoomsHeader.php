<?php

namespace App\Entity;

use App\Repository\SchoolClassRoomsHeaderRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SchoolClassRoomsHeaderRepository::class)]
class SchoolClassRoomsHeader
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: SchoolClassHeader::class, inversedBy: 'ClassRooms')]
    #[ORM\JoinColumn(nullable: false)]
    private $ClassID;

    #[ORM\Column(type: 'integer')]
    private $MaxCapacity;

    #[ORM\Column(type: 'string', length: 72)]
    private $SectionName;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $HasBothGenders;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClassID(): ?SchoolClassHeader
    {
        return $this->ClassID;
    }

    public function setClassID(?SchoolClassHeader $ClassID): self
    {
        $this->ClassID = $ClassID;

        return $this;
    }

    public function getMaxCapacity(): ?int
    {
        return $this->MaxCapacity;
    }

    public function setMaxCapacity(int $MaxCapacity): self
    {
        $this->MaxCapacity = $MaxCapacity;

        return $this;
    }

    public function getSectionName(): ?string
    {
        return $this->SectionName;
    }

    public function setSectionName(string $SectionName): self
    {
        $this->SectionName = $SectionName;

        return $this;
    }

    public function getHasBothGenders(): ?bool
    {
        return $this->HasBothGenders;
    }

    public function setHasBothGenders(?bool $HasBothGenders): self
    {
        $this->HasBothGenders = $HasBothGenders;

        return $this;
    }
}
