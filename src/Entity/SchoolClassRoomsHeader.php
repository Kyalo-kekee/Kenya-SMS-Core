<?php

namespace App\Entity;

use App\Repository\SchoolClassRoomsHeaderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SchoolClassRoomsHeaderRepository::class)]
class SchoolClassRoomsHeader
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $SchoolClassRoomsHeaderID;

    #[ORM\ManyToOne(targetEntity: SchoolClassHeader::class, inversedBy: 'ClassRooms')]
    #[ORM\JoinColumn(nullable: false)]
    private $ClassID;

    #[ORM\Column(type: 'integer')]
    private $MaxCapacity;

    #[ORM\Column(type: 'string', length: 72,unique: true)]
    private $SectionName;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $HasBothGenders;

    #[ORM\OneToMany(mappedBy: 'ClassRoomID', targetEntity: StudentInformation::class)]
    private $ClassRoomStudents;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $TotalNumberOfStudents;

    #[ORM\Column(type: 'string', length: 32)]
    private $CompanyID;

    #[ORM\Column(type: 'string', length: 32)]
    private $BranchID;

    public function __construct()
    {
        $this->ClassRoomStudents = new ArrayCollection();
    }

    public function getSchoolClassRoomsHeaderID(): ?string
    {
        return $this->SchoolClassRoomsHeaderID;
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

    /**
     * @return Collection<int, StudentInformation>
     */
    public function getClassRoomStudents(): Collection
    {
        return $this->ClassRoomStudents;
    }

    public function addClassRoomStudent(StudentInformation $classRoomStudent): self
    {
        if (!$this->ClassRoomStudents->contains($classRoomStudent)) {
            $this->ClassRoomStudents[] = $classRoomStudent;
            $classRoomStudent->setClassRoomID($this);
        }

        return $this;
    }

    public function removeClassRoomStudent(StudentInformation $classRoomStudent): self
    {
        if ($this->ClassRoomStudents->removeElement($classRoomStudent)) {
            // set the owning side to null (unless already changed)
            if ($classRoomStudent->getClassRoomID() === $this) {
                $classRoomStudent->setClassRoomID(null);
            }
        }

        return $this;
    }

    public function getTotalNumberOfStudents(): ?int
    {
        return $this->TotalNumberOfStudents;
    }

    public function setTotalNumberOfStudents(?int $TotalNumberOfStudents): self
    {
        $this->TotalNumberOfStudents = $TotalNumberOfStudents;

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
