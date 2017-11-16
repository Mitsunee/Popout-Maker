<?php
function fixGETlink($input_GET) { //function to fix links in $_GET by handling every instance of & as part of the link
	$output_GET = array();
	$foundLink = false;
	foreach ($input_GET as $key => $value) {
		if(!$foundLink) {
			$output_GET[$key]=$value;
			if($key=="link") $foundLink = TRUE;
		} else {
			$output_GET["link"] .= "&".$key."=".$value;
		}
	}
	return $output_GET;
}
?>