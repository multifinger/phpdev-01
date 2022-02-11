<?php

namespace War\Modifier;

use War\Unit\UnitModifier;

class WeatherRain extends UnitModifier
{

    public function getDamage(): int
    {
        if ($this->unit->getName() === 'archer') {
            return round($this->unit->getDamage() / 2);
        }

        return parent::getDamage();
    }

}
