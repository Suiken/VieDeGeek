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
                    $("#idf").html("Pseudo déjà utilisé").fadeIn("slow");
                }else{
                    if($("#id").val() != ""){
                        $("#idf").html("Pseudo disponible").fadeIn("slow");
                    }else{
                        $("#idf").html("Pseudo requis").fadeIn("slow");
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
            $("#password2f").html("Mots de passe différents").fadeIn("slow");
        }else{
            if($("#password1").val() != "" && $("#password2") != ""){
                $("#password2f").html("Mots de passe identiques").fadeIn("slow");
            }else{
                $("#password2f").html("").fadeIn("slow");
            }
        }
    });
});

$(function(){
    $("#password1").blur(function(){
        $("#password1f").hide();
        if($("#password1").val() == ""){
            $("#password1f").html("Mot de passe requis").fadeIn("slow");
        }else{
            $("#password1f").show().fadeOut(1000);
        }
    });
});

$(function(){
    $("#mail").blur(function(){
        $("#mailf").hide();
        if($("#mail").val() == ""){
            $("#mailf").html("Mail requis").fadeIn("slow");
        }else{
            $("#mailf").show().fadeOut(1000);
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
                            if($("#password1").length <= 5){
                                alert("Le mot de passe doit contenir au moins 5 caractères");
                            }else{
                                if($("#mail").val() == ""){
                                    alert("Une adresse email est requis");
                                }else{
                                    // $("#connexion").off("submit");
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
})