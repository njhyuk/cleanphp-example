<?php

declare(strict_types=1);

namespace CleanPhp\Invoicer\Domain\Entity;

class Customer extends AbstractEntity
{
    protected string $name;
    protected string $email;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Customer
    {
        $this->name = $name;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): Customer
    {
        $this->email = $email;
        return $this;
    }
}
