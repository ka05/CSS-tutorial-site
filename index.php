<?php
    $db =true;
    include "src/inc/page_start.php";
    require_once PATH_INC . "functions.php";
    print_header($_GET['page']);
    print_nav($_GET['name']);
?>

  <section>
    <div class="colMain section " id="main-cont">
	  <?php
	  
	  $page_name = $_GET['name'];
	  $page_sep = $_GET['page'];
	  $page_type = $_GET['type'];
	  
	  if(isset($_GET['name'])){
	    $query = "SELECT * FROM css_site WHERE css_site.category = '$page_name' ORDER BY id ASC";
	    $title_array = array();
	    $category_array = array();
	    $heading_array = array();
	  
	    if ($result = $link->query($query)) {
	      while ($row = $result->fetch_assoc()) {
		  
		array_push($title_array, $row["title"]);
		array_push($heading_array, $row["heading"]);
	      }
	      $result->free();
	    }
	    echo "<nav class='loc-nav nav-effect-2 local-nav' id='loc-nav'>";
	    foreach ($title_array as $value){
		if (strpos($value, 'Main') !== false){
		    //$value = str_replace(" Main", "", $value);
		    echo "<a href='index.php?name=$page_name&amp;page=$value'>";
		    $value = str_replace("_Main", "", $value);
		    $value = str_replace("_", " ", $value);
		    echo $value;
		    echo "</a>";
		    $value = $value. " Main";
		}
		
		if(strpos($value, 'Main') == false){
		    if((strpos($value, 'Embedded') !== false) ||
		       (strpos($value, 'External') !== false) ||
		       (strpos($value, 'Inline') !== false)){
			echo "<a href='index.php?name=$page_name&amp;page=$value&amp;type=NoBox'>$value</a>";
		    }
		    else{
			echo "<a href='index.php?name=$page_name&amp;page=$value&amp;type=Reg'>";
			$value = str_replace("_", " ", $value);
			echo $value;
			echo "</a>";
		    }
		}
	    }
	    
	    echo "</nav>";
	  }
	  if(isset($_GET['page'])){
	    
	    $query = "SELECT * FROM css_site WHERE css_site.title = '$page_sep'";
	    $title_array = array();
	    $category_array = array();
	    $heading_array = array();
	    
	    if ($result = $link->query($query)) {
	      while ($row = $result->fetch_assoc()) {
		  
		  $title .= $row["title"];
		  $heading .= $row["heading"];
		  $description .= $row["description"];
		  $content .= $row["content"];
		  $htmlCode = htmlspecialchars($row["html_code"], ENT_QUOTES);
		  $htmlCode = preg_replace("/\r\n|\r/", "<br />", $htmlCode);
		  $cssCode .= $row["css_code"];
		  $cssCode = preg_replace("/\r\n|\r/", "<br />", $cssCode);
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
	      echo "<h1 id='sectionTitle'>$heading</h1><hr>
		    <div class='colSingle'>
		      $description
		      
		      <div class='content'>$content</div>
		    </div>
		  </div>
		</section>
	      </div>";
	    }
	    if (strpos($page_type,'Reg') !== false){
	      echo "<h1 id='sectionTitle'>$heading</h1><hr>
			    <div class='col1'>
			      $description
			    </div>
			    
			    <div class='col2'>
			      	<div class='output'>
						<h5 class='code-title'>OUTPUT</h5>
						<div class='code-box-inner'>$outputCode</div>
			      	</div>
			      	<div class='code-box'>
						<h5 class='code-title'>HTML</h5>
						<div class='html-code code-box-inner'>$htmlCode</div>
						<h5 class='code-title'>CSS</h5>
						<div class='cssCode code-box-inner'>$cssCode</div>
			      	</div>
			      	<a href='http://nova.it.rit.edu/~group_three/index.php?name=Interpreter&amp;page=$page_sep' class='btn'>Try it!</a>
			    </div>
		  	</div>
		</section>
	      </div>";
	    }
	    if(strpos($page_type,'NoBox') !== false){
		echo "<h1 id='sectionTitle'>$heading</h1><hr>
		    <div class='col1'>
		      $description
		    </div>
		    
		  </div>
		</section>
	      </div>";
	    }
	  } 
	  if (strpos($page_name,'Interpreter') !== false){
	    
		$query = "SELECT * FROM css_site WHERE css_site.title = '$page_sep'";
		$title_array = array();
		$category_array = array();
		$heading_array = array();
		
		if ($result = $link->query($query)) {
		  while ($row = $result->fetch_assoc()) {
		      
		      $htmlCode = htmlspecialchars($row["html_code"], ENT_QUOTES);
		      $css_code = str_replace("<br />", "\n", $row["css_code"]);
		      $css_code = str_replace("</span>", "", $css_code);
		      $css_code = str_replace('"',"'",$css_code);
		      $css_code = str_replace("<span class='css_name'>", "", $css_code);
		      $css_code = str_replace("<span>", "", $css_code);
		      $css_code = str_replace("<span class='css_class'>", "", $css_code);
		      $css_code = str_replace("<span class='css_id'>", "", $css_code);
		      
		  }
		  $result->free();
		}
	    
	    
	    echo "<h1 id='sectionTitle'>Go ahead, try some CSS!</h1><hr>
			    <div class='col1'>
			      	<div class='code-box'>
						<h5 class='code-title'>HTML</h5>
						<div class='html-code'>
						  	<textarea class='box' id='htmlbox'>$htmlCode</textarea>
						</div>
					  	<h5 class='code-title'>CSS</h5>
					  	<div class='cssCode'>
					  		<textarea class='box' id='cssbox'>$css_code</textarea>
					  	</div>
			      	</div>
			      	<button type='button' id='submitbutton' onclick='run();' class='btn'>Submit Code</button>
			      	<h4>Filename:</h4><input id='inputFileNameToSaveAs'/>
			      	<button type='button' id='savebutton' onclick='saveTextAsFile();' class='btn'>Save Code</button>
			    </div>
			    <div class='col2'>
			      	<div class='output'>
					  <h5 class='code-title'>OUTPUT</h5>
					  <iframe id='output' src='interpreter/blank.html' seamless></iframe>
			    	</div>
			  	</div>
			  	</div>
		  	</section>
		  	</div>";
	  }
	  ?>
	  
<?php print_footer(); ?>