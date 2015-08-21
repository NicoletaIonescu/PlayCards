<?php
/**
 * User: nicoleta.ionescu
 * Date: 4/17/2015
 * Time: 5:12 PM
 */

class GlobalProp
{
    CONST  CONFIGURATION_DATA_SOURCE = "defined";
    public static $arrProp = array(
        /*spell*/
        "damage"        => array(10,20,30,40),
        "cost"          => array(20,30,40,50),
        "name"          => array("MiniSpell",
                                 "MickySpell",
                                 "SomeSpell",
                                 "OtherSpell"),
        /*creature*/
        "hp"             => array(100,150,200,250),
        "attack"         => array(30,35,40,45),
        "cost"           => array(10,20,30,40),
        "creature"       => array('Basic',
                                  'Beast',
                                  'Pirate',
                                  'Murloc'),
        "flavorText"     => array ('arr', 'hrr','grr','mrr')
    );

    public static $configPath = array(
        /*folder => classs */
        "AbstractClasses" => array(
                                "CardsAbstract",
                                "PlayerAbstract"
                              ),
        "Interfaces"      => array(
                                "PlayerInterface"
                              ),
        "Classes"        => array(
                                "Player",
                                "Deck",
                                "SpellCard",
                                "CreatureCard"
                              )
    );






    public static function getConfigPath()
    {
        return self::$configPath;
    }

    public static function getConfig()
    {
        switch (self::CONFIGURATION_DATA_SOURCE){
            case 'defined':
                return self::getDefinedConfig();
                break;
            case 'db':
                return self::getDbConfig();
                break;

            default :
                return self::getDefinedConfig();
        }
    }

    public static function getDefinedConfig()
    {
       return self::$arrProp;
    }

    public static function getDbConfig()
    {
        //TODO
    }
}