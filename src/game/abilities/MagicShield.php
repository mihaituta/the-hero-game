<?php

namespace TheHeroGame\Game\Abilities;
use TheHeroGame\Game\Entities\Entity;

class MagicShield extends Ability {

    /**
     * MagicShield constructor.
     */
    public function __construct()
    {
        $this->setName("Magic Shield");
        $this->setChance(10);
        $this->setType(self::TYPE_DEFENCE);
    }

    function applyAbility(Entity $entity, $damage){
        $chance = mt_rand(1,100);
        //echo "Chance of Magic Shield ability: " . $chance . " (has to be <= " . $this->getChance() . ")" . PHP_EOL;
        if($chance <= $this->getChance()){
            $damage = $damage / 2;
            echo $entity->getName() . " used the " . $this->getName() . " ability " . PHP_EOL;
        }
        return $damage;
    }
}