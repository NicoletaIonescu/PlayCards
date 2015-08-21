<?php
    include "Game.php";
    $game = new Game();



    if (isset($_GET['id'])){

        $id = $_GET['id'];
        switch ($id){
            case "player":
                $obj = new Player();
                break;
            case "spell":
                $obj = new SpellCard();
                break;
            case "creature":
                $obj = new CreatureCard();
                break;
            case "deck":
                $obj=  new Deck();
                break;

            default:
                $obj="Nu ati ales un obiect din lista!";
        }
    }

?>
<!DOCTYPE html>
<html>

<head>

</head>
<body>
   <ul>
       <li><a href="?id=spell">SpellCard</a></li>
       <li><a href="?id=creature">CreatureCard</a></li>
       <li><a href="?id=deck">Deck</a></li>
       <li><a href="?id=player">Player</a></li>
   </ul>

<hr>
<?php if (isset($_GET['id'])) {
    echo "Example :";
    echo "<pre>";
    var_dump($obj);
    echo "</pre>";
 } ?>
</body>
</html>















