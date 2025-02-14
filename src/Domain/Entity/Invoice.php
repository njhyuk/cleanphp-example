<?php

declare(strict_types=1);

namespace CleanPhp\Invoicer\Domain\Entity;

class Invoice
{
    protected Order $order;
    protected \DateTime $invoiceDate;
    protected int $total;

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function setOrder(Order $order): Invoice
    {
        $this->order = $order;
        return $this;
    }

    public function getInvoiceDate(): \DateTime
    {
        return $this->invoiceDate;
    }

    public function setInvoiceDate(\DateTime $invoiceDate): Invoice
    {
        $this->invoiceDate = $invoiceDate;
        return $this;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function setTotal(int $total): Invoice
    {
        $this->total = $total;
        return $this;
    }
}
