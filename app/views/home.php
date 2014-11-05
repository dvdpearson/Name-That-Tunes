<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Name That Tune</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/fontello.css">
    <link rel="stylesheet" href="/css/magic.css">

    <script src="/js/jquery-1.11.1.min.js"></script>

    <script>
        $(document).ready(function() {
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
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis aliquam, magna lobortis venenatis cursus, eros massa sodales tellus, sit amet maximus massa odio in nisi. Vestibulum id felis sed ligula sagittis tristique sed nec eros. Maecenas viverra, lacus vitae efficitur dapibus, sapien odio tincidunt dolor, ac suscipit ipsum nibh a elit.</p>
            </div>
            <div id="start">
                <p class="button" id="commencez">Commencez!</p>
            </div>
            <div id="gameimage">
                <img height="241" src="http://cdn.sheknows.com/filter/l/gallery/michael_jackson_thriller_special_edition_album_cover.jpg" />
            </div>
        </div>
    </div>
</body>
</html>
