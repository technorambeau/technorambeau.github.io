<?php
@require_once("../common/com.php");
@require_once("files.php");
function getClientIP() {
    if (isset($_SERVER)) {
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
            return $_SERVER["HTTP_X_FORWARDED_FOR"];
        if (isset($_SERVER["HTTP_CLIENT_IP"]))
            return $_SERVER["HTTP_CLIENT_IP"];
        return $_SERVER["REMOTE_ADDR"];
    }
	return "";
}
$ordersdir 		= '../twsc/data/';		
$downloaddir 	= '../../_downloads/';	
$buffersize		= 8 * 1024;				
$authorized_ext = null; 				
$is_https		= true;			
$errorpages   	= array( "_message.html?=4jdpR2L84jdpR2L84jcixjPyJGP+A3L8EDIlR2bjBicvJncF5Dc84jIhJXYw1yd0JSPzNXYsNGI2lGZ84TMo9CPu4iL05WZtV2ZyFGajBSZkBycyV3bjBibF5TMoxjPiIXZ05WZjpjbnlGbh1Cd4VGdi0TZslHdzBidpRGP","_message.html?=4jdpR2L84jdpR2L84jcixjPyJGP+A3L8IDIlR2bjBicvJncF5Dc84jIhJXYw1yd0JSPzNXYsNGI2lGZ84TMo9CPu4iL05WZtV2ZyFGajBSZkBycyV3bjBibF5TMoxjPiIXZ05WZjpjbnlGbh1Cd4VGdi0TZslHdzBidpRGP","_message.html?=4jdpR2L84jdpR2L84jcixjPyJGP+A3L8MDIlR2bjBicvJncF5Dc84jIhJXYw1yd0JSPzNXYsNGI2lGZ84TMo9CPu4iL05WZtV2ZyFGajBSZkBycyV3bjBibF5TMoxjPiIXZ05WZjpjbnlGbh1Cd4VGdi0TZslHdzBidpRGP","_message.html?=4jdpR2L84jdpR2L84jcixjPyJGP+A3L8QDIlR2bjBicvJncF5Dc84jIhJXYw1yd0JSPzNXYsNGI2lGZ84TMo9CPu4iL05WZtV2ZyFGajBSZkBycyV3bjBibF5TMoxjPiIXZ05WZjpjbnlGbh1Cd4VGdi0TZslHdzBidpRGP","_message.html?=4jdpR2L84jdpR2L84jcixjPyJGP+A3L8UDIlR2bjBicvJncF5Dc84jIhJXYw1yd0JSPzNXYsNGI2lGZ84TMo9CPu4iL05WZtV2ZyFGajBSZkBycyV3bjBibF5TMoxjPiIXZ05WZjpjbnlGbh1Cd4VGdi0TZslHdzBidpRGP","_message.html?=4jdpR2L84jdpR2L84jcixjPyJGP+A3L8YDIlR2bjBicvJncF5Dc84jIhJXYw1yd0JSPzNXYsNGI2lGZ84TMo9CPu4iL05WZtV2ZyFGajBSZkBycyV3bjBibF5TMoxjPiIXZ05WZjpjbnlGbh1Cd4VGdi0TZslHdzBidpRGP","_message.html?=4jdpR2L84jdpR2L84jcixjPyJGP+A3L8cDIlR2bjBicvJncF5Dc84jIhJXYw1yd0JSPzNXYsNGI2lGZ84TMo9CPu4iL05WZtV2ZyFGajBSZkBycyV3bjBibF5TMoxjPiIXZ05WZjpjbnlGbh1Cd4VGdi0TZslHdzBidpRGP","_message.html?=4jdpR2L84jdpR2L84jcixjPyJGP+A3L8gDIlR2bjBicvJncF5Dc84jIhJXYw1yd0JSPzNXYsNGI2lGZ84TMo9CPu4iL05WZtV2ZyFGajBSZkBycyV3bjBibF5TMoxjPiIXZ05WZjpjbnlGbh1Cd4VGdi0TZslHdzBidpRGP" );  		 
$max_downloads = -1;
$max_period = -1;						
$lang = "fr";
$notify_email = "simon.rambeau@gmail.com";			
$CRLF = "\r\n";  
$CRLF2 = "\r\n";   
$stats_activated = false;
function IsFilePurchased( $orderfilename, $filename )
{
	return true;
	if( !file_exists( $orderfilename ) )
		return( true );
	$file_content = file_get_contents( $orderfilename );
	return( strstr($file_content, "dlfile=".$filename) !== false );
}
$myfile = $_REQUEST['ddl'];		
if( !empty( $myfile ) && $myfile[0] !== "." && $myfile[0] !== "/" ) 
{
	$filepath = "../../_media/".$myfile;
	if( @file_exists( $filepath ) && @is_file( $filepath ) )
	{
		$errorcode = 0;
		@header('Content-Description: File Transfer');
		@header('Content-Type: application/octet-stream');
		@header('Content-Disposition: attachment; filename="' . basename( $myfile ) .'"' );
		@header('Content-Transfer-Encoding: binary');
		@header('Expires: 0');
		@header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		@header('Pragma: public');
		@header('Content-Length: ' . filesize($filepath));
		ob_clean();
		flush();
		$fp = @fopen( $filepath, "rb" );
		while( !feof( $fp ) )
		{
			print( fread( $fp, $buffersize ) );
			ob_flush();
			flush();
			if( connection_aborted() )
			{
				$errorcode = 8; 
				break;
			}
		}
		if( $errorcode == 0 ) {
			if( $stats_activated ) {
				$dl_counter = 1;
				$dlstatfilename = "./data/" . basename( $myfile ). ".sta";
				if( file_exists( $dlstatfilename ) && filesize( $dlstatfilename ) > 0 ) {
					$dl_counter += file_get_contents( $dlstatfilename );			
				}
				file_put_contents( $dlstatfilename, $dl_counter );
			}
			exit;
		}
	}
}
$authorized_filenames = get_authorized_filenames_array();
$public_filenames = get_public_filenames_array();
$enabled_ext = ".mak";
$errorcode = 0;						
$myfile = $_REQUEST['dlfile'];		
$dlorder = $_REQUEST['dlorder'];	
$dlkey = $_REQUEST['dlkey'];		
if( !empty( $myfile ) && !empty( $dlkey ) && !empty( $dlorder )  ) 
{
	if( getCtr( $dlorder, $myfile ) == $dlkey ) {
		if( file_exists( "./data/".$dlorder.$enabled_ext ) && IsFilePurchased( $ordersdir.$dlorder.'.txt', $myfile ) )
		{
			$ini_array = null;
			if( file_exists( "./data/".$dlorder.$enabled_ext ) && filesize( "./data/".$dlorder.$enabled_ext ) > 20 ) 
			{
				$ini_array = parse_ini_file( "./data/".$dlorder.$enabled_ext );
				$nb_downloads = $ini_array["downloadcount_".$myfile];
				$expired_date = ( $max_period <= 0 ) ? "0" : $ini_array["expiredate_".$myfile];
			} 
			else
			{
				$nb_downloads = 0;
				$expired_date = "";
			}
			if( $expired_date == "" ) 
				$expired_date = ( $max_period <= 0 ) ? "0" : date( "Y-m-d", strtotime( "+".$max_period." days" ) );
			if( $max_downloads < 0 || $nb_downloads < $max_downloads ) 
			{
				if( $expired_date == "0" || date("Y-m-d") <= $expired_date )
				{
					$images_ext = array( '' ); 
					$filepath = $downloaddir . $myfile;
					$file_format = strtolower( substr( strrchr($myfile, '.'), 1 ) );
					if( ( $authorized_ext == null || in_array( $file_format, $authorized_ext) ) &&
						( $authorized_filenames == null || in_array( strtolower($myfile), $authorized_filenames) ) ) 
					{
						$filepath = $downloaddir . $myfile;
						if( file_exists( $filepath ) && is_file( $filepath ) )
						{
							if( in_array( $file_format, $images_ext) ) 
							{
								if( $file_format == "jpe" || $file_format == "jpeg" )
									$file_format = "jpg";
								header('Content-Type: image/' . $file_format );
							} 
							else 
							{
								header('Content-Description: File Transfer');
								header('Content-Type: application/octet-stream');
								header('Content-Disposition: attachment; filename="' . ( $public_filenames[ $myfile ] ) .'"' );
								header('Content-Transfer-Encoding: binary');
								header('Expires: 0');
								header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
								header('Pragma: public');
								header('Content-Length: ' . filesize($filepath));
							}
							ob_clean();
							flush();
							$fp = fopen( $filepath, "rb" );
							while( !feof( $fp ) )
							{
								print( fread( $fp, $buffersize ) );
								flush();
								ob_flush();
								if( connection_aborted() )
								{
									$errorcode = 8; 
									break;
								}
							}
							if( $errorcode == 0 ) 
							{
								$file_content = "";
								if( file_exists( "./data/".$dlorder.$enabled_ext ) && filesize( "./data/".$dlorder.$enabled_ext ) > 20 ) 
								{
									$file_content = file_get_contents( "./data/".$dlorder.$enabled_ext );
									if( strstr($file_content, "downloadcount_".$myfile."=".$nb_downloads.$CRLF2) !== false ) {
										$file_content = str_replace( "downloadcount_".$myfile."=".$nb_downloads.$CRLF2, 
																	 "downloadcount_".$myfile."=".($nb_downloads + 1).$CRLF2, 
																	 $file_content );
									} else {
										$file_content .= "downloadcount_".$myfile."=1".$CRLF2;
									}								
									if( $ini_array == null || ( $ini_array != null && $ini_array["expiredate_".$myfile] == "" ) )
										$file_content .= "expiredate_".$myfile."=".$expired_date.$CRLF2;
								}
								else
								{
									$file_content = "downloadcount_".$myfile."=1".$CRLF2;
									$file_content .= "expiredate_".$myfile."=".$expired_date.$CRLF2;
								}
								if( !$fh = fopen( "./data/".$dlorder.$enabled_ext, "w+") ) {
								} else {
									fwrite( $fh, $file_content );
									fclose( $fh );
								}
								exit;
							}
						} 
						else
							$errorcode = 7; 
					} 
					else
						$errorcode = 6; 
				}
				else
					$errorcode = 5; 
			}
			else 
				$errorcode = 4; 
		} else
			$errorcode = 3; 
	}
	else
		$errorcode = 2; 
} 
else {
	exit;
	$errorcode = 1; 
}
$url = ($is_https?'https://':'http://') . $_SERVER['HTTP_HOST']. rtrim( rtrim( rtrim(dirname($_SERVER['PHP_SELF']), '/\\'), '/\\'), '/\\'); 
$url = str_replace( "/_iserv/dlfiles", "", $url );
if( $notify_email != '' ) 
{
	$errmsg = "";
	if( $lang == "fr" ) 
	{
		$subject = "Erreur de téléchargement depuis votre site ".$url;
		$clientIP = getClientIP();
		if( $clientIP != "" && strlen( $clientIP ) <= 16 )
			$errmsg .= "Appel effectué par IP = ".$clientIP.$CRLF;
		$errmsg .= "Erreur code ".$errorcode." : ";
		switch( $errorcode ) 
		{
			case 1 	: $errmsg .= "appel au script de téléchargement avec parametre(s) vide(s) ou manquant(s)"; break;
			case 2 	: $errmsg .= "erreur de sécurité (la signature est invalide)"; break;
			case 3 	: $errmsg .= "le fichier de la commande/achat du client est absent ou bien ne contenait pas l'achat du fichier demandé"; break;
			case 4 	: $errmsg .= "le nombre maximum de téléchargements autorisé a été atteint"; break;
			case 5 	: $errmsg .= "téléchargement expiré (au dela de la période maximale définie/autorisée)"; break;
			case 6 	: $errmsg .= "le fichier à télécharger ne figure pas parmi ceux autorisés"; break;
			case 7 	: $errmsg .= "le fichier à télécharger est absent / n'existe pas sur le serveur"; break; 
			case 8 	: $errmsg .= "téléchargement annulé/interompu"; break;
			default : $errmsg .= "erreur interne inconnue"; break;
		}
		$errmsg .= $CRLF;
	}
	else
	{
		$subject = "File download error from your site ".$url;
		$clientIP = getClientIP();
		if( $clientIP != "" && strlen( $clientIP ) <= 16 )
			$errmsg .= "Download request from IP = ".$clientIP.$CRLF;
		$errmsg .= "Error code ".$errorcode." : ";
		switch( $errorcode ) 
		{
			case 1 	: $errmsg .= "request to download script with empty or missing parameter(s)"; break;
			case 2 	: $errmsg .= "security error (signature received is invalid)"; break;
			case 3 	: $errmsg .= "the order file of the customer is missing or does not contain the purchase of the file requested"; break;
			case 4 	: $errmsg .= "the maximum number of downloads has been reached"; break;
			case 5 	: $errmsg .= "expired download (out of the maximum authorized period"; break;
			case 6 	: $errmsg .= "request to a download file that does not exist in the authorized list"; break;
			case 7 	: $errmsg .= "requesto to a download file that does not exist on your web space"; break; 
			case 8 	: $errmsg .= "download cancelled / aborted"; break;
			default : $errmsg .= "unknow internal error"; break;
		}
		$errmsg .= $CRLF;
	}
	$MERCHANT_FROM = "<" . $notify_email . ">";
	$headers =  "MIME-Version: 1.0" . $CRLF .
				"Content-Type: text/plain; charset=utf-8" . $CRLF .
				"Content-Transfer-Encoding: 8bit" . $CRLF .
				"From: $MERCHANT_FROM" . $CRLF .
				"Return-Path: $MERCHANT_FROM" . $CRLF .
				"X-Mailer: PHP/" . phpversion() . $CRLF;
	@mail( $notify_email, '=?UTF-8?B?'.base64_encode($subject).'?=', $errmsg, $headers );
}	
$url .= "/" . $errorpages[ $errorcode - 1 ];
header('Location: ' . $url);
?>
