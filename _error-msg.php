<?php
$HttpStatus = "";
if( isset($_SERVER["REDIRECT_STATUS"]) ) $HttpStatus = $_SERVER["REDIRECT_STATUS"];
if( $HttpStatus == "" ) { @$HttpStatus = $_REQUEST["err"]; }
$lang = "fr";
if( isset($_SERVER["HTTP_ACCEPT_LANGUAGE"]) ) $lang = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 2);
$redirecturl = "index.html";
if( $HttpStatus == 404) {
$redirecturl = "_message.html?==gP2lGZvwjP2lGZvwjPyJGP+InY84DcvwjbvlGdjVnc0NnbvNGIuVGIldWYw5Dc84jMo9CPg4jMoxjPiEmchBXL3RnI9M3chx2YgYXakxjPxg2L8IXdlJncF5TMoxjPiIXZ05WZjpjbnlGbh1Cd4VGdi0TZslHdzBidpRGP";}
if( $HttpStatus == 500) {
$redirecturl = "_message.html?=4jdpR2L84jdpR2L84jcixjPyJGP+A3L8I3byJXRgIXZ2JXZTBCbh5mclRnbJ5Dc84jMo9CPg4jMoxjPiEmchBXL3RnI9M3chx2YgYXakxjPxg2L8IXdlJncF5TMoxjPiIXZ05WZjpjbnlGbh1Cd4VGdi0TZslHdzBidpRGP";}
if( headers_sent() ) {
?>
<html>
<head>
<?php echo('<meta http-equiv="Refresh" content="0; url=https://s.rambeau.free.fr/'.$redirecturl.'">'); ?>
</head>
<body><p style="text-align:center"><br><br><b><a href="https://s.rambeau.free.fr/index.html">Erreur</a></body></html>
<?php
} else exit( header( "Location: https://s.rambeau.free.fr/" . $redirecturl ) );
?>