<?php

declare(strict_types=1);

namespace CleanPhp\Invoicer\Domain\Entity;

class Order extends AbstractEntity
{
    protected Customer $customer;
    protected int $orderNumber;
    protected string $description;
    protected int $total;

    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    public function setCustomer(Customer $customer): Order
    {
        $this->customer = $customer;
        return $this;
    }

    public function getOrderNumber(): int
    {
        return $this->orderNumber;
    }

    public function setOrderNumber(int $orderNumber): Order
    {
        $this->orderNumber = $orderNumber;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Order
    {
        $this->description = $description;
        return $this;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function setTotal(int $total): Order
    {
        $this->total = $total;
        return $this;
    }
}
