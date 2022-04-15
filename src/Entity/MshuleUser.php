<?php

namespace App\Entity;

use App\Repository\MshuleUserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: MshuleUserRepository::class)]
#[UniqueEntity(fields: ['username'], message: 'There is already an account with this username')]
class MshuleUser implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private $username;

    #[ORM\Column(type: 'json',nullable: true)]
    private $roles = [];

    #[ORM\Column(type: 'string')]
    private $password;

    #[ORM\Column(type: 'string', length: 22)]
    private $FirstName;

    #[ORM\Column(type: 'string', length: 22, nullable: true)]
    private $MiddleName;

    #[ORM\Column(type: 'string', length: 22, nullable: true)]
    private $LastName;

    #[ORM\Column(type: 'string', length: 122)]
    private $EmployeeNumber;

    #[ORM\Column(type: 'string', length: 4)]
    private $Salutation;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $IsEmployee;

    #[ORM\Column(type: 'string', length: 100)]
    private $Designation;

    #[ORM\Column(type: 'string', length: 255)]
    private $Email;

    #[ORM\Column(type: 'boolean')]
    private $isVerified = false;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function setLastName(?string $LastName): self
    {
        $this->LastName = $LastName;

        return $this;
    }

    public function getEmployeeNumber(): ?string
    {
        return $this->EmployeeNumber;
    }

    public function setEmployeeNumber(string $EmployeeNumber): self
    {
        $this->EmployeeNumber = $EmployeeNumber;

        return $this;
    }

    public function getSalutation(): ?string
    {
        return $this->Salutation;
    }

    public function setSalutation(string $Salutation): self
    {
        $this->Salutation = $Salutation;

        return $this;
    }

    public function getIsEmployee(): ?bool
    {
        return $this->IsEmployee;
    }

    public function setIsEmployee(?bool $IsEmployee): self
    {
        $this->IsEmployee = $IsEmployee;

        return $this;
    }

    public function getDesignation(): ?string
    {
        return $this->Designation;
    }

    public function setDesignation(string $Designation): self
    {
        $this->Designation = $Designation;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }
}
