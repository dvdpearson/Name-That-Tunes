<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Name That Tune</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/fontello.css">
    <link rel="stylesheet" href="/css/magic.css">

    <script src="/js/jquery-1.11.1.min.js"></script>
    <script src="/js/jquery.simplemodal.1.4.4.min.js"></script>
    <script src="/js/jquery.countdown.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#commencez').on('click', function() {
                $.modal("<div id=\"countdown\"><span id=\"clock\"></span><p id='reponse' class='button'>Réponse</p><p id='fermer' class='button'>Fermer</p></div>");

                $('#fermer').on('click', function() {
                    $.modal.close();
                });

                $('#reponse').on('click', function() {
                    $.modal.close();
                    $('#gameimage').show();
                });

                var currentDate = new Date();
                currentDate.setSeconds(currentDate.getSeconds() + 30);
                $("#clock").countdown(currentDate, function (event) {
                    jQuery(this).html(event.strftime('%S'));
                });
            });



            $('.modifyscore span.icon-plus').on('click', function() {
                var value = $(this).parent().parent().children('.score').html();
                $(this).parent().parent().children('.score').html(parseInt(value) + 1);
            });
            $('.modifyscore span.icon-minus').on('click', function() {
                var value = $(this).parent().parent().children('.score').html();
                $(this).parent().parent().children('.score').html(parseInt(value) - 1);
            });
            $('#newgame').on('click', function () {
                if (!$('#categorytitle').hasClass('magictime')) {
                    $('#categorytitle').addClass('magictime tinUpOut');
                    setTimeout(function(){
                        $('#categorytitle').removeClass('magictime tinUpOut');
                        $('#categorytitle').addClass('magictime puffIn');
                        setTimeout(function(){
                            $('#categorytitle').removeClass('magictime puffIn');
                        }, 1000 );
                    }, 1000 );
                }
                if (!$('#gameid').hasClass('magictime')) {
                    $('#gameid').addClass('magictime holeOut');
                    setTimeout(function(){
                        $('#gameid').removeClass('magictime holeOut');
                        $('#gameid').addClass('magictime swap');
                        setTimeout(function(){
                            $('#gameid').removeClass('magictime swap');
                        }, 1000 );
                    }, 1000 );
                }
                if (!$('#gamedetails p').hasClass('magictime')) {
                    $('#gamedetails p').addClass('magictime swashOut');
                    setTimeout(function(){
                        $('#gamedetails p').removeClass('magictime swashOut');
                        $('#gamedetails p').addClass('magictime slideRightRetourn');
                        setTimeout(function(){
                            $('#gamedetails p').removeClass('magictime slideRightRetourn');
                        }, 1000 );
                    }, 1000 );
                }
            });
        });
    </script>

</head>
<body>
    <div id="container">
        <div id="scores">
            <div id="teamA" class="team onethird">
                <h1>Équipe Rose</h1>
                <p class="score">12</p>
                <p class="modifyscore">
                    <span class="icon-plus" href="#"></span>
                    <span class="icon-minus" href="#"></span>
                </p>
            </div>
            <div id="teamB" class="team onethird">
                <h1>Équipe Jaune</h1>
                <p class="score">3</p>
                <p class="modifyscore">
                    <span class="icon-plus" href="#"></span>
                    <span class="icon-minus" href="#"></span>
                </p>
            </div>
            <div id="teamC" class="team onethird">
                <h1>Équipe Bleue</h1>
                <p class="score">29</p>
                <p class="modifyscore">
                    <span class="icon-plus" href="#"></span>
                    <span class="icon-minus" href="#"></span>
                </p>
            </div>
        </div>
        <div id="gamebar">
            <p id="newgame">Nouveau tour</p>
            <p id="categorytitle">Titre de la cat&eacute;gorie</p>
            <p id="gameid">#401</p>
        </div>
        <div id="gameinfo">
            <div id="gamedetails">
                <p style="text-align: left;">1. Écoutez la chanson<br /><br />2. Le premier qui devine gagne 1 pt</p>
            </div>
            <div id="start">
                <p class="button" id="commencez">Commencez!</p>
            </div>
            <div id="gameimage">
                <img height="241" src="http://cdn.sheknows.com/filter/l/gallery/michael_jackson_thriller_special_edition_album_cover.jpg" />
            </div>
            <div id="gameanswer">

            </div>
        </div>
    </div>
</body>
</html>
