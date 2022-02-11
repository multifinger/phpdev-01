<?php

namespace War\Unit;

abstract class UnitModifier extends AbstractUnit
{

    protected AbstractUnit $unit;

    public function __construct(AbstractUnit $unit)
    {
        $this->unit = $unit;
        //$this->children = $unit->getChildren();
    }

    public function getName(): string
    {
        return $this->unit->getName();
    }

    public function getDescription(): string
    {
        return $this->unit->getDescription();
    }

    public function getHealth(): int
    {
        return $this->unit->getHealth();
    }

    public function getArmour(): int
    {
        return $this->unit->getArmour();
    }

    public function getDamage(): int
    {
        return $this->unit->getDamage();
    }

    public function getChildren(): array
    {
        return $this->unit->getChildren();
    }

}
