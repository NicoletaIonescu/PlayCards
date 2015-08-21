<?php
/**
 * Created by PhpStorm.
 * User: nicoleta.ionescu
 * Date: 4/16/2015
 * Time: 6:02 PM
 */
abstract class CardsAbstract
{
    protected $_type;
    protected $_prop;

    /**
     * Setts an ordinary card with random values
    **/
   public function setCard()
    {

      $cardAvailableConfigs = GlobalProp::getConfig();
      foreach ( $this->_prop as  $value ){
           $randomKey = array_rand($cardAvailableConfigs[$value]);
           $this->$value = $cardAvailableConfigs[$value][$randomKey];
        }
        return $this;
    }

    /**
     * Generating an array "cards"
     */
    public function getMultipleCards($no)
    {
        $cards = array();
        for($i = 0 ; $i < $no ; $i++){
            $class = ucfirst($this->_type) . "Card";
            $card = new $class;
            array_push($cards,  $card);
        }
        return $cards;
    }

    public function getCard()
    {
        //TODO it's an array of attr.
        $arr=array();
        foreach ( $this->_prop as  $value ){
            $arr[$value] = $this->$value;
        }
        return $arr;
    }





}
