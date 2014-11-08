<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Name That Tune</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/fontello.css">
    <link rel="stylesheet" href="/css/magic.css">
    <link rel="stylesheet" href="/css/opensanscondesed.css">

    <script src="/js/jquery-1.11.1.min.js"></script>
    <script src="/js/jquery.simplemodal.1.4.4.min.js"></script>
    <script src="/js/jquery.countdown.min.js"></script>

    <script>
        $(document).ready(function() {
            function setScore(team, score) {
                $.ajax({
                    type: "PUT",
                    url: "/team/" + team,
                    data: { pts: score }
                });
            }
            function hideAnswers() {
                $('#gameimage').hide();
                $('#gameanswer').hide();
            }
            function showAnswers() {
                $('#gameimage').show();
                $('#gameimage').addClass('magictime puffIn');

                $('#gameanswer').show();
                $('#gameanswer').addClass('magictime boingInUp');
            }

            $('#commencez').on('click', function() {
                hideAnswers();

                $('#countdown').modal(
                    {
                        maxHeight: '100%',
                        maxWidth: '100%'
                    }
                );

                $('#fermer').on('click', function() {
                    $.modal.close();
                });

                $('#reponse').on('click', function() {
                    $.modal.close();
                    showAnswers();
                });

                var currentDate = new Date();
                currentDate.setSeconds(currentDate.getSeconds() + 30);
                $("#clock").countdown(currentDate, function (event) {
                    jQuery(this).html(event.strftime('%S'));
                });
            });



            $('.modifyscore span.icon-plus').on('click', function() {
                var score = $(this).parent().parent().children('.score').html();
                var newScore = parseInt(score) + 1;
                var team = $(this).parent().parent().attr('id');

                $(this).parent().parent().children('.score').html(newScore);
                setScore(team, newScore);
            });
            $('.modifyscore span.icon-minus').on('click', function() {
                var score = $(this).parent().parent().children('.score').html();
                var team = $(this).parent().parent().attr('id');
                var newScore = parseInt(score) - 1;

                $(this).parent().parent().children('.score').html(newScore);
                setScore(team, newScore);
            });
            $('#newgame').on('click', function () {
                hideAnswers();
                if (!$('#categorytitle').hasClass('magictime')) {
                    $('#categorytitle').addClass('magictime tinUpOut');
                    setTimeout(function(){
                        $('#categorytitle').removeClass('magictime tinUpOut');
                        $('#categorytitle').show();
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
                        $('#gameid').show();
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
                        $('#gamedetails p').show();
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
        <div id="countdown">
            <span id="clock"></span>
            <p id='reponse' class='button'>Réponse</p>
            <p id='fermer' class='button'>Fermer</p>
        </div>
        <div id="scores">
            <div id="pink" class="team onethird">
                <h1>Équipe ROSE NANANE</h1>
                <p class="score"><?php echo $pinkScore; ?></p>
                <p class="modifyscore">
                    <span class="icon-plus" href="#"></span><br />
                    <span class="icon-minus" href="#"></span>
                </p>
            </div>
            <div id="yellow" class="team onethird">
                <h1>Équipe JAUNE SERIN</h1>
                <p class="score"><?php echo $yellowScore; ?></p>
                <p class="modifyscore">
                    <span class="icon-plus" href="#"></span><br />
                    <span class="icon-minus" href="#"></span>
                </p>
            </div>
            <div id="green" class="team onethird">
                <h1>Équipe VERT CACA D'OIE</h1>
                <p class="score"><?php echo $greenScore; ?></p>
                <p class="modifyscore">
                    <span class="icon-plus" href="#"></span><br />
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
            <div id="gamedetails" class="onethird">
                <p class="button" id="commencez">Commencez!</p>
                <p style="text-align: left;">1. Écoutez la chanson<br /><br />2. Le premier qui devine gagne 1 pt</p>
            </div>
            <div id="gameimage">
                <img height="241" src="http://cdn.sheknows.com/filter/l/gallery/michael_jackson_thriller_special_edition_album_cover.jpg" />
            </div>
            <div id="gameanswer">
                <p>Michael Jackson</p>
                <p>Thriller</p>
            </div>
        </div>
    </div>
</body>
</html>
