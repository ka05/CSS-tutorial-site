<?php
  require_once "php/functions.php";
  //require_once "php/db.php";
  print_header($_GET['page']);
  print_nav($_GET['name']);
?>

  <section>
    <div class="colMain section">
      <nav>
	<ul>
	  <?php
	  $mysqli = new mysqli("localhost", "group_three", "fr1end", "group_three");
	  /* check connection */
	  if (mysqli_connect_errno()) {
	      printf("Connect failed: %s\n", mysqli_connect_error());
	      exit();
	  }
	  $page_name = $_GET['name'];
	  $page_sep = $_GET['page'];
	  
	  if(isset($_GET['name'])){
	    $query = "SELECT * FROM css_site WHERE css_site.category = '$page_name'";
	    $title_array = array();
	    $category_array = array();
	    $heading_array = array();
	  
	    if ($result = $mysqli->query($query)) {
	      while ($row = $result->fetch_assoc()) {
		  
		array_push($title_array, $row["title"]);
		array_push($heading_array, $row["heading"]);
		//$title .= $row["title"];
		//$heading .= $row["heading"];
		//$description .= $row["description"];
		//$htmlCode = htmlspecialchars($row["html_code"], ENT_QUOTES);
		//$htmlCode = str_replace("\r\n", "<br>", $htmlCode);
		//$cssCode .= $row["css_code"];
		//$outputCode .= $row["output_code"];
		//$category .= $row["category"];
		//array_push($category_array, $row["category"]);
	      }
	      $result->free();
	    }
	    echo "<div class='local-nav'>";
	    foreach ($title_array as $value){
	      echo "<a href='exercise.php?name=$page_name&page=$value'class='local-nav-item'>$value</a>";
	    }
	    echo "</div>";
	    
	   
	    
	    
	  }
	  if(isset($_GET['page'])){
	    
	    $query = "SELECT * FROM css_site WHERE css_site.title = '$page_sep'";
	    $title_array = array();
	    $category_array = array();
	    $heading_array = array();
	    
	    
	    if ($result = $mysqli->query($query)) {
	      while ($row = $result->fetch_assoc()) {
		  
		  $title .= $row["title"];
		  $heading .= $row["heading"];
		  $description .= $row["description"];
		  $htmlCode = htmlspecialchars($row["html_code"], ENT_QUOTES);
		  $htmlCode = str_replace("\r\n", "<br>", $htmlCode);
		  $cssCode .= $row["css_code"];
		  $outputCode .= $row["output_code"];
		  $category .= $row["category"];
		  
		  //arrays for nav
		  array_push($title_array, $row["title"]);
		  array_push($heading_array, $row["heading"]);
		  array_push($category_array, $row["category"]);
		  
	      }
	      $result->free();
	    }
	    if (strpos($page_sep,'Main') !== false){
	      echo "</ul>
		    </nav>
		    <h1 id='sectionTitle'>$heading</h1><hr>
		    <div class='colSingle'>
		      <p>$description</p>
		    </div>
		  </div>
		</section>
	      </div>";
	    }
	    else{
	      echo "</ul>
		    </nav>
		    <h1 id='sectionTitle'>$heading</h1><hr>
		    <div class='col1'>
		      <div class='code-box'>
			<h5 class='code-title'>HTML</h5>
			<div class='html-code code-box-inner'>$htmlCode</div>
			<h5 class='code-title'>CSS</h5>
			<div class='cssCode code-box-inner'>$cssCode</div>
		      </div>
		    </div>
		    
		    <div class='col2'>
		      <div class='output'>
			<h5 class='code-title'>OUTPUT</h5>
			<div class='code-box-inner'>$outputCode</div>
		      </div>
		    </div>
		    <div class='colSingle'>
		      <p>$description</p>
		    </div>
		  </div>
		</section>
	      </div>";
	    }
	  } 
	  
	  $mysqli->close();
	  ?>
	  
<?php print_footer(); ?>