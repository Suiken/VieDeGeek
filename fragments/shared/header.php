<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <head>
        <title><?php echo $page_title; ?></title>
        <link rel="stylesheet" type="text/css" href="res/style.css">
        <script type="text/javascript" src="../VieDeGeek/fragments/traitements/jquery.js"></script>
        <script type="text/javascript" src="../VieDeGeek/fragments/traitements/script.js"></script>
    </head>

<body>   
    
    <div id="content-header"> 
        <ul id="main-menu">

            <li><a href="index.php">Accueil</a></li>
            <li><div id="split_menu"></div></li>
            <li><a href="meilleurs.php">Les meilleures</a></li>
            <li><div id="split_menu"></div></li>
            <li><a href="controversees.php">Les plus controvers&eacute;es</a></li>
            <li><div id="split_menu"></div></li>
            <li><a href="aleatoire.php">Al&eacute;atoire</a></li>
            <?php
            if (isset($_SESSION['admin'])) {
                if ($_SESSION['admin'] == false) {
                    ?>
                    <li><div id="split_menu"></div></li>
                    <li><a href="sumision.php">Soumettre</a></li>
                    <li><div id="split_menu"></div></li>
                    <li><a href="profile.php">Mon compte</a></li>
                    <?php
                } else if ($_SESSION['admin'] == true) {
                    ?>
                    <li><div id="split_menu"></div></li>
                    <li><a href="validation.php">Validation</a></li>
                    <li><div id="split_menu"></div></li>
                    <li><a href="backoffice.php">Backoffice</a></li>
                    <?php
                }
            }
            if (isset($_SESSION['login'])) {
                ?>
                <li><div id="split_menu"></div></li>
                <li><a href="fragments/traitements/disconnect.php">Se d&eacute;connecter</a></li>
                <?php
            }
            ?>
        </ul>
    </div>
    
<div id="page">           
    <div id="content"> 

