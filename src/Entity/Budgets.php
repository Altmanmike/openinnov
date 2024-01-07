<?php

namespace App\Entity;

use App\Repository\BudgetsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BudgetsRepository::class)]
class Budgets
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $allocatedTotalAmount = null;

    #[ORM\Column(length: 100)]
    private ?string $period = null;

    #[ORM\Column(length: 100)]
    private ?string $achievementStatut = null;

    #[ORM\OneToOne(inversedBy: 'budgets', cascade: ['persist', 'remove'])]
    private ?User $User = null;

    #[ORM\OneToOne(inversedBy: 'budgets', cascade: ['persist', 'remove'])]
    private ?ExpenseCategories $Category = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAllocatedTotalAmount(): ?float
    {
        return $this->allocatedTotalAmount;
    }

    public function setAllocatedTotalAmount(float $allocatedTotalAmount): static
    {
        $this->allocatedTotalAmount = $allocatedTotalAmount;

        return $this;
    }

    public function getPeriod(): ?string
    {
        return $this->period;
    }

    public function setPeriod(string $period): static
    {
        $this->period = $period;

        return $this;
    }

    public function getAchievementStatut(): ?string
    {
        return $this->achievementStatut;
    }

    public function setAchievementStatut(string $achievementStatut): static
    {
        $this->achievementStatut = $achievementStatut;

        return $this;
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

    public function getCategory(): ?ExpenseCategories
    {
        return $this->Category;
    }

    public function setCategory(?ExpenseCategories $Category): static
    {
        $this->Category = $Category;

        return $this;
    }
}
