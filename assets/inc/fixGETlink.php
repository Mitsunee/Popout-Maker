<?php
function fixGETlink($input_GET) { //function for cleaning up links for API input
	//fix link in $_GET by handling every instance of & as part of the link
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
	
	//fix protocol missing slash
	$i=6;
	if(substr($output_GET["link"],4,1)=="s") $i++;
	$output_GET["link"] = substr($output_GET["link"],0,$i)."/".substr($output_GET["link"],$i);
	
	return $output_GET;
}
?>