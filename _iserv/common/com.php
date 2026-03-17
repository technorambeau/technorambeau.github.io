<?php
	function actual_date( $datefmt, $UseTimeServer, $HourOffset ) {
		if ( $HourOffset < -12 || $HourOffset > 12 ) 
			$HourOffset = 0;
		$timestamp = time() + $HourOffset * 3600;
		if( $UseTimeServer )
			return date( $datefmt, $timestamp );  
		return gmdate( $datefmt, $timestamp );
	}
	function getCtr( $oid, $fmt ) {
		$SALT = 'd172eabb';	
		return md5( $SALT.$oid.$SALT.$fmt.$SALT );
	}
	function checkIServDataDir( $relpath, $iserv, $diplayresult )
	{
		$idir = $relpath . $iserv . '/data';
		if( is_dir( $idir ) )
		{
			$result = "";
			if( file_exists( $idir .'/index.html' ) ) {
				$result = "$iserv ok";
			} else {
			    if( !$handle = fopen( $idir .'/index.html', 'w' ) ) {
					$result = "$iserv KO";
			    } else {
					if( fwrite($handle, " ") === FALSE ) {
						$result = "$iserv KO";
					} else {
						$result = "$iserv DONE";
					}					
					fclose($handle);
			    }
			}
			if( $iserv == "twsc" ) {
				if( !$handle = fopen( $idir .'/.htaccess', 'w' ) ) {
					unlink( $idir .'/.htaccess' );
					$result .= " (.htaccess deleted)";					
				} else {
					fwrite($handle, "IndexIgnore *");
					fclose($handle);
					$result .= " (.htaccess updated)";					
				}
			}
			if( $result !== "" )
				$result .= "<br>";
			if( $diplayresult )
				echo $result;
		}
	}
	function checkAllIServDataDirs( $relpath, $diplayresult )
	{
		if( $relpath == "" )
			$relpath = "../";
		checkIServDataDir( $relpath, 'twsc', $diplayresult );
		checkIServDataDir( $relpath, 'poll', $diplayresult );
		checkIServDataDir( $relpath, 'form2mail', $diplayresult );
		checkIServDataDir( $relpath, 'blog', $diplayresult );
		checkIServDataDir( $relpath, 'dfiles', $diplayresult );
	}
	function ExtractStringBetween($var1="",$var2="",$pool) {
		if( strstr($pool, $var1) === false )
			return "";
		$temp1 = strpos($pool,$var1)+strlen($var1);
		$result = substr($pool,$temp1,strlen($pool));
		$dd=strpos($result,$var2);
		if( $dd == 0 ) {
			$dd = strlen($result);
		}
		return substr($result,0,$dd);
	}	
?>
