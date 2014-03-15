<?php 
$page_title = "Vie De Geek - Aléatoire";
include ($_SERVER['DOCUMENT_ROOT'].'/VieDeGeek/fragments/shared/header.php');
require_once 'fragments/traitements/db.php';
require_once 'fragments/traitements/anecdote.php';
require_once 'fragments/traitements/inscrit.php';
?>
<div id="pub2">
    <div id="text_pub2">
           <embed src="http://s0.2mdn.net/4118425/300x600_IBM_Intel_Nextscale.swf" flashvars="moviePath=http://s0.2mdn.net/4118425/&amp;moviepath=http://s0.2mdn.net/4118425/&amp;clickTag=http%3A//ad-emea.doubleclick.net/click%253Bh%253Dv8/3f0b/f/10e/%252a/q%253B279872309%253B0-0%253B0%253B106864678%253B4986-300/600%253B57314831/57203942/1%253B%253B%257Esscs%253D%253fhttp%3A//ads.horyzon-media.com/clic/countgo.asp%3F3062241%2C140081%2C6485416071221184018%2C6586153083%2CS%2Csystemtarget%3D%2524qc%253d1307229780%253b%2524ql%253dmedium%253b%2524qpc%253d75001%253b%2524qpp%253d0%253b%2524qt%253d184_1903_42652t%253b%2524b%253d16330%253b%2524o%253d11999%253b%2524sh%253d768%253b%2524sw%253d1600%2C9908907%2CURL%3Dhttp%253a%252f%252fwww-03.ibm.com/systems/fr/x/hardware/highdensity/nextscale/sanslimite.html%253Fcmp%253D333AD%2526ct%253D333AD05W%2526cr%253DPCInpact%7CThematique_cloud%7CStandard_display%2526cm%253DB%2526csr%253Dswiotfr%7Cca%7Cintelxpress%7Cnextscale%7Cnextscale%7Cq12014%2526ccy%253DFR%2526cd%253D2014-03-03%2526cn%253Dq1%7CIntXpress%7Cleintel%7Cnextscale%7CBanner%7C300x600%7Cfr%2526csz%253D300x600%2526S_TACT%253D333AD05W&amp;clickTag=http%3A//ad-emea.doubleclick.net/click%253Bh%253Dv8/3f0b/f/10e/%252a/q%253B279872309%253B0-0%253B0%253B106864678%253B4986-300/600%253B57314831/57203942/1%253B%253B%257Esscs%253D%253fhttp%3A//ads.horyzon-media.com/clic/countgo.asp%3F3062241%2C140081%2C6485416071221184018%2C6586153083%2CS%2Csystemtarget%3D%2524qc%253d1307229780%253b%2524ql%253dmedium%253b%2524qpc%253d75001%253b%2524qpp%253d0%253b%2524qt%253d184_1903_42652t%253b%2524b%253d16330%253b%2524o%253d11999%253b%2524sh%253d768%253b%2524sw%253d1600%2C9908907%2CURL%3Dhttp%253a%252f%252fwww-03.ibm.com/systems/fr/x/hardware/highdensity/nextscale/sanslimite.html%253Fcmp%253D333AD%2526ct%253D333AD05W%2526cr%253DPCInpact%7CThematique_cloud%7CStandard_display%2526cm%253DB%2526csr%253Dswiotfr%7Cca%7Cintelxpress%7Cnextscale%7Cnextscale%7Cq12014%2526ccy%253DFR%2526cd%253D2014-03-03%2526cn%253Dq1%7CIntXpress%7Cleintel%7Cnextscale%7CBanner%7C300x600%7Cfr%2526csz%253D300x600%2526S_TACT%253D333AD05W" width="300" height="600" type="application/x-shockwave-flash" quality="high" swliveconnect="true" wmode="opaque" name="DCF279872309" base="http://s0.2mdn.net/4118425" allowscriptaccess="never"> </embed>         
    </div>
</div>

<style type="text/css">
    #pub{
        display: none;
    }
    #text_pub{
        display: none;
    }
</style>

<?php 
    $min = 1;
    $max = countAnecdotesValideesAleatoires();

//    if ($min != 1){
//        $max = $max -1;
//    }
    $random = rand($min, intval($max[0][0])-1);
    $uneAnecdote=  anecdotesValideesAleatoires();
    $inscrit = infoUser($uneAnecdote[$random][6]);
?>

<div id="anecdotes">
    <div id="text_anecdotes">
        <?php  echo $uneAnecdote[$random]['libelle_anecdote'] ?>
        <div id="split"></div>
        <div id="votes">
            <em> Postée par <a href="inscrit_anecdotes.php?login_inscrit=<?php echo $inscrit[0][1] ?>"> <?php echo $inscrit[0][1] ?> </a> le <?php echo $uneAnecdote[$random]['date_creation_anecdote'] ?> : 
                <?php if(isset($_SESSION['login'])){ ?>
                <img height="1%"width="1.5%" src="res/img/fleche_haut.png" alt="up" title="Up vote" onclick="upVote(<?php echo $uneAnecdote[$random]['num_anecdote']; ?>)"/>
                <img height="1%"width="1.5%" src="res/img/fleche_bas.png" alt="down" title="Down vote" onclick="downVote(<?php echo $uneAnecdote[$random]['num_anecdote']; ?>)"/>
            / <?php } ?><label id="<?php echo $uneAnecdote[$random]['num_anecdote']; ?>"><?php echo $uneAnecdote[$random]['nb_like'] - $uneAnecdote[$random]['nb_dislike'] ?></label>
                <label id="e<?php echo $uneAnecdote[$random]['num_anecdote']; ?>"></label>
            </em>
            <div align ="center"><em><a id="valider" href="aleatoire.php">Suivante</a></em></div>
        </div>
    </div>
</div>


<?php
include ($_SERVER['DOCUMENT_ROOT'].'/VieDeGeek/fragments/shared/footer.php');
?>
