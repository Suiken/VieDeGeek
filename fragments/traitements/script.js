
// function get_xhr() {
//     var xhr = null;

//     if (window.XMLHttpRequest || window.ActiveXObject) {
//         if (window.ActiveXObject) {
//             try {
//                 xhr = new ActiveXObject("Msxml2.XMLHTTP");
//             } catch (e) {
//                 xhr = new ActiveXObject("Microsoft.XMLHTTP");
//             }
//         } else {
//             xhr = new XMLHttpRequest();
//         }
//     } else {
//         alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
//         return null;
//     }
//     return xhr;
// }

// function verifierLogin(f) {

//     var xhr = get_xhr();
//     var login = encodeURIComponent(document.getElementById("login_connexion").value);
//     var mdp = encodeURIComponent(document.getElementById("mdp_connexion").value);

//     //    xhr.onreadystatechange = function() {
//     //        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
//     //            alert("OK"); // C'est bon \o/
//     //        }
//     //    };
    
//     xhr.open("POST", "connexion.php", true);
//     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//     xhr.send("login=" + login + "&mdp=" + mdp);

// }

// function maxlength_textarea(id, crid, max)
// {
//     var txtarea = document.getElementById(id);
//     document.getElementById(crid).innerHTML=max-txtarea.value.length;
//     txtarea.onkeypress=function(){
//         eval('v_maxlength("'+id+'","'+crid+'",'+max+');')
//         };
//     txtarea.onblur=function(){
//         eval('v_maxlength("'+id+'","'+crid+'",'+max+');')
//         };
//     txtarea.onkeyup=function(){
//         eval('v_maxlength("'+id+'","'+crid+'",'+max+');')
//         };
//     txtarea.onkeydown=function(){
//         eval('v_maxlength("'+id+'","'+crid+'",'+max+');')
//         };
// }

// function v_maxlength(id, crid, max)
// {
//     var txtarea = document.getElementById(id);
//     var crreste = document.getElementById(crid);
//     var len = txtarea.value.length;
//     if(len>max)
//     {
//         txtarea.value=txtarea.value.substr(0,max);
//     }
//     len = txtarea.value.length;
//     crreste.innerHTML=max-len;
// }

function reset(){
    $(function(){
        $('anecdote').html("Aujourd'hui, ");
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
    $("#anecdote").keydown(function(){
        $("#carac_reste_textarea_1").html(300 - $("#anecdote").val().length);
    });
});

$(function(){
    $("#soumission").submit(function(event){
        if((300 - $("#anecdote").val().length) < 0){
            alert("Votre anecdote contient plus de 300 caractères");
            event.preventDefault();
        }
    });
});