<?php

declare(strict_types=1);

namespace CleanPhp\Invoicer\Domain\Repository;

use CleanPhp\Invoicer\Domain\Entity\AbstractEntity;

interface RepositoryInterface
{
    public function getById(int $id);
    public function getAll(): array;
    public function persist(AbstractEntity $entity): self;
    public function begin(): self;
    public function commit(): self;
}
