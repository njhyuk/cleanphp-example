<?php

declare(strict_types=1);

use CleanPhp\Invoicer\Domain\Entity\Order;
use CleanPhp\Invoicer\Domain\Factory\InvoiceFactory;

describe('InvoiceFactory', function () {
    describe('->createFromOrder()', function () {
        it('should return an order object', function () {
            $order = new Order();
            $order->setTotal(1);

            $factory = new InvoiceFactory();
            $invoice = $factory->createFromOrder($order);

            expect($invoice)->to->be->instanceof(\CleanPhp\Invoicer\Domain\Entity\Invoice::class);
        });

        it('should set the total of the invoice', function () {
            $order = new Order();
            $order->setTotal(500);

            $factory = new InvoiceFactory();
            $invoice = $factory->createFromOrder($order);

            expect($invoice->getTotal())->to->equal(500);
        });

        it('should associate the Order to the Invoice', function () {
            $order = new Order();
            $order->setTotal(1);

            $factory = new InvoiceFactory();
            $invoice = $factory->createFromOrder($order);

            expect($invoice->getOrder())->to->equal($order);
        });

        it('should set the date of the Invoice', function () {
            $order = new Order();
            $order->setTotal(1);

            $factory = new InvoiceFactory();
            $invoice = $factory->createFromOrder($order);

            expect($invoice->getInvoiceDate())->to->instanceof(\DateTime::class);
        });
    });
});
