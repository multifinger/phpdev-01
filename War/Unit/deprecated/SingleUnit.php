<?php

namespace War\Unit;

abstract class SingleUnit implements UnitInterface
{

    protected string $name;

    protected int $health;
    protected int $armour;
    protected int $damage;

    public function getName(): string
    {
        return $this->name;
    }

    public function getHealth(): int
    {
        return $this->health;
    }

    public function getArmour(): int
    {
        return $this->armour;
    }

    public function getDamage(): int
    {
        return $this->damage;
    }

}
