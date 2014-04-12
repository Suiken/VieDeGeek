function reset(){
    $(function(){
        $('#anecdote').html("Aujourd'hui, ");
        $("#carac_reste_textarea_1").html("Il vous reste 287 caractères");
    });
}

function upVote(numAnecdote){
    $(function(){
        $.get(
            'fragments/traitements/upvotes.php',
            {
                id: numAnecdote
            },
            function(data){
                $("#e"+numAnecdote.toString()).hide();
                if(data == "Success"){
                    $("#"+numAnecdote.toString()).html(parseInt($("#"+numAnecdote.toString()).html())+1);
                    $("#e"+numAnecdote.toString()).html("Merci d'avoir voté").fadeIn("slow");
                }else{
                    $("#e"+numAnecdote.toString()).html("Vous avez déjà voté").fadeIn("slow");
                }
            },
            ''
        );
    });
}

function upvoteCom(numCommentaire){
    $(function(){
        $.get(
            'fragments/traitements/upvoteCom.php',
            {
                id: numCommentaire
            },
            function(data){
                $("#e"+numCommentaire.toString()).hide();
                if(data == "Success"){
                    $("#"+numAnecdote.toString()).html(parseInt($("#"+numAnecdote.toString()).html())+1);
                    $("#e"+numAnecdote.toString()).html("Merci d'avoir voté").fadeIn("slow");
                }else{
                    $("#e"+numAnecdote.toString()).html("Vous avez déjà voté").fadeIn("slow");
                }
            },
            ''
        );
    });
}

function downVote(numAnecdote){
    $(function(){
        $.get(
            'fragments/traitements/downvotes.php',
            {
                id: numAnecdote
            },
            function(data){
                $("#e"+numAnecdote.toString()).hide();
                if(data == "Success"){
                    $("#e"+numAnecdote.toString()).html("Merci d'avoir voté").fadeIn("slow");
                }else{
                    $("#e"+numAnecdote.toString()).html("Vous avez déjà voté").fadeIn("slow");
                }
            },
            ''
        );
    });
}

function downvoteCom(numCommentaire){
    $(function(){
        $.get(
            'fragments/traitements/downvoteCom.php',
            {
                id: numCommentaire
            },
            function(data){
                $("#e"+numCommentaire.toString()).hide();
                if(data == "Success"){
                    $("#e"+numCommentaire.toString()).html("Merci d'avoir voté").fadeIn("slow");
                }else{
                    $("#e"+numCommentaire.toString()).html("Vous avez déjà voté").fadeIn("slow");
                }
            },
            ''
        );
    });
}

$(function(){
    $("#id").blur(function(){
        $.post(
            'fragments/traitements/verif_login.php',
            {
                login: $("#id").val()
            },
            function(data){
                $("#idf").hide();
                if(data == "Failure"){
                    $("#idf").html("Pseudo déjà utilisé").css("color", "red").fadeIn("slow");
                }else{
                    if($("#id").val() != ""){
                        $("#idf").html("OK").css("color", "green").fadeIn("slow");
                    }else{
                        $("#idf").html("Pseudo requis").css("color", "red").fadeIn("slow");
                    }
                }
            },
            ''
        );
    });
});

$(function(){
    $("#password2").blur(function(){
        $("#password2f").hide();
        if($("#password1").val() != $("#password2").val()){
            $("#password2f").html("Mots de passe différents").css("color", "red").fadeIn("slow");
        }else{
            if($("#password1").val() != "" && $("#password2") != ""){
                $("#password2f").html("OK").css("color", "green").fadeIn("slow");
            }else{
                $("#password2f").html("");
            }
        }
    });
});

$(function(){
    $("#password1").blur(function(){
        $("#password1f").hide();
        if($("#password1").val().length <= 4){
            $("#password1f").html("Le mot de passe doit contenir au moins 5 caractères").css("color", "red").fadeIn("slow");
        }else{
            $("#password1f").html("OK").css("color", "green").fadeIn("slow");
        }
    });
});

$(function(){
    $("#mail").blur(function(){
        $("#mailf").hide();
        if($("#mail").val() == ""){
            $("#mailf").html("Mail requis").css("color", "red").fadeIn("slow");
        }else{
            $("#mailf").html("OK").css("color", "green").fadeIn("slow");
        }
    });
});

