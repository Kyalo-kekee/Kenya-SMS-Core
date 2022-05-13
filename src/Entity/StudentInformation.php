<?php

namespace App\Entity;

use App\Repository\StudentInformationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentInformationRepository::class)]
class StudentInformation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $FirstName;

    #[ORM\Column(type: 'string', length: 72, nullable: true)]
    private $MiddleName;

    #[ORM\Column(type: 'string', length: 72)]
    private $LastName;

    #[ORM\Column(type: 'datetime')]
    private $EnrollDate;

    #[ORM\Column(type: 'string', length: 72)]
    private $GuardianName;

    #[ORM\Column(type: 'string', length: 15)]
    private $GuardianPhoneNumber1;

    #[ORM\Column(type: 'string', length: 15, nullable: true)]
    private $GuardianPhoneNumber2;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $GuardianEmail;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $ImageUrl;

    #[ORM\Column(type: 'string', length: 10, nullable: true)]
    private $ImageSize;

    #[ORM\Column(type: 'string', length: 255)]
    private $CertificateAttachment1;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $CertificateAttachment2;

    #[ORM\Column(type: 'string', length: 10, nullable: true)]
    private $EntryMarks;

    #[ORM\Column(type: 'string', length: 4, nullable: true)]
    private $EntryGrade;

    #[ORM\ManyToOne(targetEntity: InstitutionSetup::class, inversedBy: 'StudentsInfo')]
    #[ORM\JoinColumn(nullable: false)]
    private $SchoolID;

    #[ORM\ManyToOne(targetEntity: SchoolClassRoomsHeader::class, inversedBy: 'ClassRoomStudents')]
    #[ORM\JoinColumn(nullable: false)]
    private $ClassRoomID;

    #[ORM\Column(type: 'string', length: 10)]
    private $DOB;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->FirstName;
    }

    public function setFirstName(string $FirstName): self
    {
        $this->FirstName = $FirstName;

        return $this;
    }

    public function getMiddleName(): ?string
    {
        return $this->MiddleName;
    }

    public function setMiddleName(?string $MiddleName): self
    {
        $this->MiddleName = $MiddleName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->LastName;
    }

    public function setLastName(string $LastName): self
    {
        $this->LastName = $LastName;

        return $this;
    }

    public function getEnrollDate(): ?\DateTimeInterface
    {
        return $this->EnrollDate;
    }

    public function setEnrollDate(\DateTimeInterface $EnrollDate): self
    {
        $this->EnrollDate = $EnrollDate;

        return $this;
    }

    public function getGuardianName(): ?string
    {
        return $this->GuardianName;
    }

    public function setGuardianName(string $GuardianName): self
    {
        $this->GuardianName = $GuardianName;

        return $this;
    }

    public function getGuardianPhoneNumber1(): ?string
    {
        return $this->GuardianPhoneNumber1;
    }

    public function setGuardianPhoneNumber1(string $GuardianPhoneNumber1): self
    {
        $this->GuardianPhoneNumber1 = $GuardianPhoneNumber1;

        return $this;
    }

    public function getGuardianPhoneNumber2(): ?string
    {
        return $this->GuardianPhoneNumber2;
    }

    public function setGuardianPhoneNumber2(?string $GuardianPhoneNumber2): self
    {
        $this->GuardianPhoneNumber2 = $GuardianPhoneNumber2;

        return $this;
    }

    public function getGuardianEmail(): ?string
    {
        return $this->GuardianEmail;
    }

    public function setGuardianEmail(?string $GuardianEmail): self
    {
        $this->GuardianEmail = $GuardianEmail;

        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->ImageUrl;
    }

    public function setImageUrl(?string $ImageUrl): self
    {
        $this->ImageUrl = $ImageUrl;

        return $this;
    }

    public function getImageSize(): ?string
    {
        return $this->ImageSize;
    }

    public function setImageSize(?string $ImageSize): self
    {
        $this->ImageSize = $ImageSize;

        return $this;
    }

    public function getCertificateAttachment1(): ?string
    {
        return $this->CertificateAttachment1;
    }

    public function setCertificateAttachment1(string $CertificateAttachment1): self
    {
        $this->CertificateAttachment1 = $CertificateAttachment1;

        return $this;
    }

    public function getCertificateAttachment2(): ?string
    {
        return $this->CertificateAttachment2;
    }

    public function setCertificateAttachment2(?string $CertificateAttachment2): self
    {
        $this->CertificateAttachment2 = $CertificateAttachment2;

        return $this;
    }

    public function getEntryMarks(): ?string
    {
        return $this->EntryMarks;
    }

    public function setEntryMarks(?string $EntryMarks): self
    {
        $this->EntryMarks = $EntryMarks;

        return $this;
    }

    public function getEntryGrade(): ?string
    {
        return $this->EntryGrade;
    }

    public function setEntryGrade(?string $EntryGrade): self
    {
        $this->EntryGrade = $EntryGrade;

        return $this;
    }

    public function getSchoolID(): ?InstitutionSetup
    {
        return $this->SchoolID;
    }

    public function setSchoolID(?InstitutionSetup $SchoolID): self
    {
        $this->SchoolID = $SchoolID;

        return $this;
    }

    public function getClassRoomID(): ?SchoolClassRoomsHeader
    {
        return $this->ClassRoomID;
    }

    public function setClassRoomID(?SchoolClassRoomsHeader $ClassRoomID): self
    {
        $this->ClassRoomID = $ClassRoomID;

        return $this;
    }

    public function getDOB(): ?string
    {
        return $this->DOB;
    }

    public function setDOB(string $DOB): self
    {
        $this->DOB = $DOB;

        return $this;
    }
}
