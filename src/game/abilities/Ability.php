<?php

namespace TheHeroGame\Game\Abilities;

class Ability
{
    const TYPE_ATTACK = 0;
    const TYPE_DEFENCE = 1;

    private $name;
    private $chance;
    private $type;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getChance()
    {
        return $this->chance;
    }

    /**
     * @param mixed $chance
     */
    public function setChance($chance)
    {
        $this->chance = $chance;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}