<?php

namespace App\Entity;

use App\Repository\ClassHeaderRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClassHeaderRepository::class)]
class ClassHeader
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255,unique: true)]
    private $ClassName;

    #[ORM\Column(type: 'integer')]
    private $MaximumStudentCapacity;

    #[ORM\Column(type: 'integer')]
    private $MinimumStudentCapacity;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $HasStreams;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $ClassTeacher;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClassName(): ?string
    {
        return $this->ClassName;
    }

    public function setClassName(string $ClassName): self
    {
        $this->ClassName = $ClassName;

        return $this;
    }

    public function getMaximumStudentCapacity(): ?int
    {
        return $this->MaximumStudentCapacity;
    }

    public function setMaximumStudentCapacity(int $MaximumStudentCapacity): self
    {
        $this->MaximumStudentCapacity = $MaximumStudentCapacity;

        return $this;
    }

    public function getMinimumStudentCapacity(): ?int
    {
        return $this->MinimumStudentCapacity;
    }

    public function setMinimumStudentCapacity(int $MinimumStudentCapacity): self
    {
        $this->MinimumStudentCapacity = $MinimumStudentCapacity;

        return $this;
    }

    public function getHasStreams(): ?bool
    {
        return $this->HasStreams;
    }

    public function setHasStreams(?bool $HasStreams): self
    {
        $this->HasStreams = $HasStreams;

        return $this;
    }

    public function getClassTeacher(): ?string
    {
        return $this->ClassTeacher;
    }

    public function setClassTeacher(?string $ClassTeacher): self
    {
        $this->ClassTeacher = $ClassTeacher;

        return $this;
    }
}
