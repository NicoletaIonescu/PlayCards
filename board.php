<?php
/**
 * Created by PhpStorm.
 * User: nicoleta.ionescu
 * Date: 8/29/2015
 * Time: 12:43 PM
 */


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
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="js/jquery-ui-1.11.4/jquery-ui.js"></script>
    <script>
        $(function() {
            // there's the gallery and the trash
            var $gallery = $( "#card-list" ),
                $trash = $( "#board" );

            // let the gallery items be draggable
            $( "li", $gallery ).draggable({
                cancel: "a.ui-icon", // clicking an icon won't initiate dragging
                revert: "invalid", // when not dropped, the item will revert back to its initial position
                containment: "document",
                helper: "clone",
                cursor: "move"
            });

            // let the trash be droppable, accepting the gallery items
            $trash.droppable({
                accept: "#card-list > li",
                activeClass: "ui-state-highlight",
                drop: function( event, ui ) {
                    deleteImage( ui.draggable );
                }
            });

            // let the gallery be droppable as well, accepting items from the trash
            $gallery.droppable({
                accept: "#board li",
                activeClass: "custom-state-active",
                drop: function( event, ui ) {
                    recycleImage( ui.draggable );
                }
            });

            // image deletion function
            var recycle_icon = "<a href='link/to/recycle/script/when/we/have/js/off' title='Recycle this image' class='ui-icon ui-icon-refresh'>Recycle image</a>";
            function deleteImage( $item ) {
                $item.fadeOut(function() {
                    var $list = $( "ul", $trash ).length ?
                        $( "ul", $trash ) :
                        $( "<ul class='gallery ui-helper-reset'/>" ).appendTo( $trash );

                    $item.find( "a.ui-icon-trash" ).remove();
                    $item.append( recycle_icon ).appendTo( $list ).fadeIn(function() {
                        $item
                            .animate({ width: "48px" })
                            .find( "img" )
                            .animate({ height: "36px" });
                    });
                });
            }

            // image recycle function
            var trash_icon = "<a href='link/to/trash/script/when/we/have/js/off' title='Delete this image' class='ui-icon ui-icon-trash'>Delete image</a>";
            function recycleImage( $item ) {
                $item.fadeOut(function() {
                    $item
                        .find( "a.ui-icon-refresh" )
                        .remove()
                        .end()
                        .css( "width", "96px")
                        .append( trash_icon )
                        .find( "img" )
                        .css( "height", "72px" )
                        .end()
                        .appendTo( $gallery )
                        .fadeIn();
                });
            }

            // image preview function, demonstrating the ui.dialog used as a modal window
            function viewLargerImage( $link ) {
                var src = $link.attr( "href" ),
                    title = $link.siblings( "img" ).attr( "alt" ),
                    $modal = $( "img[src$='" + src + "']" );

                if ( $modal.length ) {
                    $modal.dialog( "open" );
                } else {
                    var img = $( "<img alt='" + title + "' width='384' height='288' style='display: none; padding: 8px;' />" )
                        .attr( "src", src ).appendTo( "body" );
                    setTimeout(function() {
                        img.dialog({
                            title: title,
                            width: 400,
                            modal: true
                        });
                    }, 1 );
                }
            }

            // resolve the icons behavior with event delegation
            $( "ul.gallery > li" ).click(function( event ) {
                var $item = $( this ),
                    $target = $( event.target );

                if ( $target.is( "a.ui-icon-trash" ) ) {
                    deleteImage( $item );
                } else if ( $target.is( "a.ui-icon-zoomin" ) ) {
                    viewLargerImage( $target );
                } else if ( $target.is( "a.ui-icon-refresh" ) ) {
                    recycleImage( $item );
                }

                return false;
            });
        });
    </script>
    <style>
        #card-list { float: left; width: 65%; min-height: 12em; }
        .card-list.custom-state-active { background: #eee; }
        .card-list li { float: left; width: 96px; padding: 0.4em; margin: 0 0.4em 0.4em 0; text-align: center; }
        .card-list li h5 { margin: 0 0 0.4em; cursor: move; }
        .card-list li a { float: right; }
        .card-list li a.ui-icon-zoomin { float: left; }
        .card-list li img { width: 100%; cursor: move; }

        #board { float: right; width: 32%; min-height: 18em; padding: 1%; }
        #board h4 { line-height: 16px; margin: 0 0 0.4em; }
        #board h4 .ui-icon { float: left; }
        #board .card-list h5 { display: none; }
    </style>
</head>
<body>
<div class="ui-widget ui-helper-clearfix">

    <ul id="card-list" class="card-list ui-helper-reset ui-helper-clearfix">
        <li><h5>Carte #1</h5></li>
        <li><h5>Carte #2</h5></li>
        <li><h5>Carte #3</h5></li>
        <li><h5>Carte #4</h5></li>
    </ul>
    <hr>
    <div id="board" class="ui-widget-content ui-state-default">
        <h4 class="ui-widget-header"><span class="ui-icon ui-icon-board">board</span> board</h4>
    </div>
</body>
</html>















