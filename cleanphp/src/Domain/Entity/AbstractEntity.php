<?php

declare(strict_types=1);

namespace CleanPhp\Invoicer\Domain\Entity;

class AbstractEntity
{
    protected int $id;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): AbstractEntity
    {
        $this->id = $id;
        return $this;
    }
}
