<?php
/**
 * Created by PhpStorm.
 * User: nicoleta.ionescu
 * Date: 4/16/2015
 * Time: 6:02 PM
 */
class CreatureCard extends CardsAbstract
{

    protected $hp;
    protected $attack;
    protected $cost;
    protected $creature;
    protected $flavorText;

    protected $_prop = array(
                        "hp",
                        "attack",
                        "cost",
                        "creature",
                        "flavorText",
                        );

    /**
     *Setting of a Card with random Values
     */
    function __construct()
    {
       $this->setType();
       $this->setCard();

    }

    /**
     * i don't know if i needed anymore but it's there just in case
     */
    public function setType($_type="creature")
    {
        $this->_type = $_type;
    }





}



