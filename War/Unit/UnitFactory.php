<?php

namespace War\Unit;

//
class UnitFactory
{

    private static array $types = [];

    public static function addType(string $name, int $health, int $armour, int $damage)
    {
        self::$types[$name] = [$health, $armour, $damage];
    }

    public static function createArmy(string $name): AbstractUnit
    {
        return (new AbstractUnit)->spawn($name, 0, 0, 0);
    }

    public static function add(AbstractUnit $unit, string $type, int $count)
    {
        $cohort = (new AbstractUnit)->spawn('cohort', 0, 0,0 );
        $params = self::$types[$type];

        for($i = 0; $i < $count; $i++) {
            $cohort->addChild((new AbstractUnit)->spawn($type, $params[0], $params[1], $params[2]));
        }

        $unit->addChild($cohort);
    }

    public static function addInfantry(AbstractUnit $unit, int $count)
    {
        self::add($unit, 'infantry', $count);
    }

    public static function addArchers(AbstractUnit $unit, int $count)
    {
        self::add($unit, 'archer', $count);
    }

    public static function addCavalry(AbstractUnit $unit, int $count)
    {
        self::add($unit, 'cavalry', $count);
    }

}
