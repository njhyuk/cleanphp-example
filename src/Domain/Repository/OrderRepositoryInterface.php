<?php

declare(strict_types=1);

namespace CleanPhp\Invoicer\Domain\Repository;

interface OrderRepositoryInterface extends RepositoryInterface
{
    public function getUninvoicedOrders(): array;
}
