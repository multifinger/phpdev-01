<?php

namespace War\Strategy;

use War\Unit\AbstractUnit;
use War\Unit\UnitInterface;

class SimpleStrategy extends StrategyAbstract
{

    public function init(): void
    {
        $this->state['h1'] = $this->unit1->getHealth() + $this->unit1->getArmour();
        $this->state['d1'] = $this->unit1->getDamage();
        $this->state['h2'] = $this->unit2->getHealth() + $this->unit2->getArmour();
        $this->state['d2'] = $this->unit2->getDamage();
    }

    public function execute(): void
    {
        $this->state['h1'] -= $this->state['d2'];
        $this->state['h2'] -= $this->state['d1'];
    }

    public function canFight(): bool
    {
        return $this->state['h1'] >= 0 && $this->state['h2'] >= 0;
    }

    public function getHealth1(): int
    {
        return $this->state['h1'];
    }

    public function getHealth2(): int
    {
        return $this->state['h2'];
    }

}
