<?php

namespace War\Unit;

class _UnitFactory
{

    public static function createArmy(string $name): CompositeUnit
    {
        return new CompositeUnit($name);
    }

    public static function addInfantry(CompositeUnit $unit, int $count)
    {
        $unit->add(new MultiplyUnit(new InfantryUnit, $count));
    }

    public static function addArchers(CompositeUnit $unit, int $count)
    {
        $unit->add(new MultiplyUnit(new ArcherUnit, $count));
    }

    public static function addCavalry(CompositeUnit $unit, int $count)
    {
        $unit->add(new MultiplyUnit(new CavalryUnit, $count));
    }

}
