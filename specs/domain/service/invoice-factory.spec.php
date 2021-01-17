<?php

use CleanPhp\Invoicer\Domain\Repository\OrderRepositoryInterface;
use CleanPhp\Invoicer\Domain\Service\InvocingService;

describe('InvoiceService', function () {
    describe('->generateInvoices()', function () {
        beforeEach(function () {
            $this->repository = $this->getProphet()->prophesize(OrderRepositoryInterface::class);
        });

        it('저장소에 송장이 발행되지 않은 주문을 쿼리해야한다.', function () {
            $this->repository->getUninvoicedOrders()->shouldBeCalled();
            $service = new InvocingService($this->repository->reveal());
            $service->generateInvoices();
        });

        it('송장이 발행되지 않은 각 주문에 대한 송장이 반환되어야 한다.');

        afterEach(function () {
            $this->getProphet()->checkPredictions();
        });

    });
});
