<?php

namespace App\Entity;

use App\Repository\ClassHeaderDetailsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClassHeaderDetailsRepository::class)]
class ClassHeaderDetails
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $ClassID;

    #[ORM\Column(type: 'string', length: 255,unique: true)]
    private $SectionID;

    #[ORM\Column(type: 'integer')]
    private $MaxStudents;

    #[ORM\Column(type: 'integer')]
    private $MinStudents;

    #[ORM\Column(type: 'string', length: 255,nullable: true)]
    private $ClassPrefect;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClassID(): ?string
    {
        return $this->ClassID;
    }

    public function setClassID(string $ClassID): self
    {
        $this->ClassID = $ClassID;

        return $this;
    }

    public function getSectionID(): ?string
    {
        return $this->SectionID;
    }

    public function setSectionID(string $SectionID): self
    {
        $this->SectionID = $SectionID;

        return $this;
    }

    public function getMaxStudents(): ?int
    {
        return $this->MaxStudents;
    }

    public function setMaxStudents(int $MaxStudents): self
    {
        $this->MaxStudents = $MaxStudents;

        return $this;
    }

    public function getMinStudents(): ?int
    {
        return $this->MinStudents;
    }

    public function setMinStudents(int $MinStudents): self
    {
        $this->MinStudents = $MinStudents;

        return $this;
    }

    public function getClassPrefect(): ?string
    {
        return $this->ClassPrefect;
    }

    public function setClassPrefect(string $ClassPrefect): self
    {
        $this->ClassPrefect = $ClassPrefect;

        return $this;
    }
}
