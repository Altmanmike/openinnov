<?php

namespace App\Entity;

use App\Repository\SavingsGoalsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SavingsGoalsRepository::class)]
class SavingsGoals
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'savingsGoals')]
    private ?User $User = null;

    #[ORM\Column]
    private ?float $AmountTarget = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Description = null;

    #[ORM\Column()]
    private ?\DateTimeImmutable $DateTargetDesired = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): static
    {
        $this->User = $User;

        return $this;
    }

    public function getAmountTarget(): ?float
    {
        return $this->AmountTarget;
    }

    public function setAmountTarget(float $AmountTarget): static
    {
        $this->AmountTarget = $AmountTarget;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function getDateTargetDesired(): ?\DateTimeImmutable
    {
        return $this->DateTargetDesired;
    }

    public function setDateTargetDesired(\DateTimeImmutable $DateTargetDesired): static
    {
        $this->DateTargetDesired = $DateTargetDesired;

        return $this;
    }
}
