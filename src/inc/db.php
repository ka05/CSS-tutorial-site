<?php
    require_once "php/functions.php";
//function display_code($pageName){
    $mysqli = new mysqli("localhost", "group_three", "fr1end", "group_three");
    /* Set up variables */
    $title = '';
    $category = '';
    $heading = '';
    $description = '';
    $htmlCode = '';
    $cssCode = '';
    $outputCode = '';
    $result = '';
    $page_name = $_GET['name'];
    $row = array();
    //echo $pageName;
    /* check connection */
    if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
    }
    
    $query = "SELECT * FROM css_site WHERE css_site.title = '$page_name'";
    
    if ($result = $mysqli->query($query)) {
    	while ($row = $result->fetch_assoc()) {
	    
	    $title .= $row["title"];
	    $heading .= $row["heading"];
	    $description .= $row["description"];
	    
	    $htmlCode = htmlspecialchars($row["html_code"], ENT_QUOTES);
	    $htmlCode .= nl2br2($htmlCode);
	    
	    $cssCode = nl2br2($row["css_code"]);
	    $newtext = wordwrap($text, 20, "<br />\n");
	    $outputCode .= $row["output_code"];
	    $category .= $row["category"];
	}
	$result->free();
    }
    
    /* close connection */
    $mysqli->close();
//}

?>