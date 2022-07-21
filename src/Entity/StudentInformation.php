<?php

namespace App\Entity;

use App\Repository\StudentInformationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: StudentInformationRepository::class)]
#[Vich\Uploadable]
class StudentInformation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $StudentID;

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


    #[ORM\ManyToOne(targetEntity: SchoolClassRoomsHeader::class, inversedBy: 'ClassRoomStudents')]
    #[ORM\JoinColumn(nullable: false)]
    private $ClassRoomID;

    #[ORM\Column(type: 'string', length: 10)]
    private $DOB;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private $UpdatedAt;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $CertificateAttachmentSize;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $CertificateAttachmentSize2;

    #[Vich\UploadableField(mapping: 'student_information', fileNameProperty: 'ImageUrl', size: 'ImageSize')]
    private ?File $PhotoFile;

    #[Vich\UploadableField(mapping: 'student_information', fileNameProperty: 'CertificateAttachment1', size: 'CertificateAttachmentSize')]
    private ?File $CertificateFile1;

    #[Vich\UploadableField(mapping: 'student_information', fileNameProperty: 'CertificateAttachment1', size: 'CertificateAttachmentSize2')]
    private ?File $CertificateFile2;

    #[ORM\ManyToMany(targetEntity: CourseHeader::class, inversedBy: 'EnrolledStudents')]
    private $EntrySubjects;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $StudentEmail;

    #[ORM\Column(type: 'text', nullable: true)]
    private $StudentHomeAddress;

    #[ORM\Column(type: 'string', length: 32, nullable: true)]
    private $StudentGender;

    #[ORM\Column(type: 'string', length: 13, nullable: true)]
    private $StudentPhoneNumber;

    #[ORM\Column(type: 'string', length: 32)]
    private $CompanyID;

    #[ORM\Column(type: 'string', length: 32)]
    private $BranchID;

    public function __construct()
    {
        $this->EntrySubjects = new ArrayCollection();
    }





    public function getStudentID(): ?int
    {
        return $this->StudentID;
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

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->UpdatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $UpdatedAt): self
    {
        $this->UpdatedAt = $UpdatedAt;

        return $this;
    }

    public function getCertificateAttachmentSize(): ?string
    {
        return $this->CertificateAttachmentSize;
    }

    public function setCertificateAttachmentSize(?string $CertificateAttachmentSize): self
    {
        $this->CertificateAttachmentSize = $CertificateAttachmentSize;

        return $this;
    }

    public function getCertificateAttachmentSize2(): ?string
    {
        return $this->CertificateAttachmentSize2;
    }

    public function setCertificateAttachmentSize2(?string $CertificateAttachmentSize2): self
    {
        $this->CertificateAttachmentSize2 = $CertificateAttachmentSize2;

        return $this;
    }

    /*
 * STUDENT PHOTO & ATTACHMENTS
 * */


    public function setPhotoFile(?File $file = null): void
    {
        $this->PhotoFile = $file;
        if (null !== $file) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->UpdatedAt = new \DateTimeImmutable();
        }
    }

    public function setCertificateFile1(?File $file = null): void
    {
        $this->CertificateFile1 = $file;
        if (null !== $file) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->UpdatedAt = new \DateTimeImmutable();
        }
    }

    public function setCertificateFile2(?File $file = null): void
    {
        $this->CertificateFile2 = $file;
        if (null !== $file) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->UpdatedAt = new \DateTimeImmutable();
        }
    }

    public function CertificateFile1(): ?File
    {
        return $this->CertificateFile1;
    }

    public function CertificateFile2(): ?File
    {
        return $this->CertificateFile2;
    }

    public function getPhotoFile(): ?File
    {
        return $this->PhotoFile;
    }
    /*
     * =========END PHOTO & ATTACHMENTS========*/

    /**
     * @return Collection<int, CourseHeader>
     */
    public function getEntrySubjects(): Collection
    {
        return $this->EntrySubjects;
    }

    public function addEntrySubject(CourseHeader $entrySubject): self
    {
        if (!$this->EntrySubjects->contains($entrySubject)) {
            $this->EntrySubjects[] = $entrySubject;
        }

        return $this;
    }

    public function removeEntrySubject(CourseHeader $entrySubject): self
    {
        $this->EntrySubjects->removeElement($entrySubject);

        return $this;
    }

    public function getStudentEmail(): ?string
    {
        return $this->StudentEmail;
    }

    public function setStudentEmail(?string $StudentEmail): self
    {
        $this->StudentEmail = $StudentEmail;

        return $this;
    }

    public function getStudentHomeAddress(): ?string
    {
        return $this->StudentHomeAddress;
    }

    public function setStudentHomeAddress(?string $StudentHomeAddress): self
    {
        $this->StudentHomeAddress = $StudentHomeAddress;

        return $this;
    }

    public function getStudentGender(): ?string
    {
        return $this->StudentGender;
    }

    public function setStudentGender(?string $StudentGender): self
    {
        $this->StudentGender = $StudentGender;

        return $this;
    }

    public function getStudentPhoneNumber(): ?string
    {
        return $this->StudentPhoneNumber;
    }

    public function setStudentPhoneNumber(?string $StudentPhoneNumber): self
    {
        $this->StudentPhoneNumber = $StudentPhoneNumber;

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
