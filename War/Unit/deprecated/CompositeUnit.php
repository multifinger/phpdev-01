<?php

namespace War\Unit;

class CompositeUnit implements UnitInterface
{

    private string $name;

    /** @var UnitInterface[]  */
    private array $children = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getDescription($result = []): string
    {
        foreach ($this->children as $child) {
            isset($result[$child->getName()]) ;
        }

        return implode(', ', $result);
    }

    public function add(UnitInterface $unit)
    {
        $this->children[] = $unit;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getHealth(): int
    {
        $health = 0;

        foreach ($this->children as $child) {
            $health += $child->getHealth();
        }

        return $health;
    }

    public function getArmour(): int
    {
        $armour = 0;

        foreach ($this->children as $child) {
            $armour += $child->getArmour();
        }

        return $armour;
    }

    public function getDamage(): int
    {
        $damage = 0;

        foreach ($this->children as $child) {
            $damage += $child->getDamage();
        }

        return $damage;
    }

}
