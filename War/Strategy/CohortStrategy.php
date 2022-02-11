<?php

namespace War\Strategy;

use War\Unit\AbstractUnit;

class CohortStrategy extends StrategyAbstract
{

    public function init(): void
    {
        $this->state['i'] = 0;

        $this->state['r1'] = [];
        foreach ($this->unit1->getChildren() as $row) {
            $this->state['r1'][] = [
                'h' => $row->getHealth() + $row->getArmour(),
                'd' => $row->getDamage(),
            ];
        }

        $this->state['r2'] = [];
        foreach ($this->unit2->getChildren() as $row) {
            $this->state['r2'][] = [
                'h' => $row->getHealth() + $row->getArmour(),
                'd' => $row->getDamage(),
            ];
        }
    }

    public function execute(): void
    {
        $this->state['r1'][$this->state['i']]['h'] -= $this->state['r2'][$this->state['i']]['d'];
        $this->state['r2'][$this->state['i']]['h'] -= $this->state['r1'][$this->state['i']]['d'];

        if ($this->state['r1'][$this->state['i']]['h'] < 0 || $this->state['r2'][$this->state['i']]['h'] < 0) {
            $this->state['i']++;
        }
    }

    public function canFight(): bool
    {
        return $this->state['i'] < sizeof($this->state['r1']) && $this->state['i'] < sizeof($this->state['r2']);
    }

    public function getHealth1(): int
    {
        $h = 0;

        foreach ($this->state['r1'] as $row) {
            $h += $row['h'];
        }

        return $h;
    }

    public function getHealth2(): int
    {
        $h = 0;

        foreach ($this->state['r2'] as $row) {
            $h += $row['h'];
        }

        return $h;
    }

}
