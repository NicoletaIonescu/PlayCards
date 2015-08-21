<?php
/**
 * Created by PhpStorm.
 * User: nicoleta.ionescu
 * Date: 4/16/2015
 * Time: 6:02 PM
 */
class SpellCard extends CardsAbstract
{
    protected $damage;
    protected $cost;
    protected $name;

    protected $_prop = array(
                            "damage",
                            "cost",
                            "name"
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
     *i don't know if i needed anymore but it's there just in case
     */
    public function setType($_type="spell")
    {
        $this->_type = $_type;
    }







}





