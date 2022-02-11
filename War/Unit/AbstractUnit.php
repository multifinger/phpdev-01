<?php

namespace War\Unit;

// Composite
class AbstractUnit /* Unit not abstract !!! */
{

    protected string $name;

    protected int $health;
    protected int $armour;
    protected int $damage;

    /** @var self[] */
    protected array $children = [];

    //------------------------------------------------------------------------------------------------------------------

    public function spawn(string $name, int $health, int $armour, int $damage): self
    {
        $this->name   = $name;
        $this->health = $health;
        $this->armour = $armour;
        $this->damage = $damage;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        $result = '';
        if ($this->children) $result .= '[';
        $res = [];
        foreach ($this->children as $child) {
            $key = $child->getName().$child->getHealth();
            if (!isset($res[$key])) {
                $res[$key] = ['name' => $child->getName(), 'count' => 0, 'child' => $child->getDescription()];
            }
            $res[$key]['count']++;
        }
        foreach ($res as $r) {
            $result .= "{$r['name']}×{$r['count']}{$r['child']}";
        }
        if ($this->children) $result .= ']';

        return $result;
    }

    public function getHealth(): int
    {
        $health = $this->health;

        foreach ($this->children as $child) {
            $health += $child->getHealth();
        }

        return $health;
    }

    public function getArmour(): int
    {
        $armour = $this->armour;

        foreach ($this->children as $child) {
            $armour += $child->getArmour();
        }

        return $armour;
    }

    public function getDamage(): int
    {
        $damage = $this->damage;

        foreach ($this->children as $child) {
            $damage += $child->getDamage();
        }

        return $damage;
    }

    //------------------------------------------------------------------------------------------------------------------
    // Composite tree methods

    public function addChild(AbstractUnit $unit)
    {
        $this->children[] = $unit;
    }

    /**
     * @return self[]
     */
    public function getChildren():array
    {
        return $this->children;
    }

    //------------------------------------------------------------------------------------------------------------------
    // Modifier ability

    public function setModifier(string $modifier)
    {
        foreach ($this->children as &$child) {
            $child->setModifier($modifier);
            $child = new $modifier($child);
        }
    }

}
