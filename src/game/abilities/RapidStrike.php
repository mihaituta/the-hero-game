<?php

namespace TheHeroGame\Game\Abilities;
use TheHeroGame\Game\Entities\Entity;

class RapidStrike extends Ability {

    /**
     * RapidStrike constructor.
     */
    public function __construct()
    {
        $this->setName("Rapid Strike");
        $this->setChance(20);
        $this->setType(self::TYPE_ATTACK);
    }

    function applyAbility(Entity $entity, $damage){
        $chance = mt_rand(1,100);
        //echo "Chance of Rapid Strike ability: " . $chance . " (has to be <= " . $this->getChance() . ")" . PHP_EOL;
        if($chance <= $this->getChance()){
            $damage = $damage * 2;
            echo $entity->getName() . " used the " . $this->getName() . " ability " . PHP_EOL;
        }
        return $damage;
    }
}