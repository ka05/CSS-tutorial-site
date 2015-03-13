<?php
  // Initialize everything I'll need for the page

  define( "PATH", "/home/dolejnic99/public_html/ka05/projects/Group_Proj/" );
  define( "PATH_INC", PATH . "src/inc/" );

  define( "URL", "http://blurhr.com/ka05/projects/Group_Proj/" );
  define( "URL_CSS", URL . "src/css/" );
  define( "URL_JS", URL . "src/js/" );

  define( "SITE_TITLE", "LCSS" );


  // Include any PHP function libraries or classes
  include "/home/dolejnic99/public_html/ka05/db_con.group3.php";
  if($db){
    $link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if(!$link){
        echo "connection error: " . mysqli_connect_error();
        die();
    }
  }

?>
