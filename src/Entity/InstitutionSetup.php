<?php

namespace App\Entity;

use App\Repository\InstitutionSetupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Config\TwigExtra\StringConfig;

#[ORM\Entity(repositoryClass: InstitutionSetupRepository::class)]
class InstitutionSetup
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "CUSTOM")]
    #[ORM\CustomIdGenerator(class: "App\Service\CompanyNextNumbers")]
    #[ORM\Column(type: 'string',length: 72)]
    private $id;

    #[ORM\Column(type: 'string', length: 22)]
    private $IDInitials;

    #[ORM\Column(type: 'string', length: 255)]
    private $Name;

    #[ORM\Column(type: 'string', length: 13)]
    private $CellPhone1;

    #[ORM\Column(type: 'string', length: 13, nullable: true)]
    private $CellPhone2;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Email;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $WebsiteURl;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $LogoURL;

    #[ORM\Column(type: 'integer')]
    private $NoOfLevels;

    #[ORM\Column(type: 'integer')]
    private $NoOfStreamsPerLevel;

    #[ORM\Column(type: 'string', length: 10, nullable: true)]
    private $Zip;

    #[ORM\Column(type: 'string', length: 10, nullable: true)]
    private $City;

    #[ORM\Column(type: 'string', length: 10, nullable: true)]
    private $State;

    #[ORM\Column(type: 'string', length: 32)]
    private $CompanyID;

    #[ORM\Column(type: 'string', length: 32)]
    private $BranchID;



    public function getId(): ?string
    {
        return $this->id;
    }

    public function getIDInitials(): ?string
    {
        return $this->IDInitials;
    }

    public function setIDInitials(string $IDInitials): self
    {
        $this->IDInitials = $IDInitials;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getCellPhone1(): ?string
    {
        return $this->CellPhone1;
    }

    public function setCellPhone1(string $CellPhone1): self
    {
        $this->CellPhone1 = $CellPhone1;

        return $this;
    }

    public function getCellPhone2(): ?string
    {
        return $this->CellPhone2;
    }

    public function setCellPhone2(?string $CellPhone2): self
    {
        $this->CellPhone2 = $CellPhone2;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(?string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getWebsiteURl(): ?string
    {
        return $this->WebsiteURl;
    }

    public function setWebsiteURl(?string $WebsiteURl): self
    {
        $this->WebsiteURl = $WebsiteURl;

        return $this;
    }

    public function getLogoURL(): ?string
    {
        return $this->LogoURL;
    }

    public function setLogoURL(?string $LogoURL): self
    {
        $this->LogoURL = $LogoURL;

        return $this;
    }

    public function getNoOfLevels(): ?int
    {
        return $this->NoOfLevels;
    }

    public function setNoOfLevels(int $NoOfLevels): self
    {
        $this->NoOfLevels = $NoOfLevels;

        return $this;
    }

    public function getNoOfStreamsPerLevel(): ?int
    {
        return $this->NoOfStreamsPerLevel;
    }

    public function setNoOfStreamsPerLevel(int $NoOfStreamsPerLevel): self
    {
        $this->NoOfStreamsPerLevel = $NoOfStreamsPerLevel;

        return $this;
    }

    public function getZip(): ?string
    {
        return $this->Zip;
    }

    public function setZip(?string $Zip): self
    {
        $this->Zip = $Zip;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->City;
    }

    public function setCity(?string $City): self
    {
        $this->City = $City;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->State;
    }

    public function setState(?string $State): self
    {
        $this->State = $State;

        return $this;
    }

    /**
     * @return Collection<int, StudentInformation>
     */
    public function getStudentsInfo(): Collection
    {
        return $this->StudentsInfo;
    }

    public function addStudentsInfo(StudentInformation $studentsInfo): self
    {
        if (!$this->StudentsInfo->contains($studentsInfo)) {
            $this->StudentsInfo[] = $studentsInfo;
            $studentsInfo->setSchoolID($this);
        }

        return $this;
    }

    public function removeStudentsInfo(StudentInformation $studentsInfo): self
    {
        if ($this->StudentsInfo->removeElement($studentsInfo)) {
            // set the owning side to null (unless already changed)
            if ($studentsInfo->getSchoolID() === $this) {
                $studentsInfo->setSchoolID(null);
            }
        }

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
