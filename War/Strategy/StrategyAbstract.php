<?php

namespace War\Strategy;

use War\Unit\AbstractUnit;
//use War\Unit\UnitInterface;

abstract class StrategyAbstract
{

    //protected UnitInterface $unit1;
    //protected UnitInterface $unit2;

    protected AbstractUnit $unit1;
    protected AbstractUnit $unit2;

    protected array $state = [];

    //public function __construct(UnitInterface $unit1, UnitInterface $unit2)
    public function __construct(AbstractUnit $unit1, AbstractUnit $unit2)
    {
        $this->unit1 = $unit1;
        $this->unit2 = $unit2;
    }

    abstract public function init(): void;
    abstract public function execute(): void;
    abstract public function canFight(): bool;
    abstract public function getHealth1(): int;
    abstract public function getHealth2(): int;

    public function getVars(): array
    {
        return [
            '%name1%'    => $this->unit1->getName(),
            '%name2%'    => $this->unit2->getName(),
            '%units1%'   => $this->unit1->getDescription(),
            '%units2%'   => $this->unit2->getDescription(),
            '%health1%'  => $this->getHealth1(),
            '%health2%'  => $this->getHealth2(),
            '%result1%'  => $this->getHealth1() > $this->getHealth2() ? 'WINNER' : 'LOSER',
            '%result2%'  => $this->getHealth2() > $this->getHealth1() ? 'WINNER' : 'LOSER',
        ];
    }

    public function addModifier(string $class)
    {
        $this->unit1->setModifier($class);
        $this->unit2->setModifier($class);
        $this->unit1 = new $class($this->unit1);
        $this->unit2 = new $class($this->unit2);
    }

}
