<?php

class Car
{
    public static function run($lsb = false)
    {
        if ($lsb) {
            return static::getName();
        } else {
            return self::getName();
        }
    }

    private static function getName()
    {
        return 'Car';
    }
}

class Toyota extends Car
{
    public static function getName()
    {
        return 'Toyota';
    }
}
echo '<pre>';
echo "Car::run LSB FALSE: ";
echo Car::run();
echo "\n";

echo "Car::run LSB TRUE: ";
echo Car::run(true);
echo "\n";

echo "Toyota::run LSB FALSE: ";
echo Toyota::run();
echo "\n";

echo "Toyota::run LSB TRUE: ";
echo Toyota::run(true);
echo "\n";
