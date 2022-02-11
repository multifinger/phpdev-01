<?php

namespace War;

use War\Strategy\StrategyAbstract;

use War\Unit\AbstractUnit;
use War\Unit\UnitInterface;

class Battle
{

    private int $duration = 0;

    private StrategyAbstract $strategy;

    //public function __construct(string $strategy, UnitInterface $unit1, UnitInterface $unit2)
    public function __construct(string $strategy, AbstractUnit $unit1, AbstractUnit $unit2)
    {
        $this->strategy = new $strategy($unit1, $unit2);
    }

    public function init()
    {
        $this->strategy->init();
    }

    public function canFight(): bool
    {
        return $this->strategy->canFight();
    }

    public function fight()
    {
        $this->duration++;
        $this->strategy->execute();
    }

    public function getVars(): array
    {
        return array_merge($this->strategy->getVars(), [
            '%duration%' => $this->duration,
        ]);
    }

    public function addModifier(string $class)
    {
        $this->strategy->addModifier($class);
    }

}
