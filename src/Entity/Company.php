<?php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Company
{
    #[Assert\NotBlank]
    protected $companySymbol;

    #[Assert\NotBlank]
    #[Assert\Date(
        message: 'The start_date {{ value }} is not a valid.',
    )]
    #[Assert\Type(\DateTime::class)]
    protected $startDate;

    #[Assert\NotBlank]
    #[Assert\Date(
        message: 'The end_date {{ value }} is not a valid.',
    )]
    #[Assert\Type(\DateTime::class)]
    protected $endDate;

    #[Assert\NotBlank]
    #[Assert\Email(
        message: 'The email {{ value }} is not a valid email.',
    )]
    protected $email;

    public function getCompanySymbol(): string
    {
        return $this->companySymbol;
    }

    public function setCompanySymbol(string $companySymbol): void
    {
        $this->companySymbol = $companySymbol;
    }

    public function getStartDate(): ?\DateTime
    {
        return $this->startDate;
    }

    public function setStartDate(?\DateTime $startDate): void
    {
        $this->startDate = $startDate;
    }

    public function getEndDate(): ?\DateTime
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTime $endDate): void
    {
        $this->endDate = $endDate;
    }

    public function getEmail() : string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
}