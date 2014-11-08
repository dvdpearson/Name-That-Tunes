$(document).ready(function () {
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
        $.ajax({
            type: "GET",
            url: "/game/" + $('#gameid').html()
        }).done(function (game) {
            $('#gameimage').show();
            $('#gameimage').addClass('magictime puffIn');

            $('#gameanswer').show();
            var answer = '';
            if (game.gameName.trim() == 'Devinez la chanson sans paroles' ||
                game.gameName.trim() == 'Écoutez la chanson' ||
                game.gameName.trim() == 'Mime musical') {
                answer = '<p>' + game.tuneArtist + '</p><p>' + game.tuneName + '</p>';
            }
            $('#gameanswer').html(answer);
            $('#gameanswer').addClass('magictime boingInUp');
        });
    }

    $('#commencez').on('click', function () {
        hideAnswers();

        $('#countdown').modal(
            {
                maxHeight: '100%',
                maxWidth: '100%'
            }
        );

        $('#fermer').on('click', function () {
            $.modal.close();
        });

        $('#reponse').on('click', function () {
            $.modal.close();
            showAnswers();
        });

        var currentDate = new Date();
        var seconds = 0;
        $.ajax({
            type: "GET",
            url: "/game/" + $('#gameid').html()
        }).done(function (game) {
            currentDate.setSeconds(currentDate.getSeconds() + game.timer);
            $("#clock").countdown(currentDate, function (event) {
                jQuery(this).html(event.strftime('%S'));
            });
        });
    });


    $('.modifyscore span.icon-plus').on('click', function () {
        var score = $(this).parent().parent().children('.score').html();
        var newScore = parseInt(score) + 1;
        var team = $(this).parent().parent().attr('id');

        $(this).parent().parent().children('.score').html(newScore);
        setScore(team, newScore);
    });
    $('.modifyscore span.icon-minus').on('click', function () {
        var score = $(this).parent().parent().children('.score').html();
        var team = $(this).parent().parent().attr('id');
        var newScore = parseInt(score) - 1;

        $(this).parent().parent().children('.score').html(newScore);
        setScore(team, newScore);
    });
    $('#newgame').on('click', function () {
        $.ajax({
            type: "GET",
            url: "/game"
        }).done(function (game) {
            hideAnswers();
            if (!$('#categorytitle').hasClass('magictime')) {
                $('#categorytitle').addClass('magictime tinUpOut');
                setTimeout(function () {
                    $('#categorytitle').removeClass('magictime tinUpOut');
                    $('#categorytitle').show();
                    if (game.gameName.trim() == 'Écoutez la chanson') {
                        $('#categorytitle').html(game.gameName + ' - Catégorie: ' + game.category);
                    }
                    else {
                        $('#categorytitle').html(game.gameName);
                    }
                    $('#categorytitle').addClass('magictime puffIn');
                    setTimeout(function () {
                        $('#categorytitle').removeClass('magictime puffIn');
                    }, 1000);
                }, 1000);
            }
            if (!$('#gameid').hasClass('magictime')) {
                $('#gameid').addClass('magictime holeOut');
                setTimeout(function () {
                    $('#gameid').removeClass('magictime holeOut');
                    $('#gameid').show();
                    $('#gameid').html(game.gameId);
                    $('#gameid').addClass('magictime swap');
                    setTimeout(function () {
                        $('#gameid').removeClass('magictime swap');
                    }, 1000);
                }, 1000);
            }
            if (!$('#gamedetails p').hasClass('magictime')) {
                $('#gamedetails p').addClass('magictime swashOut');
                setTimeout(function () {
                    $('#gamedetails p').removeClass('magictime swashOut');
                    if (game.gameName.trim() == 'Devinez la chanson sans paroles') {
                        $('#explications').html('1. Un membre délégué pour écouter, avec casque d\'écoute<br><br>2. Si trouvée dans les temps, 1 point');
                    } else if (game.gameName.trim() == 'Sifflez la chanson') {
                        $('#explications').html('1. Un membre délégué pour siffler<br><br>2. Si trouvée dans les temps, 1 point');
                    } else if (game.gameName.trim() == 'Quiz musical') {
                        $('#explications').html('1. Choix entre facile et diffile<br><br>2. Si trouvé diffile, 5 point, sinon 1 point');
                    } else if (game.gameName.trim() == 'Écoutez la chanson') {
                        $('#explications').html('1. Écoutez la chanson en équipe<br><br>2. Si trouvée dans les temps, 1 point');
                    } else if (game.gameName.trim() == 'Mime musical') {
                        $('#explications').html('1. Choisissez un mineur pour chaque équipe<br><br>2. L\'équipe qui a trouvée dans les temps, 1 point');
                    }
                    $('#gamedetails').show();
                    $('#gamedetails p').show();
                    $('#gamedetails p').addClass('magictime slideRightRetourn');
                    setTimeout(function () {
                        $('#gamedetails p').removeClass('magictime slideRightRetourn');
                    }, 1000);
                }, 1000);
            }
        });
    });
});