<?php

namespace War\Unit;

/**
 * Интерфейс военной единицы, определяем какие методы она должна реализовывать
 */
interface UnitInterface
{

    public function getName(): string;

    public function getHealth(): int;
    public function getArmour(): int;
    public function getDamage(): int;

}
