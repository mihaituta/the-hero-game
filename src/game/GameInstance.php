<?php

namespace TheHeroGame\Game;
use TheHeroGame\Game\Abilities\MagicShield;
use TheHeroGame\Game\Abilities\RapidStrike;
use TheHeroGame\Game\Entities\Entity;
use TheHeroGame\Game\Entities\Player;

class GameInstance{
    public function gameInstance(){

        $player = new Player("Orderus",70,100,70,80,45,55,40,50,10,30);
        $beast = new Entity("Beast",60,90,60,90,40,60,40,60,25,40);

        $player->addAbility(new RapidStrike());
        $player->addAbility(new MagicShield());

        $player->printStats();
        $beast->printStats();

        $nrOfTurns = 20;

        $firstAttacker = null;
        $secondAttacker = null;

        $haveWinner = false;

        //the faster player attacks first
        if($player->getSpeed() > $beast->getSpeed()){
            $firstAttacker = $player;
            $secondAttacker = $beast;
        }else if($player->getSpeed() < $beast->getSpeed()){
            $firstAttacker = $beast;
            $secondAttacker = $player;
        } else {
            //if the players are equally fast, then the luckiest one attacks first
            if($player->getLuck() > $beast->getLuck()){
                $firstAttacker = $player;
                $secondAttacker = $beast;
            }else if($player->getLuck() < $beast->getLuck()){
                $firstAttacker = $beast;
                $secondAttacker = $player;
            } else {
                //if the players are equally lucky then the first attacker is selected randomly
                if(mt_rand(0,1)){
                    $firstAttacker = $player;
                    $secondAttacker = $beast;
                }else{
                    $firstAttacker = $beast;
                    $secondAttacker = $player;
                }
            }
        }

        for($i = 0; $i < $nrOfTurns; $i++){
            echo "Turn " . ($i+1) . PHP_EOL;

            if($i % 2 == 0){
                $firstAttacker->dealDamage($secondAttacker);
            }else{
                $secondAttacker->dealDamage($firstAttacker);
            }

            if($firstAttacker->isDead()){
                echo $secondAttacker->getName() . " has killed " . $firstAttacker->getName() . "." . PHP_EOL;
                $haveWinner = true;
                break;
            }else if($secondAttacker->isDead()){
                echo $firstAttacker->getName() . " has killed " . $secondAttacker->getName() .  "." . PHP_EOL;
                $haveWinner = true;
                break;
            }
        }

        if(!$haveWinner){
            if(!$firstAttacker->isDead() && !$secondAttacker->isDead()){
                echo "Both " . $firstAttacker->getName() . " and " . $secondAttacker->getName() . " are too tired to continue fighting." . PHP_EOL;
            }
        }
    }
}