$(function(){
    $("#connexion").submit(function(event){
        event.preventDefault();
        event.returnValue = false;
        $.post(
            'fragments/traitements/verif_login.php',
            {
                login: $("#id").val()
            },
            function(data){
                if(data == "Failure"){
                    alert("Le pseudo n'est pas disponible");
                }else{
                    if($("#id").val() != ""){
                        if($("#password1").val() != $("#password2").val()){
                            alert("Les deux mots de passe ne sont pas identiques");
                        }else{
                            if($("#password1").val().length <= 4){
                                alert("Le mot de passe doit contenir au moins 5 caractères");
                            }else{
                                if($("#mail").val() == ""){
                                    alert("Une adresse email est requis");
                                }else{
                                    $("#connexion").off("submit");
                                    $("#connexion").submit();
                                }
                            }
                        }
                    }else{
                        alert("Le pseudo est requis");
                    }
                }
            },
            ''
        );
    });
});

$(function(){
    $("#anecdote").bind('input propertychange', function(){
        var result = 300 - $("#anecdote").val().length;
        if(result > 0){
            $("#carac_reste_textarea_1").html("Il vous reste " + result + " caractères");
        }else{
            $("#carac_reste_textarea_1").html("Vous avez dépassé de " + (result - (result * 2)) + " caractères");
        }
    });
});

$(function(){
    $("#soumission").submit(function(event){
        if((300 - $("#anecdote").val().length) < 0){
            alert("Votre anecdote ne doit pas contenir plus de 300 caractères");
            event.preventDefault();
        }
    });
});

$(function(){
    $("body").hide();
    $("body").fadeIn(500);
});

$(function(){

    var i = 0;

    function topCommentaireBoucle(){
        setTimeout(function(){
            $("#top3").hide();
            $("#top3").fadeIn("slow")
            if(i == 1){
                $.post(
                    "fragments/traitements/top_commentaires.php",
                    function(data){
                        $("#topTitre").html("Top aimés")
                        $("#premier").html(data[0].nom_compte_inscrit + " : " + data[0].score + " points");
                        $("#deuxieme").html(data[1].nom_compte_inscrit + " : " + data[1].score + " points");
                        $("#troisieme").html(data[2].nom_compte_inscrit + " : " + data[2].score + " points");
                    },
                    "json"
                );
                i = 0;
                topCommentaireBoucle();
            }else{
                $.post(
                    "fragments/traitements/top_posteurs.php",
                    function(data){
                        $("#topTitre").html("Top posteurs")
                        $("#premier").html(data[0].nom_compte_inscrit + " : " + data[0].score + " points");
                        $("#deuxieme").html(data[1].nom_compte_inscrit + " : " + data[1].score + " points");
                        $("#troisieme").html(data[2].nom_compte_inscrit + " : " + data[2].score + " points");
                    },
                    "json"
                );
                i = 1;
                topCommentaireBoucle();
            }
        }, 5000);
    }

    topCommentaireBoucle();

});

$(function(){
    var url = document.location.href;
    if(url.indexOf("index.php") == 27){
        $("#urlIndex").css("background-color", "white").css("color", "black");
    }
    if(url.indexOf("meilleurs.php") == 27){
        $("#urlMeilleurs").css("background-color", "white").css("color", "black");
    }
    if(url.indexOf("controversees.php") == 27){
        $("#urlControversees").css("background-color", "white").css("color", "black");
    }
    switch(url){
        case "http://localhost/VieDeGeek/aleatoire.php":
            $("#urlAleatoire").css("background-color", "white").css("color", "black");
            break;
        case "http://localhost/VieDeGeek/sumision.php":
            $("#urlSumision").css("background-color", "white").css("color", "black");
            break;
        case "http://localhost/VieDeGeek/sumision.php":
            $("#urlProfile").css("background-color", "white").css("color", "black");
            break;
        case "http://localhost/VieDeGeek/profile.php":
            $("#urlProfile").css("background-color", "white").css("color", "black");
            break;
        case "http://localhost/VieDeGeek/validation.php":
            $("#urlValidation").css("background-color", "white").css("color", "black");
            break;
        case "http://localhost/VieDeGeek/backoffice.php":
            $("#urlBackoffice").css("background-color", "white").css("color", "black");
            break;
    }
});