<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Name That Tune - 2014</title>

    <link rel="icon" href="img/favicon.png" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="/css/opensanscondesed.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/fontello.css">
    <link rel="stylesheet" href="/css/magic.css">
    <link rel="stylesheet" href="/css/animate.css">


    <script src="/js/jquery-1.11.1.min.js"></script>
    <script src="/js/jquery.simplemodal.1.4.4.min.js"></script>
    <script src="/js/jquery.countdown.js"></script>
    <script src="/js/ntt.js"></script>

</head>
<body>
    <div id="container">
        <div id="quizchoice">
            <h1>Catégorie Quiz!</h1>
            <h2>Quel niveau voulez-vous votre question-quiz ?</h2>
            <div id="choixNiveau">
                <p id='difficile' class='button'>Difficile (5 points)</p>
                <p id='facile' class='button'>Facile (1 point)</p>
            </div>
        </div>
        <div id="countdown">
            <span id="clock"></span>
            <p id='reponse' class='button'>Réponse</p>
            <p id='fermer' class='button'>Fermer</p>
            <p id='question'>Question ici sadsa dsa dsadwqewq ewq e.. ?</p>
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
                <p style="text-align: left;" id="explications">1. Écoutez la chanson<br /><br />2. Le premier qui devine gagne 1 pt</p>
            </div>
            <div id="gameanswer">
                <p>Michael Jackson</p>
                <p>Thriller</p>
            </div>
            <div id="gameimage">
                <img height="241" src="http://cdn.sheknows.com/filter/l/gallery/michael_jackson_thriller_special_edition_album_cover.jpg" />
            </div>
        </div>
    </div>
</body>
</html>