<div id="pub">
    <div id="text_pub">
        <?php if(!isset($_SESSION['login'])) { ?>
            <div id="login">
                <h3 align="center">Connexion</h3>
                <form method="post" action="fragments/traitements/connexion.php">
                    <table id="table" align="center">
                        <tr>
                            <td><label for="login"> Login : </label></td>     
                            <td><input type="text" name="login" id="login_connexion" required/></td>
                        </tr>
                        <tr>
                            <td><label> Mot de passe : </label></td>     
                            <td><input type="password" name="mdp" id="mdp_connexion" required/></td>
                        </tr>         
                    </table>
                    <p align="center"><input type="submit" name="connexion" value="Connexion" onclick="verifierLogin(this);"></p>
                    <p id="enregistrer"><a href="login.php">S'enregistrer</a></p>
                </form>
            </div>
        <?php } ?>   
        <div id="top3">
                <h3 align="center">Top des posteurs</h3>
                    <?php      
                    require_once 'fragments/traitements/inscrit.php';
                    $top3 = afficherTop3();
                    ?>
                    <table id="table" align="center">
                        <tr>
                            <td> <img height="50%" width="50%" src="res/img/or.png"/> </td>
                            <td><?php 
                                    echo $top3[0]['nom_inscrit'];  
                                    echo " : "; 
                                    echo $top3[0]['Score']." points"; 
                            ?></td>
                        </tr>
                        <tr>
                            <td> <img height="50%" width="50%" src="res/img/argent.png"/> </td>
                            <td><?php 
                                    echo $top3[1]['nom_inscrit'];  
                                    echo " : "; 
                                    echo $top3[1]['Score']." points"; 
                            ?></td>
                        </tr>
                        <tr>
                                <td> <img height="50%" width="50%" src="res/img/bronze.png"/> </td>
                            <td><?php 
                                    echo $top3[2]['nom_inscrit'];  
                                    echo " : "; 
                                    echo $top3[2]['Score']." points"; 
                            ?></td>
                            </tr>
                    </table>
            </div>

        <embed src="http://s0.2mdn.net/4118425/300x600_IBM_Intel_Nextscale.swf" flashvars="moviePath=http://s0.2mdn.net/4118425/&amp;moviepath=http://s0.2mdn.net/4118425/&amp;clickTag=http%3A//ad-emea.doubleclick.net/click%253Bh%253Dv8/3f0b/f/10e/%252a/q%253B279872309%253B0-0%253B0%253B106864678%253B4986-300/600%253B57314831/57203942/1%253B%253B%257Esscs%253D%253fhttp%3A//ads.horyzon-media.com/clic/countgo.asp%3F3062241%2C140081%2C6485416071221184018%2C6586153083%2CS%2Csystemtarget%3D%2524qc%253d1307229780%253b%2524ql%253dmedium%253b%2524qpc%253d75001%253b%2524qpp%253d0%253b%2524qt%253d184_1903_42652t%253b%2524b%253d16330%253b%2524o%253d11999%253b%2524sh%253d768%253b%2524sw%253d1600%2C9908907%2CURL%3Dhttp%253a%252f%252fwww-03.ibm.com/systems/fr/x/hardware/highdensity/nextscale/sanslimite.html%253Fcmp%253D333AD%2526ct%253D333AD05W%2526cr%253DPCInpact%7CThematique_cloud%7CStandard_display%2526cm%253DB%2526csr%253Dswiotfr%7Cca%7Cintelxpress%7Cnextscale%7Cnextscale%7Cq12014%2526ccy%253DFR%2526cd%253D2014-03-03%2526cn%253Dq1%7CIntXpress%7Cleintel%7Cnextscale%7CBanner%7C300x600%7Cfr%2526csz%253D300x600%2526S_TACT%253D333AD05W&amp;clickTag=http%3A//ad-emea.doubleclick.net/click%253Bh%253Dv8/3f0b/f/10e/%252a/q%253B279872309%253B0-0%253B0%253B106864678%253B4986-300/600%253B57314831/57203942/1%253B%253B%257Esscs%253D%253fhttp%3A//ads.horyzon-media.com/clic/countgo.asp%3F3062241%2C140081%2C6485416071221184018%2C6586153083%2CS%2Csystemtarget%3D%2524qc%253d1307229780%253b%2524ql%253dmedium%253b%2524qpc%253d75001%253b%2524qpp%253d0%253b%2524qt%253d184_1903_42652t%253b%2524b%253d16330%253b%2524o%253d11999%253b%2524sh%253d768%253b%2524sw%253d1600%2C9908907%2CURL%3Dhttp%253a%252f%252fwww-03.ibm.com/systems/fr/x/hardware/highdensity/nextscale/sanslimite.html%253Fcmp%253D333AD%2526ct%253D333AD05W%2526cr%253DPCInpact%7CThematique_cloud%7CStandard_display%2526cm%253DB%2526csr%253Dswiotfr%7Cca%7Cintelxpress%7Cnextscale%7Cnextscale%7Cq12014%2526ccy%253DFR%2526cd%253D2014-03-03%2526cn%253Dq1%7CIntXpress%7Cleintel%7Cnextscale%7CBanner%7C300x600%7Cfr%2526csz%253D300x600%2526S_TACT%253D333AD05W" width="300" height="600" type="application/x-shockwave-flash" quality="high" swliveconnect="true" wmode="opaque" name="DCF279872309" base="http://s0.2mdn.net/4118425" allowscriptaccess="never"> </embed>         
        <br/>
        <object type="application/x-shockwave-flash" data="http://s0.2mdn.net/ads/richmedia/studio/pv2/29279296/20140226071007869/Q1_Nexus7_FR_TechEvergreen_300x250_parent.swf" width="300" height="250" wmode="opaque" flashvars="varName=200_36_flash_inpage_1&amp;creativeId=57333668_1&amp;assetId=29361319&amp;renderingType=200_36&amp;assetType=Inpage&amp;layoutsConfig=&amp;click=https%3A%2F%2Fadclick.g.doubleclick.net%2Faclk%3Fsa%3DL%26ai%3DBoYNEdnkZU92TMoO98APcqoHYDQAAAAAQASAAOABQlt-Ypvj_____AVikr6sbYPv5_IKICoIBCWNhLWdvb2dsZbIBEHd3dy5nYW1la3VsdC5jb23IAQnaARhodHRwOi8vd3d3LmdhbWVrdWx0LmNvbS-oAwHgBAKaBRkI7rQmEJSy3zIY7JmYhQEgpK-rGyiklJsB2gUCCAGgBh_gBonHowE%26num%3D0%26sig%3DAOD64_2NR0JIKVjXJjtONTA95mNB-eTZcg%26client%3D%26adurl%3Dhttp%3A%2F%2Fwww3.smartadserver.com%2Fclic%2Fcountgo.asp%253F3015571%2C417398%2C1494858686827185680%2C4165567220%2CS%2Csystemtarget%253D%252524qc%25253d1307229780%25253b%252524ql%25253dmedium%25253b%252524qpc%25253d75001%25253b%252524qpp%25253d0%25253b%252524qt%25253d184_1903_42652t%25253b%252524b%25253d16330%25253b%252524o%25253d11999%25253b%252524sh%25253d768%25253b%252524sw%25253d1600%2Ctarget%253Dplatform%25253ddesktop%25253btype%25253dhome%25253bmembre%25253dnon%2C9794676%2CURL%253D&amp;clickN=1&amp;assets=Q1_Nexus7_FR_TechEvergreen_300x250_child.swf%253Dhttp%25253A%2F%2Fs0.2mdn.net%2Fads%2Frichmedia%2Fstudio%2Fpv2%2F29279296%2F20140226071007869%2FQ1_Nexus7_FR_TechEvergreen_300x250_child.swf%2526Q1_Nexus7_FR_TechEvergreen_300x250.jpg%253Dhttp%25253A%2F%2Fs0.2mdn.net%2Fads%2Frichmedia%2Fstudio%2Fpv2%2F29279296%2F20140226071007869%2FQ1_Nexus7_FR_TechEvergreen_300x250.jpg&amp;vcData=&amp;exitEvents=name%253ABackground_Clickthrough%252Curl%253Ahttps%25253A%2F%2Fplay.google.com%2Fstore%2Fdevices%2Fdetails%25253Fid%25253Dnexus_7_16gb_2013%252Ctarget%253A_blank%7BDELIM%7Dname%253ACTA_Clickthrough%252Curl%253Ahttps%25253A%2F%2Fplay.google.com%2Fstore%2Fdevices%2Fdetails%25253Fid%25253Dnexus_7_16gb_2013%252Ctarget%253A_blank&amp;sn=N5295.CNET&amp;sid=629358&amp;adv=2679689&amp;buy=7983032&amp;pid=106420500&amp;aid=279317740&amp;cid=57333668&amp;rid=57222767&amp;ct=FR&amp;st=&amp;city=4984&amp;dma=0&amp;zp=75012&amp;bw=4&amp;br=cr&amp;isFlashFullScreenEnabled=true&amp;td=http%3A%2F%2Fwww.gamekult.com&amp;adSiteUrl=http%3A%2F%2Fwww.gamekult.com%2F&amp;googleDiscoveryUrl=http%3A%2F%2Fpagead2.googlesyndication.com%2Fpagead%2Fads%3Fclient%3Ddclk-3pas-query%26output%3Dxml%26geo%3Dtrue&amp;dcData=&amp;customMetaData=&amp;ispushdown=false&amp;expEnv=basic&amp;" name="FLASH_200_36_flash_inpage_1" id="FLASH_200_36_flash_inpage_1" allowscriptaccess="always" allowfullscreeninteractive="true" allowfullscreen="true" style="outline: none; position: relative; z-index: 10; opacity: 1;"></object>                                

    </div>
</div>