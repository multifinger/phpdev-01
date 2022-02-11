<?php

spl_autoload_register(function ($class) {
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';
    if (file_exists($file)) {
        require $file;
        return true;
    }
    return false;
});

use War\Unit\UnitFactory;
use War\Strategy;
use War\Battle;
use War\Modifier;

// Указываем свойства юнитов
UnitFactory::addType('infantry', 100, 10, 10);
UnitFactory::addType('archer',   100,  5, 20);
UnitFactory::addType('cavalry',  300, 30, 30);

// Создаём две армии
$army1 = UnitFactory::createArmy('Александр Ярославич');
UnitFactory::addInfantry($army1, 200);
UnitFactory::addArchers($army1, 30);
UnitFactory::addCavalry($army1, 15);
$army2 = UnitFactory::createArmy('Ульф Фасе');
UnitFactory::addInfantry($army2, 90);
UnitFactory::addArchers($army2, 65);
UnitFactory::addCavalry($army2, 25);

// Конфигурируем условия и запускаем битву.
$battle = new Battle(Strategy\SimpleStrategy::class, $army1, $army2);
//$battle = new Battle(Strategy\CohortStrategy::class, $army1, $army2);
//$battle->addModifier(Modifier\TerrainIce::class);
$battle->addModifier(Modifier\WeatherRain::class);
$battle->init();
while ($battle->canFight()) $battle->fight();

echo strtr(file_get_contents('./War/template.html'), $battle->getVars());
