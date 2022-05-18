<?php

namespace App\Entity;

use App\Repository\SchoolClassHeaderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SchoolClassHeaderRepository::class)]
class SchoolClassHeader
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 72, unique: true)]
    private $ClassName;

    #[ORM\Column(type: 'string', length: 4,unique: true)]
    private $LevelID;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $NumberOfClassRooms;

    #[ORM\Column(type: 'string', length: 10, nullable: true)]
    private $ClassColorID;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Remarks;

    #[ORM\Column(type: 'string', length: 72)]
    private $CreatedBy;

    #[ORM\Column(type: 'smallint')]
    private $Status;

    #[ORM\OneToMany(mappedBy: 'ClassID', targetEntity: SchoolClassRoomsHeader::class)]
    private $ClassRooms;

    public function __construct()
    {
        $this->ClassRooms = new ArrayCollection();
    }

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

    public function getLevelID(): ?string
    {
        return $this->LevelID;
    }

    public function setLevelID(string $LevelID): self
    {
        $this->LevelID = $LevelID;

        return $this;
    }

    public function getNumberOfClassRooms(): ?int
    {
        return $this->NumberOfClassRooms;
    }

    public function setNumberOfClassRooms(?int $NumberOfClassRooms): self
    {
        $this->NumberOfClassRooms = $NumberOfClassRooms;

        return $this;
    }

    public function getClassColorID(): ?string
    {
        return $this->ClassColorID;
    }

    public function setClassColorID(?string $ClassColorID): self
    {
        $this->ClassColorID = $ClassColorID;

        return $this;
    }

    public function getRemarks(): ?string
    {
        return $this->Remarks;
    }

    public function setRemarks(?string $Remarks): self
    {
        $this->Remarks = $Remarks;

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

    public function getStatus(): ?int
    {
        return $this->Status;
    }

    public function setStatus(int $Status): self
    {
        $this->Status = $Status;

        return $this;
    }

    /**
     * @return Collection<int, SchoolClassRoomsHeader>
     */
    public function getClassRooms(): Collection
    {
        return $this->ClassRooms;
    }

    public function addClassRoom(SchoolClassRoomsHeader $classRoom): self
    {
        if (!$this->ClassRooms->contains($classRoom)) {
            $this->ClassRooms[] = $classRoom;
            $classRoom->setClassID($this);
        }

        return $this;
    }

    public function removeClassRoom(SchoolClassRoomsHeader $classRoom): self
    {
        if ($this->ClassRooms->removeElement($classRoom)) {
            // set the owning side to null (unless already changed)
            if ($classRoom->getClassID() === $this) {
                $classRoom->setClassID(null);
            }
        }

        return $this;
    }
}
