<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use App\Validator\AllowedDomain;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\Email]
    #[AllowedDomain(['domains' => ['dawan.fr', 'manymore.fr']])]
    private ?string $email = null;

    #[ORM\Column(type: 'space_delimited')]
    private array $groupNames = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    #[Assert\EqualTo('dawan.fr')]
    public function getEmailDomain()
    {
        return strstr($this->email, '@');
    }

    public function getGroupNames(): array
    {
        return $this->groupNames;
    }

    public function setGroupNames(array $groupNames): self
    {
        $normalizedGroupNames = array_map('strtolower', $groupNames);
        $normalizedGroupNames = array_unique($normalizedGroupNames);
        sort($normalizedGroupNames);
        $this->groupNames = $normalizedGroupNames;

        return $this;
    }
}
