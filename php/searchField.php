<?php
$xmlDoc = new DOMDocument(); //Load an XML file into a new XML DOM object if strlen($q) >0)
$xmlDoc->load('../xml/searchLinks.xml');
$searchLinks = $xmlDoc -> getElementsByTagName('company');
//get the q parameter from URL
$q = $_GET["q"];
//lookup all links from searchLinks.xml if length of q>0
if(strlen($q) > 0){
	$hint = "";
	for($i=0; $i < ($searchLinks -> length); $i++){ //Loop through all <title> elements to find matches from the text sent from the JavaScript
		$name = $searchLinks -> item($i) -> getElementsByTagName('name');
		$url = $searchLinks -> item($i) -> getElementsByTagName('url');
		if($name -> item(0) -> nodeType == 1){
			//find a link matching the search text
			if(stristr($name -> item(0) -> childNodes -> item(0) -> nodeValue, $q)){
				if ($hint == ""){ //Sets the correct url and title in the "$response" variable. If more than one match is found, all matches are added to the variable
					$hint = "<a href='" . $url -> item(0) -> childNodes -> item(0) -> nodeValue . "'>" . $name -> item(0) -> childNodes -> item(0) -> nodeValue . "</a>";
				} else{
					$hint = $hint . "<br /><a href='" . $url -> item(0) -> childNodes -> item(0) -> nodeValue . "'>" . $name -> item(0) -> childNodes -> item(0) -> nodeValue . "</a>";
				}
			}
		}
	}
}
// Set output to "no suggestion" if no hint was found
// or to the correct values
if($hint == ""){
	$response = "no suggestion";//If no matches are found, the $response variable is set to "no suggestion"
} else {
  $response = $hint;
}
//output the response
echo $response;
?> 