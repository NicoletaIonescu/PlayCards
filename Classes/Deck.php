<?php
/**
 * Created by PhpStorm.
 * User: nicoleta.ionescu
 * Date: 4/16/2015
 * Time: 6:02 PM
 * TODO : optimized the addCard function to addCards
 */
class Deck{

    public $arrDeck = array();  //it should be protected or private but no time for setters and getters
    public $nrOfCards;
    public static $playerDeckConfig = array(
        "spell" => 1 ,
        "creature" => 1
    );


    /**
     *The Deck is constructed at the instanced object
     */
    public function __construct()
    {
            $this->makeDeck(self::$playerDeckConfig);
            $this->nrOfCards = count($this->arrDeck);

    }

    /**
     **Merge a number of spell cards with a number of creature cards
     */
    public function makeDeck($cardConfigs)
    {
        foreach ($cardConfigs as $cardType => $value){
            $class = ucfirst($cardType) . 'Card';
            for($i = 0 ; $i < $value ; $i++){
                $this->addCard(new $class);
            }
        }
    }

    /**
     **The function that determins what type of card should be added
     * I did the switch just to specify exacly what type of
     * object is the adding card.
     * it is used just in the constructor.
     *
     * @param CardsAbstract $card
     */
    public function addCard(CardsAbstract $card = null)
    {
        $class = get_class($card);
        switch ($class) {
            case "SpellCard":
                if ( $card == NULL ) {
                    $cardTypeObj = new $class();
                    $this->addSpellCard($cardTypeObj);
                } else {
                    $this->addSpellCard($card);
                }
                break;

            case "CreatureCard":
                if ( $card == NULL ) {
                    $cardTypeObj = new $class();
                    $this->addCreatureCard($cardTypeObj);
                } else {
                    $this->addCreatureCard($card);
                }
                break;

            default:
                echo "Something went wrong check it out!";
                break;
        }
    }

    /**
     **Adding in the arrDeck the Spellcard with []
     */
    private function addSpellCard(SpellCard $card)
    {
        $arr = $this->arrDeck;
        $arr[] = $card;
        $this->arrDeck = $arr;
        $this->nrOfCards = count($arr);
    }

    /**
     **Adding in the arrDeck the CreatureCard with []
     */
    private function addCreatureCard(CreatureCard $card)
    {
        $arr = $this->arrDeck;
        $arr[] = $card;
        $this->arrDeck = $arr;
        $this->nrOfCards = count($arr);
    }


    /**
     **Remove in the arrDeck a Card
     */
    public function removeCard($card)
    {
       $arr = $this->arrDeck;
       $key = array_search ($card, $arr);
       unset($arr[$key]) ;
       $this->arrDeck=$arr;
       $this->nrOfCards= count($arr);

    }



//











}