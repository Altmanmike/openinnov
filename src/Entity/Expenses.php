<?php

namespace App\Entity;

use App\Repository\ExpensesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExpensesRepository::class)]
class Expenses
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $TotalAmount = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Description = null;

    #[ORM\Column(length: 100)]
    private ?string $PaymentMethod = null;

    #[ORM\Column(length: 100)]
    private ?string $ValidationStatut = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $DateExpense = null;

    #[ORM\ManyToOne(inversedBy: 'expenses')]
    private ?User $User = null;

    #[ORM\ManyToOne(inversedBy: 'expenses')]
    private ?ExpenseCategories $Category = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTotalAmount(): ?float
    {
        return $this->TotalAmount;
    }

    public function setTotalAmount(float $TotalAmount): static
    {
        $this->TotalAmount = $TotalAmount;

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

    public function getPaymentMethod(): ?string
    {
        return $this->PaymentMethod;
    }

    public function setPaymentMethod(string $PaymentMethod): static
    {
        $this->PaymentMethod = $PaymentMethod;

        return $this;
    }

    public function getValidationStatut(): ?string
    {
        return $this->ValidationStatut;
    }

    public function setValidationStatut(string $ValidationStatut): static
    {
        $this->ValidationStatut = $ValidationStatut;

        return $this;
    }

    public function getDateExpense(): ?\DateTimeImmutable
    {
        return $this->DateExpense;
    }

    public function setDateExpense(\DateTimeImmutable $DateExpense): static
    {
        $this->DateExpense = $DateExpense;

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
