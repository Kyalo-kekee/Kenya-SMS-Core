<?php

namespace App\Entity;

use App\Repository\CourseHeaderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CourseHeaderRepository::class)]
class CourseHeader
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 10, unique: true)]
    private $CourseID;

    #[ORM\Column(type: 'string', length: 255,unique: true)]
    private $CourseName;

    #[ORM\Column(type: 'string', length: 255)]
    private $CourseDuration;

    #[ORM\Column(type: 'datetime_immutable')]
    private $CreatedAt;

    #[ORM\Column(type: 'datetime_immutable')]
    private $UpdatedAt;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $HasModules;

    #[ORM\OneToMany(mappedBy: 'CourseId', targetEntity: CourseModuleHeader::class, orphanRemoval: true)]
    private $CourseModules;

    #[ORM\ManyToMany(targetEntity: StudentInformation::class, mappedBy: 'EntrySubjects')]
    private $EnrolledStudents;

    public function __construct()
    {
        $this->CourseModules = new ArrayCollection();
        $this->EnrolledStudents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCourseID(): ?string
    {
        return $this->CourseID;
    }

    public function setCourseID(string $CourseID): self
    {
        $this->CourseID = $CourseID;

        return $this;
    }

    public function getCourseName(): ?string
    {
        return $this->CourseName;
    }

    public function setCourseName(string $CourseName): self
    {
        $this->CourseName = $CourseName;

        return $this;
    }

    public function getCourseDuration(): ?string
    {
        return $this->CourseDuration;
    }

    public function setCourseDuration(string $CourseDuration): self
    {
        $this->CourseDuration = $CourseDuration;

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

    public function setUpdatedAt(\DateTimeImmutable $UpdatedAt): self
    {
        $this->UpdatedAt = $UpdatedAt;

        return $this;
    }

    public function getHasModules(): ?bool
    {
        return $this->HasModules;
    }

    public function setHasModules(?bool $HasModules): self
    {
        $this->HasModules = $HasModules;

        return $this;
    }

    /**
     * @return Collection<int, CourseModuleHeader>
     */
    public function getCourseModules(): Collection
    {
        return $this->CourseModules;
    }

    public function addCourseModule(CourseModuleHeader $findCourseModule): self
    {
        if (!$this->CourseModules->contains($findCourseModule)) {
            $this->CourseModules[] = $findCourseModule;
            $findCourseModule->setCourseId($this);
        }

        return $this;
    }

    public function removeCourseModule(CourseModuleHeader $findCourseModule): self
    {
        if ($this->CourseModules->removeElement($findCourseModule)) {
            // set the owning side to null (unless already changed)
            if ($findCourseModule->getCourseId() === $this) {
                $findCourseModule->setCourseId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, StudentInformation>
     */
    public function getEnrolledStudents(): Collection
    {
        return $this->EnrolledStudents;
    }

    public function addEnrolledStudent(StudentInformation $enrolledStudent): self
    {
        if (!$this->EnrolledStudents->contains($enrolledStudent)) {
            $this->EnrolledStudents[] = $enrolledStudent;
            $enrolledStudent->addEntrySubject($this);
        }

        return $this;
    }

    public function removeEnrolledStudent(StudentInformation $enrolledStudent): self
    {
        if ($this->EnrolledStudents->removeElement($enrolledStudent)) {
            $enrolledStudent->removeEntrySubject($this);
        }

        return $this;
    }
}
