<?php

use CleanPhp\Invoicer\Domain\Entity\Invoice;
use CleanPhp\Invoicer\Domain\Entity\Order;
use CleanPhp\Invoicer\Domain\Factory\InvoiceFactory;
use CleanPhp\Invoicer\Domain\Repository\OrderRepositoryInterface;
use CleanPhp\Invoicer\Domain\Service\InvocingService;

describe('InvoiceService', function () {
    describe('->generateInvoices()', function () {
        beforeEach(function () {
            $this->repository = $this->getProphet()->prophesize(OrderRepositoryInterface::class);
            $this->factory = $this->getProphet()->prophesize(InvoiceFactory::class);
        });

        it('저장소에 송장이 발행되지 않은 주문을 쿼리해야한다.', function () {
            $this->repository->getUninvoicedOrders()->shouldBeCalled();
            $service = new InvocingService(
                $this->repository->reveal(),
                $this->factory->reveal()
            );
            $service->generateInvoices();
        });

        it('송장이 발행되지 않은 각 주문에 대한 송장이 반환되어야 한다.', function () {
            $orders = [(new Order())->setTotal(400)];
            $invoices = [(new Invoice())->setTotal(400)];

            $this->repository->getUninvoicedOrders()->willReturn($orders);
            $this->factory->createFromOrder($orders[0])->willReturn($invoices[0]);

            $service = new InvocingService(
                $this->repository->reveal(),
                $this->factory->reveal()
            );
            $results = $service->generateInvoices();

            expect($results)->to->be->a('array');
            expect($results)->to->have->length(count($orders));
        });

        afterEach(function () {
            $this->getProphet()->checkPredictions();
        });

    });
});
