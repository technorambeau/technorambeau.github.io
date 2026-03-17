<?php
$LOGIN_INFORMATION = array(
  "6Rjrmko7!"
);
define( 'USE_USERNAME', false );
define( 'LOGOUT_URL', 'https://s.rambeau.free.fr' );
define( 'TIMEOUT_MINUTES', 60 );
define( 'TIMEOUT_CHECK_ACTIVITY', true );
$timeout = (TIMEOUT_MINUTES == 0 ? 0 : time() + TIMEOUT_MINUTES * 60);
if( isset($_GET['logout']) ) {
  setcookie( "verify", '', $timeout, '/' ); 
  header( 'Location: ' . LOGOUT_URL );
  exit();
}
if( !function_exists( 'showLoginPasswordProtect' ) ) {
	function showLoginPasswordProtect( $error_msg ) {
?>
<!doctype html><html lang="fr"><head><META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE"><META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE"><title>Accès restreint</title><meta charset="utf-8"><title>Séquence 39 : Préparer le brevet. </title><meta name="author" content="s.rambeau"><meta name="rating" content="General"><meta name="robots" content="noindex,nofollow"><meta name="robots" content="noarchive"><meta name="generator" content="Lauyan TOWeb 8.1.3.813"><meta name="viewport" content="width=device-width, initial-scale=1.0"><link href="rss.xml" rel="alternate" type="application/rss+xml"><link href="_media/img/sq_icon/logotechno-3232.png" rel="shortcut icon" type="image/png"><link href="_media/img/thumb/logotechno.png" rel="apple-touch-icon"><meta name="msapplication-TileColor" content="#5835b8"><meta name="msapplication-TileImage" content="_media/img/thumb/logotechno.png"><link href="_scripts/bootstrap/css/bootstrap.min.css" rel="stylesheet"><link href="_frame/style.css" rel="stylesheet"><link rel="stylesheet" href="_scripts/bootstrap/css/font-awesome.min.css"><style>.alert a{color:#003399}.ta-left{text-align:left}.ta-center{text-align:center}.ta-justify{text-align:justify}.ta-right{text-align:right}.float-l{float:left}.float-r{float:right}</style><link href="_frame/print.css" rel="stylesheet" type="text/css" media="print"></head><body><div id="site"><div id="page"><header><div id="toolbar1" class="navbar"><div class="navbar-inner"><div class="container-fluid"><ul id="toolbar1_l" class="nav"><li><a id="logo" href="index.html"><span id="logo-lt">Techno </span><span id="logo-rt">Rambeau</span><br><span id="logo-sl">"L'échec est simplement l’opportunité de recommencer, cette fois de manière plus intelligente." – Henry Ford</span></a></li></ul><ul id="toolbar1_r" class="nav pull-right"><li><div id="sharebox"><a target="_blank" href="rss.xml" type="application/rss+xml" rel="noopener"><img style="width:24px;height:24px" src="_frame/tw-share-rss@2x.png" alt="rss"></a></div></li></ul></div></div></div><div id="toolbar2" class="navbar"><div class="navbar-inner"><div class="container-fluid"><ul id="toolbar2_r" class="nav pull-right"></ul><button type="button" class="btn btn-navbar" style="float:left" data-toggle="collapse" data-target=".nav-collapse"><span style="color:gray;text-shadow:none">Menu</span></button><div class="nav-collapse collapse"><ul id="toolbar2_l" class="nav"><li><ul id="mainmenu" class="nav"><li><a href="index.html">Notice</a></li><li><a href="presentation-de-la-technologie.html">C'est quoi la Techno ?</a></li><li><a href="contrat-et-sanctions.html">Ressources</a></li><li><a href="je-moccupe-quand-jai-fini.html">Je m'occupe quand j'ai fini !</a></li><li><a href="club-des-makers-coresponsables-fablab-creatif-vendredi-12h30-13h30.html">Club</a></li><li><a href="groupe.php">Prof</a></li><li class="active"><a href="archives.php">Archives</a></li><li><a href="sequence-01-test-de-survie-de-la-nasa.html">5°</a></li><li><a href="sequence-30-le-travail-de-groupe.html">3°</a></li><li><a href="revision-dnb.html">DNB</a></li><li><a href="ressource-davinci.html">Ressource : DaVinci</a></li></ul></li></ul></div></div></div></div></header><div id="content" class="container-fluid">
	<div style="margin-top:20px; text-align:center">
	<h1>Accès restreint</h1>
	<form method="post" class="form-horizontal">
	<p>Veuillez saisir le mot de passe pour accéder à cette page protégée</p>
<?php 
	if( $error_msg != "" ) 
		echo '<div style="width:320px; margin:16px auto 0 auto"><div class="alert alert-error">'.$error_msg.'</div></div>';
	if( USE_USERNAME ) 
		echo 'Identifiant:<br><input class="input-medium" type="text" name="access_login" /><br>'; 
?>
	Mot de Passe :<br>
    <input class="input-medium" type="password" name="access_password" /><p></p><input class="btn btn-primary" type="submit" name="Submit" value="Entrer" />
	</form>
<!--
	<br>
	<a style="font-size:10px; color: #B0B0B0; font-family: Verdana, Arial;" href="javascript:history.back()" title="">< Retour</a>
-->	
	</div>
</div><script src="_scripts/jquery/jquery.min.js"></script><script src="_scripts/bootstrap/js/bootstrap.min.js"></script><script>function onChangeSiteLang(href){var i=location.href.indexOf("?");if(i>0)href+=location.href.substr(i);document.location.href=href;}</script><script>$(document).ready(function(){if(location.href.indexOf("?")>0&&location.href.indexOf("twtheme=no")>0){if(typeof twLzyLoad!=="undefined"){window.addEventListener("load",twLzyLoad);window.addEventListener("scroll",twLzyLoad);window.addEventListener("resize",twLzyLoad);}$("#toolbar1,#toolbar2,#toolbar3,#footersmall,#footerfat").hide();var idbmk=location.href;idbmk=idbmk.substring(idbmk.lastIndexOf("#")+1,idbmk.lastIndexOf("?"));if(idbmk!="")$("html,body").animate({scrollTop:$("#"+idbmk).offset().top},0);}$("#site").prepend("<a href='javascript:void(0)' class='toTop' title='Haut de page'><i class='fa fa-angle-double-up fa-3x toTopLink'></i></a>");var offset=220;var duration=500;$(window).scroll(function(){if($(this).scrollTop()>offset){$(".toTop").fadeIn(duration);}else{$(".toTop").fadeOut(duration);}});$(".toTop").click(function(event){event.preventDefault();$("html, body").animate({scrollTop:0},duration);return(false);});if(typeof onTOWebPageLoaded=="function")onTOWebPageLoaded();});</script></body></html>
<?php
	  die();
	}
}
if (isset($_POST['access_password'])) {
  $login = isset($_POST['access_login']) ? $_POST['access_login'] : '';
  $pass = $_POST['access_password'];
  if (!USE_USERNAME && !in_array($pass, $LOGIN_INFORMATION)
  || (USE_USERNAME && ( !array_key_exists($login, $LOGIN_INFORMATION) || $LOGIN_INFORMATION[$login] != $pass ) ) 
  ) {
    showLoginPasswordProtect("Mot de passe incorrect. Accès refusé.");
  }
  else {
    setcookie("verify", md5($login.'%'.$pass), $timeout, '/');
    unset($_POST['access_login']);
    unset($_POST['access_password']);
    unset($_POST['Submit']);
  }
}
else {
  if (!isset($_COOKIE['verify'])) {
    showLoginPasswordProtect("");
  }
  $found = false;
  foreach($LOGIN_INFORMATION as $key=>$val) {
    $lp = (USE_USERNAME ? $key : '') .'%'.$val;
    if ($_COOKIE['verify'] == md5($lp)) {
      $found = true;
      if (TIMEOUT_CHECK_ACTIVITY) {
        setcookie("verify", md5($lp), $timeout, '/');
      }
      break;
    }
  }
  if (!$found) {
    showLoginPasswordProtect("");
  }
}
?>
<!doctype html><html lang="fr"><head><meta charset="utf-8"><title>Séquence 39 : Préparer le brevet. </title><meta name="author" content="s.rambeau"><meta name="rating" content="General"><meta name="robots" content="noindex,nofollow"><meta name="robots" content="noarchive"><meta name="generator" content="Lauyan TOWeb 8.1.3.813"><meta name="viewport" content="width=device-width, initial-scale=1.0"><link href="rss.xml" rel="alternate" type="application/rss+xml"><link href="_media/img/sq_icon/logotechno-3232.png" rel="shortcut icon" type="image/png"><link href="_media/img/thumb/logotechno.png" rel="apple-touch-icon"><meta name="msapplication-TileColor" content="#5835b8"><meta name="msapplication-TileImage" content="_media/img/thumb/logotechno.png"><link href="_scripts/bootstrap/css/bootstrap.min.css" rel="stylesheet"><link href="_frame/style.css" rel="stylesheet"><link rel="stylesheet" href="_scripts/bootstrap/css/font-awesome.min.css"><style>.alert a{color:#003399}.ta-left{text-align:left}.ta-center{text-align:center}.ta-justify{text-align:justify}.ta-right{text-align:right}.float-l{float:left}.float-r{float:right}</style><link href="_frame/print.css" rel="stylesheet" type="text/css" media="print"></head><body><div id="site"><div id="page"><header><div id="toolbar1" class="navbar"><div class="navbar-inner"><div class="container-fluid"><ul id="toolbar1_l" class="nav"><li><a id="logo" href="index.html"><span id="logo-lt">Techno </span><span id="logo-rt">Rambeau</span><br><span id="logo-sl">"L'échec est simplement l’opportunité de recommencer, cette fois de manière plus intelligente." – Henry Ford</span></a></li></ul><ul id="toolbar1_r" class="nav pull-right"><li><div id="sharebox"><a target="_blank" href="rss.xml" type="application/rss+xml" rel="noopener"><img style="width:24px;height:24px" src="_frame/tw-share-rss@2x.png" alt="rss"></a></div></li></ul></div></div></div><div id="toolbar2" class="navbar"><div class="navbar-inner"><div class="container-fluid"><ul id="toolbar2_r" class="nav pull-right"></ul><button type="button" class="btn btn-navbar" style="float:left" data-toggle="collapse" data-target=".nav-collapse"><span style="color:gray;text-shadow:none">Menu</span></button><div class="nav-collapse collapse"><ul id="toolbar2_l" class="nav"><li><ul id="mainmenu" class="nav"><li><a href="index.html">Notice</a></li><li><a href="presentation-de-la-technologie.html">C'est quoi la Techno ?</a></li><li><a href="contrat-et-sanctions.html">Ressources</a></li><li><a href="je-moccupe-quand-jai-fini.html">Je m'occupe quand j'ai fini !</a></li><li><a href="club-des-makers-coresponsables-fablab-creatif-vendredi-12h30-13h30.html">Club</a></li><li><a href="groupe.php">Prof</a></li><li class="active"><a href="archives.php">Archives</a></li><li><a href="sequence-01-test-de-survie-de-la-nasa.html">5°</a></li><li><a href="sequence-30-le-travail-de-groupe.html">3°</a></li><li><a href="revision-dnb.html">DNB</a></li><li><a href="ressource-davinci.html">Ressource : DaVinci</a></li></ul></li></ul></div></div></div></div></header><div id="content" class="container-fluid"><h1><span style="color:#FF0000;">Séquence 39 :&nbsp;Préparer le brevet.&nbsp;</span></h1><div id="topic" class="row-fluid"><div id="topic-inner"><div id="top-content" class="span12"><div class="twpara-row row-fluid"><div id="NeQsYITq" class="span12 tw-para "><h2><span style="color:#808080;">Objectifs et/ou compétences</span></h2><div class="ptext"><ul><li>S'entrainer à lire et à compléter un sujet type brevet en 30 min. 1 sujet à traiter en groupe. 1 à traiter seul.</li><li>Échanger avec la classe un maximum d'astuces pour remplir un sujet DNB en un minimum de temps.</li></ul></div></div></div><div class="twpara-row row-fluid"></div><div class="twpara-row row-fluid"><div id="qZzguUAX" class="span12 tw-para "><h2><strong><u>Activité :</u></strong></h2><div class="ptext"><p><u>Travail à rendre :</u></p><ul><li>1 sujet à réaliser en groupe&nbsp;: Ilot 1 -&gt; Sujet 1 etc.</li><li>Présentation orale :&nbsp;Préparer un exposé avec votre groupe sur le sujet (brevet blanc) que vous avez traité en classe.</li></ul><p><u>Vous aborderez les points suivants :</u></p><ul><li>Décrivez votre sujet (les autres groupes ne le connaissent pas)</li><li>En combien de temps avez vous fini votre sujet. Pourquoi ?</li><li>Expliquez la méthodologie que vous avez appliqué pour répondre à chaque question.</li><li>Expliquer les astuces que vous avez mises en œuvres pour répondre aux questions qui vous ont semblé difficiles</li><li>Expliquer pourquoi certaines questions vous ont paru faciles ou difficiles.+</li></ul><div><u>Barème :</u><br></div><ul><li><a href="_media/bareme-sequence36.pdf" target="_blank" rel="noopener nofollow" id="lnkc6e1f2f4">bareme-sequence36.pdf</a><br></li></ul></div></div></div><div class="twpara-row row-fluid"><div id="f6GB881s" class="span12 tw-para "><h2><u><strong>Sujets :</strong></u></h2><div class="ptext"><ul><li><a href="_media/1.pdf" target="_blank" rel="noopener nofollow" id="lnk12ec588a">Sujet DNB 1</a></li><li><a href="_media/2.pdf" target="_blank" rel="noopener nofollow" id="lnkab0634d3">Sujet DNB 2</a></li><li><a href="_media/3.pdf" target="_blank" rel="noopener nofollow" id="lnk3dece91e">Sujet DNB 3</a><br></li><li><a href="_media/4.pdf" target="_blank" rel="noopener nofollow" id="lnkf2baaf39">Sujet DNB 4</a><br></li><li><a href="_media/5.pdf" target="_blank" rel="noopener nofollow" id="lnk07c998d7">Sujet DNB 5</a><br></li><li><a href="_media/6.pdf" target="_blank" rel="noopener nofollow" id="lnk69ca6845">Sujet DNB 6</a><br></li><li><a href="_media/7.pdf" target="_blank" rel="noopener nofollow" id="lnk48fd4f0a">Sujet DNB 7</a><br></li><li><a href="_media/8.pdf" target="_blank" rel="noopener nofollow" id="lnk8098437e">Sujet DNB 8</a><br></li></ul></div></div></div><div class="twpara-row row-fluid"></div><div class="twpara-row row-fluid"><div id="i273GmPJ" class="span12 tw-para "><h2><u><strong>Ressources&nbsp;:</strong></u></h2><div class="ptext"><ul><li><a href="ressource-faire-un-expose.html" rel="nofollow" id="lnk1-i273GmPJ">Ressources : Faire un exposé</a></li></ul></div></div></div><div class="twpara-row row-fluid"></div></div></div></div></div></div></div><script src="_scripts/jquery/jquery.min.js"></script><script src="_scripts/bootstrap/js/bootstrap.min.js"></script><script>function onChangeSiteLang(href){var i=location.href.indexOf("?");if(i>0)href+=location.href.substr(i);document.location.href=href;}</script><script>$(document).ready(function(){if(location.href.indexOf("?")>0&&location.href.indexOf("twtheme=no")>0){if(typeof twLzyLoad!=="undefined"){window.addEventListener("load",twLzyLoad);window.addEventListener("scroll",twLzyLoad);window.addEventListener("resize",twLzyLoad);}$("#toolbar1,#toolbar2,#toolbar3,#footersmall,#footerfat").hide();var idbmk=location.href;idbmk=idbmk.substring(idbmk.lastIndexOf("#")+1,idbmk.lastIndexOf("?"));if(idbmk!="")$("html,body").animate({scrollTop:$("#"+idbmk).offset().top},0);}$("#site").prepend("<a href='javascript:void(0)' class='toTop' title='Haut de page'><i class='fa fa-angle-double-up fa-3x toTopLink'></i></a>");var offset=220;var duration=500;$(window).scroll(function(){if($(this).scrollTop()>offset){$(".toTop").fadeIn(duration);}else{$(".toTop").fadeOut(duration);}});$(".toTop").click(function(event){event.preventDefault();$("html, body").animate({scrollTop:0},duration);return(false);});if(typeof onTOWebPageLoaded=="function")onTOWebPageLoaded();});</script></body></html>