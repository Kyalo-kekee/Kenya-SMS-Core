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

    #[ORM\Column(type: 'string', length: 10)]
    private $CourseID;

    #[ORM\Column(type: 'string', length: 255)]
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
    private $FindCourseModules;

    public function __construct()
    {
        $this->FindCourseModules = new ArrayCollection();
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
    public function getFindCourseModules(): Collection
    {
        return $this->FindCourseModules;
    }

    public function addFindCourseModule(CourseModuleHeader $findCourseModule): self
    {
        if (!$this->FindCourseModules->contains($findCourseModule)) {
            $this->FindCourseModules[] = $findCourseModule;
            $findCourseModule->setCourseId($this);
        }

        return $this;
    }

    public function removeFindCourseModule(CourseModuleHeader $findCourseModule): self
    {
        if ($this->FindCourseModules->removeElement($findCourseModule)) {
            // set the owning side to null (unless already changed)
            if ($findCourseModule->getCourseId() === $this) {
                $findCourseModule->setCourseId(null);
            }
        }

        return $this;
    }
}
