<?php

namespace TheHeroGame\Game\Entities;

class Entity{
    protected $name;
    protected $health;
    protected $strength;
    protected $defence;
    protected $speed;
    protected $luck;

    public function __construct($name, $minHealth, $maxHealth, $minStrength, $maxStrength, $minDefence, $maxDefence, $minSpeed, $maxSpeed, $minLuck, $maxLuck)
    {
        $this->name = $name;
        $this->health = mt_rand($minHealth, $maxHealth);
        $this->strength = mt_rand($minStrength, $maxStrength);
        $this->defence = mt_rand($minDefence, $maxDefence);
        $this->speed = mt_rand($minSpeed, $maxSpeed);
        $this->luck = mt_rand($minLuck, $maxLuck);
    }

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
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * @param int $health
     */
    public function setHealth(int $health)
    {
        $this->health = $health;
    }

    /**
     * @return int
     */
    public function getStrength(): int
    {
        return $this->strength;
    }

    /**
     * @param int $strength
     */
    public function setStrength(int $strength)
    {
        $this->strength = $strength;
    }

    /**
     * @return int
     */
    public function getDefence(): int
    {
        return $this->defence;
    }

    /**
     * @param int $defence
     */
    public function setDefence(int $defence)
    {
        $this->defence = $defence;
    }

    /**
     * @return int
     */
    public function getSpeed(): int
    {
        return $this->speed;
    }

    /**
     * @param int $speed
     */
    public function setSpeed(int $speed)
    {
        $this->speed = $speed;
    }

    /**
     * @return int
     */
    public function getLuck(): int
    {
        return $this->luck;
    }

    /**
     * @param int $luck
     */
    public function setLuck(int $luck)
    {
        $this->luck = $luck;
    }

    public function isDead(){
        return $this->getHealth() < 0;
    }

    public function printStats(){
        echo "Name: ".$this->getName() . PHP_EOL;
        echo "Health: ".$this->getHealth() . PHP_EOL;
        echo "Strength: ".$this->getStrength() . PHP_EOL;
        echo "Defence: ".$this->getDefence() . PHP_EOL;
        echo "Speed: ".$this->getSpeed() . PHP_EOL;
        echo "Luck: ".$this->getLuck()."%" . PHP_EOL;
        echo PHP_EOL;
    }

    public function dealDamage(Entity $enemy){

        if($enemy->chance($enemy->getLuck())){
            echo $enemy->getName(). " has dodged the attack."  . PHP_EOL;
        }else{
            $damage = $this->getStrength() - $enemy->getDefence();
            $enemy->takeDamage($damage);
        }
    }

    function takeDamage($damage){
        $this->setHealth($this->getHealth() - $damage);
        echo $this->getName(). " took " . $damage . " points of damage and now has " . ($this->isDead() ? "0" : $this->getHealth()) . " health left."  . PHP_EOL;
    }

    function chance($chanceNumber){
        $chance = mt_rand(1, 100);
        //echo "Chance number of dodge: ". $chance . " (has to be <= " .$chanceNumber . ")" . PHP_EOL;
        return($chance <= $chanceNumber);
    }
}