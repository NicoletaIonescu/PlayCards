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
    <!--loading Semantic UI-->

    <link rel="stylesheet" type="text/css" href="Semantic/dist/semantic.css" >
    <script  type="text/javascript" src="Semantic/dist/semantic.js" ></script>


    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="js/jquery-ui-1.11.4/jquery-ui.js"></script>

    <style>
        body{
            padding-top:5px;

        }

        .main-container{
            padding-left:20px;
            padding-right:20px;
            margin:0 auto;
        }
    </style>


</head>
<body>

<div class="main-container">
    <div class="ui equal width grid">
        <div class="column row">
            <h2 class="ui header">
                <img src="images/elements-icon.jpg">
                <div class="content">
                    Elements
                    <div class="sub header">See the elements configuration</div>
                </div>
            </h2>
        </div>
        <div class="column black">
            <a href="?id=spell">SpellCard</a>
        </div>
        <div class="column ">
            <a href="?id=creature">CreatureCard</a>
        </div>
        <div class="column">
            <a href="?id=deck">Deck</a>
        </div>
        <div class="column">
            <a href="?id=player">Player</a>
        </div>


        <div class="equal width row">
            <div class="column">
                <div style="background-color:#eee;text-align: center;">
                    <div style="text-align:left">
                        <?php if (isset($_GET['id'])) {
                            echo "Example :";
                            echo "<pre>";
                            var_dump($obj);
                            echo "</pre>";
                        } ?>
                    </div>
                </div>
            </div>
            <div class="column">f</div>
        </div>
    </div>
</div>




</body>
</html>















