<?php

namespace App\Entity;

use App\Repository\TipsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TipsRepository::class)]
class Tips
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'tips')]
    private ?Budgets $BudgetsTarget = null;

    #[ORM\ManyToOne(inversedBy: 'tips')]
    private ?SavingsGoals $SavingsGoalsTarget = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBudgetsTarget(): ?Budgets
    {
        return $this->BudgetsTarget;
    }

    public function setBudgetsTarget(?Budgets $BudgetsTarget): static
    {
        $this->BudgetsTarget = $BudgetsTarget;

        return $this;
    }

    public function getSavingsGoals(): ?SavingsGoals
    {
        return $this->SavingsGoalsTarget;
    }

    public function setSavingsGoals(?SavingsGoals $SavingsGoalsTarget): static
    {
        $this->SavingsGoalsTarget = $SavingsGoalsTarget;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }
}
