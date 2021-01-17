<?php

declare(strict_types=1);

namespace CleanPhp\Invoicer\Domain\Service;

use CleanPhp\Invoicer\Domain\Repository\OrderRepositoryInterface;

class InvocingService
{
    /** @var OrderRepositoryInterface  */
    private OrderRepositoryInterface $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function generateInvoices() {
        $orders = $this->orderRepository->getUninvoicedOrders();
    }
}
