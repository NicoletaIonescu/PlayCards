<?php
/**
 * Created by PhpStorm.
 * User: nicoleta.ionescu
 * Date: 4/16/2015
 * Time: 6:02 PM
 */
class Game
{
    /**
     *Including the Files when Game is instanced 4 now
     */
    function __construct()
    {
        include "GlobalProp.php";
        $this->init(GlobalProp::getConfigPath());
    }



    function init($configPath)
    {


         foreach ($configPath as $folder => $files ){
             foreach( $files as $file ){

                 $filename= $folder . "/" . $file . ".php";
                 if (file_exists($filename)) {
                     include_once $filename;
                 } else {
                     echo "The file $filename does not exist <br>";
                 }

             }
          }
//        /*Config Classes for the DB or the Defined Constants*/
//        include_once "GlobalProp.php";
//
//        /*Interfaces*/
//        include_once "Interfaces/PlayerInterface.php";
//
//        /*Abstract Classes*/
//        include_once "abstractClasses/CardsAbstract.php";
//        include_once "abstractClasses/PlayerAbstract.php";
//
//        /*classes*/
//        include_once "Player.php";
//        include_once "SpellCard.php";
//        include_once "CreatureCard.php";
//        include_once "Deck.php";

    }


}
