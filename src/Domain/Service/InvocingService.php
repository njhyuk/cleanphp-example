<?php

declare(strict_types=1);

namespace CleanPhp\Invoicer\Domain\Service;

use CleanPhp\Invoicer\Domain\Factory\InvoiceFactory;
use CleanPhp\Invoicer\Domain\Repository\OrderRepositoryInterface;

class InvocingService
{
    /** @var OrderRepositoryInterface  */
    private OrderRepositoryInterface $orderRepository;

    /** @var InvoiceFactory  */
    private InvoiceFactory $invoiceFactory;

    public function __construct(OrderRepositoryInterface $orderRepository, InvoiceFactory $invoiceFactory)
    {
        $this->orderRepository = $orderRepository;
        $this->invoiceFactory = $invoiceFactory;
    }

    public function generateInvoices(): array {
        $orders = $this->orderRepository->getUninvoicedOrders();

        $invoices = [];

        foreach ($orders as $order) {
            $invoices[] = $this->invoiceFactory->createFromOrder($order);
        }

        return $invoices;
    }
}
