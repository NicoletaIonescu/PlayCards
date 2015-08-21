<?php
/**
 * Created by PhpStorm.
 * User: nicoleta.ionescu
 * Date: 4/16/2015
 * Time: 6:02 PM
 *
 * TODO:function for a player with an empty deck
 */
class Player extends PlayersAbstract implements PlayerInterface
{
    private $name;
    private $hp;
    private $mana;
    protected $deck;

    /**
     *The constructor
     * whenever a player object is instantiated if it dosent't
     * have any parameters like $name,$mana,$mana by default
     * it will become with the name "PlayerRandom",hp 100 and mana 100
     *
     *
     */
    function __construct($name = "PlayerRandom", $hp = 100, $mana=100)
    {
       $this->generateDeck();
       $this->setName($name);
       $this->setHp($hp);
       $this->setMana($mana);
    }


    /**SETTERS
     *the setter for Deck (because it's private)
     */
    public function setDeck($deck)
    {
        $this->deck = $deck;
    }

    /**
     *the setter for Hp (because it's private)
     */
    public function setHp($hp)
    {
        $this->hp=$hp;
    }

    /**
     *the setter for Name (because it's private)
     */
    public function setName($name)
    {
        $this->name=$name;
    }

    /**
     *the setter for Mana (because it's private)
     */
    public function setMana($mana)
    {
        $this->mana=$mana;
    }


    /**GETTERS
     *the getter for Deck (because it's private)
     */
    public function getDeck()
    {
       return $this->deck;
    }

    /**
     *the getter for Hp (because it's private)
     */
    public function getHp()
    {
        return  $this->hp;
    }

    /**
     *the getter for Name (because it's private)
     */
    public function getName()
    {
        return  $this->name;
    }

    /**
     *the getter for Mana (because it's private)
     */
    public function getMana()
    {
        return  $this->mana;
    }



    /**
     * Generateing the players deck
     * makeing the Deck an object for easying the use of
     * opereting with the cards and haveing a better control
     * over the number of cards.(see class Deck)
     */
    private function generateDeck()
    {
        $deck = new Deck();
        $this->setDeck($deck);
    }

    /**
     * Adding a specific card into the players deck
     * finding out what type of card si the parameter
     * and useing the class Deck for adding to our deck
     */
    public function addCard($card)
    {
        $class = ucfirst($card->getType()) . "Card";
        $this->deck->addCard($class,$card);


    }

    /**
     *removeing a specific card from the players deck
     */
    public function removeCard($card)
    {
      $this->deck->removeCard($card);
    }



}