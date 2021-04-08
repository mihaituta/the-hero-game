<?php

namespace TheHeroGame\Game\Entities;
use TheHeroGame\Game\Abilities\Ability;


class Player extends Entity {

    private $abilities = [];
    private $nrOfAbilities = 0;

    /**
     * @return array
     */
    public function getAbilities(): array
    {
        return $this->abilities;
    }

    /**
     * @param array $abilities
     */
    public function setAbilities(array $abilities)
    {
        $this->abilities = $abilities;
    }

    /**
     * @return int
     */
    public function getNrOfAbilities(): int
    {
        return $this->nrOfAbilities;
    }

    /**
     * @param int $nrOfAbilities
     */
    public function setNrOfAbilities(int $nrOfAbilities)
    {
        $this->nrOfAbilities = $nrOfAbilities;
    }

    public function addAbility(ability $Ability){
        $this->abilities[$this->nrOfAbilities++] = $Ability;
    }

    public function dealDamage(Entity $enemy){

        if($enemy->chance($enemy->getLuck())){
            echo $enemy->getName(). " has dodged the attack."  . PHP_EOL;
        }else{
            $damage = $this->getStrength() - $enemy->getDefence();
            foreach ($this->getAbilities() as $ability){
                if($ability->getType() == Ability::TYPE_ATTACK){
                    $damage = $ability->applyAbility($this, $damage);
                }
            }
            $enemy->takeDamage($damage);
        }
    }

    public function takeDamage($damage)
    {
        foreach ($this->getAbilities() as $ability) {
            if ($ability->getType() == Ability::TYPE_DEFENCE) {
                $damage = $ability->applyAbility($this, $damage);
            }
        }
        parent::takeDamage($damage);
    }
}