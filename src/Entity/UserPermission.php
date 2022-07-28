<?php

namespace App\Entity;

use App\Repository\UserPermissionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserPermissionRepository::class)]
class UserPermission
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $PermName;

    #[ORM\Column(type: 'string', length: 255)]
    private $ResourceEntity;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPermName(): ?string
    {
        return $this->PermName;
    }

    public function setPermName(string $PermName): self
    {
        $this->PermName = $PermName;

        return $this;
    }

    public function getResourceEntity(): ?string
    {
        return $this->ResourceEntity;
    }

    public function setResourceEntity(string $ResourceEntity): self
    {
        $this->ResourceEntity = $ResourceEntity;

        return $this;
    }
}
