<?php

namespace App\BoundedContext\User\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name:'pnu_group')]
#[ORM\Entity]
class Group
{
    #[ORM\Id, ORM\Column, ORM\GeneratedValue]
    protected ?int $id = null;

    #[ORM\Column(length: 100, unique: true, nullable: false)]
    protected string $name = '';

    #[ORM\Column(type: 'array')]
    protected array $roles = [];

    public function __toString()
    {
        return sprintf('%s [%d]', $this->getName(), $this->getId());
    }

    public function __construct($name, array $roles = [])
    {
        $this->name = $name;
        $this->roles = $roles;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function hasRole($role): bool
    {
        return in_array(strtoupper($role), $this->roles, true);
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function removeRole($role): self
    {
        if (false !== $key = array_search(strtoupper($role), $this->roles, true)) {
            unset($this->roles[$key]);
            $this->roles = array_values($this->roles);
        }

        return $this;
    }

    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }
}
