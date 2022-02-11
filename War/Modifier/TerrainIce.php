<?php

namespace War\Modifier;

use War\Unit\UnitModifier;

class TerrainIce extends UnitModifier
{

    public function getArmour(): int
    {
        if ($this->unit->getName() === 'cavalry') {
            return 0;
        }

        return parent::getArmour();
    }

}
