$(document).ready(function () {
    function setScore(team, score) {
        $.ajax({
            type: "PUT",
            url: "/team/" + team,
            data: { pts: score }
        });
    }

    function newgame(game) {
        hideAnswers();
        if (!$('#categorytitle').hasClass('magictime')) {
            $('#categorytitle').addClass('magictime tinUpOut');
            setTimeout(function () {
                $('#categorytitle').removeClass('magictime tinUpOut');
                $('#categorytitle').show();
                if (game.gameName.trim() == 'Écoutez la chanson') {
                    $('#categorytitle').html(game.gameName + ' - Catégorie: <span>' + game.category + '</span>');
                } else if (game.gameName.trim() == 'Quiz musical') {
                    if (game.category.trim() == "Difficile") {
                        var color = 'red';
                    } else if (game.category.trim() == "Facile") {
                        var color = 'green';
                    }
                    $('#categorytitle').html(game.gameName + ' - Niveau: <span class="'+color+'">' + game.category + '</span>');
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
                    $('#explications').html('1. Capitaine sélectionne un joueur.<br />2. Écouteurs sur les oreilles pendant 30 secondes.<br />3. Chanter sans paroles ou dire des lalala.<br />4. Aucun indice à l\'équipe. 1 point pour la bonne réponse.');
                } else if (game.gameName.trim() == 'Sifflez la chanson') {
                    $('#explications').html('1. Capitaine sélectionne un joueur.<br />2. Carte SIFFLEZ LA CHANSON avec le nom de de l\'artiste et le titre à siffler.<br />3. 20 secondes pour siffler ou chanter la bouche fermée.<br />4. Aucune parole. Aucun indice à l\'équipe. 1 point pour la bonne réponse.');
                } else if (game.gameName.trim() == 'Quiz musical') {
                    $('#explications').html('1. Toute l\'équipe joue.<br />2. Le capitaine décide de la question à 1 point (facile) ou à 5 points (difficile).<br />3. Consultation de 20 secondes après la question.<br />4. Le capitaine donne la réponse.<br />5. Si la réponse est bonne, les points seront attribués.<br />6. Si la question à 5 points est mauvaise, un shooter devra être pris et le maître de jeu décide de qui le prendra dans l\'équipe.');
                } else if (game.gameName.trim() == 'Écoutez la chanson') {
                    $('#explications').html('1. Toute l\'équipe joue.<br />2. Extrait de 20 secondes.<br />3. 1 point pour la bonne réponse.<br />4. Si non répondu, droit de réplique à l\'équipe suivante.<br />5. Si les 3 équipes ne trouvent pas la réponse, point annulé.');
                } else if (game.gameName.trim() == 'Mime musical') {
                    $('#explications').html('1. Toute l\'équipe joue.<br />2. Les capitaine décident du joueur qui mimera à son équipe le groupe, l\'artiste ou le titre de la chanson inscrits sur la carte de jeu.<br />3. Même mime à faire pour les 3 équipes en même temps.<br />4. Un indice pour les 3 équipes. 30 secondes.<br />5. Pas de réponse? 2e indice.<br />6. 1 point pour la bonne réponse. 5 points si l\'équipe avait la main.');
                }
                $('#gamedetails').show();
                $('#gamedetails p').show();
                $('#gamedetails p').addClass('magictime slideRightRetourn');
                setTimeout(function () {
                    $('#gamedetails p').removeClass('magictime slideRightRetourn');
                }, 1000);
            }, 1000);
        }
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

            $('#gameimage img').attr('src', '/covers/'+game.gameId+'.jpg');
            $('#gameimage').show();
            $('#gameimage').addClass('magictime puffIn');

            $('#gameanswer').show();
            var answer = '';
            if (game.gameName.trim() == 'Devinez la chanson sans paroles' ||
                game.gameName.trim() == 'Écoutez la chanson' ||
                game.gameName.trim() == 'Mime musical' ||
                game.gameName.trim() == 'Sifflez la chanson') {
                answer = '<p style="margin-bottom: 10px;">' + game.tuneArtist + '</p><p style="margin-top: 10px;">' + game.tuneName + '</p>';
            } else if (game.gameName.trim() == 'Quiz musical') {
                $('#gameimage').hide();
                answer = '<p style="margin-top: 71px;">' + game.answer + '</p>';
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
            if (game.gameName.trim() == 'Quiz musical') {
                $('#question').html(game.question);
                $('#question').show();
            }
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
            if (game.gameName.trim() == 'Quiz musical') {
                $('#quizchoice').modal(
                    {
                        maxHeight: 300,
                        maxWidth: 620
                    }
                );
                $('#quizchoice').addClass('magictime foolishIn');
                setTimeout(function () {
                    $('#quizchoice').removeClass('magictime foolishIn');
                }, 1000);

                $('#difficile').on('click', function () {
                    $.ajax({
                        type: "GET",
                        url: "/game/quiz/Difficile"
                    }).done(function (game) {
                        $('#quizchoice').addClass('magictime holeOut');
                        setTimeout(function () {
                            $('#quizchoice').removeClass('magictime holeOut');
                            $.modal.close();
                        }, 1000);
                        newgame(game);
                    });
                });

                $('#facile').on('click', function () {
                    $.ajax({
                        type: "GET",
                        url: "/game/quiz/Facile"
                    }).done(function (game) {
                        $('#quizchoice').addClass('magictime holeOut');
                        setTimeout(function () {
                            $('#quizchoice').removeClass('magictime holeOut');
                            $.modal.close();
                        }, 1000);
                        newgame(game);
                    });
                });
            } else {
                newgame(game);
            }
        });
    });
});