<?php

namespace War\Unit;

class MultiplyUnit implements UnitInterface
{

    private UnitInterface $unit;

    private int $count;

    public function __construct(UnitInterface $unit, int $count)
    {
        $this->unit  = $unit;
        $this->count = $count;
    }

    public function getName(): string
    {
        return $this->unit->getName()."×".$this->count;
    }

    public function getHealth(): int
    {
        return $this->unit->getHealth() * $this->count;
    }

    public function getArmour(): int
    {
        return $this->unit->getArmour() * $this->count;
    }

    public function getDamage(): int
    {
        return $this->unit->getDamage() * $this->count;
    }

}
