<?php
$errors = array();

if(isset($_POST['submit'])) {
    
    $mysqli = new mysqli("localhost", "group_three", "fr1end", "group_three");
            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
            }
    
    //personal variables
    $title = $_POST["title"];
    $category = $_POST["category"];
    $heading = $_POST["heading"];
    $description = $_POST["description"];
    $content = $_POST["content"];
    $html_code = $_POST["html_code"];
    $output_code = $_POST["output_code"];
    
    
    $newFormTitle = $mysqli->real_escape_string($title);
    $newFormCategory = $mysqli->real_escape_string($category);
    $newFormHeading = $mysqli->real_escape_string($heading);
    $newFormDesc = $mysqli->real_escape_string($description);
    $newFormContent = $mysqli->real_escape_string($content);
    $newFormHtml = $mysqli->real_escape_string($html_code);
    $newFormOutput = $mysqli->real_escape_string($output_code);
    
    $css_code = preg_replace("/\r\n|\r/", "", $_POST["css_code"]);
    
    
    $css_new = explode("}", $css_code);
    //print_r($css_new);
    $css_clean = "";
    $css_edit = "";
    $css_cleansed_class = "";
    $css_cleansed_id = "";
    
    foreach($css_new as $i){
        if(preg_match("/^[\.]/", $i)){
            $css_edit = explode("{", $i); 
            $css_cleansed_class = '<span class="css_class">'. $css_edit[0] . '</span><span>{<br />' . $css_edit[1] . '<br />}</span><br />';
            $css_clean .= $css_cleansed_class;
        }
        if(preg_match("/^[\#]/", $i)){
            $css_edit = explode("{", $i); 
            $css_cleansed_id = '<span class="css_id">'. $css_edit[0] . '</span><span>{<br />' . $css_edit[1] . '<br />}</span><br />';
            $css_clean .= $css_cleansed_id;
        }
        if(preg_match("/^[\$]/", $i)){
            $css_edit = explode("{", $i);
            $css_edit_new = str_replace("$", "", $css_edit[0]);
            $css_cleansed_name = '<span class="css_name">'. $css_edit_new . '</span><span>{<br />' . $css_edit[1] . '<br />}</span><br />';
            $css_clean .= $css_cleansed_name;
        }
    }
    $css_code = $css_clean;
    //echo $css_code;
    
    if(!empty($_POST)){	
        //title
        if( strlen($title) < 2){
          $errors[] = "Please enter a title. \n";
        }
        //category
        if( empty($category)){
          $errors[] = "Please enter a category. \n";
        }
        //heading
        if( empty($heading)){
          $errors[] = "Please enter a heading. \n";
        }
        //description
        if( empty($description)){
          $errors[] = "Please enter a description. \n";
        }
        /*
        //description
        if( empty($html_code)){
          $errors[] = "Please enter a description. \n";
        }
        //css_code
        if( empty($css_code)){
          $errors[] = "Please enter a css_code. \n";
        }
        //output_code
        if( empty($output_code)){
          $errors[] = "Please enter a output_code. \n";
        }
        */
        if(count($errors) == 0){
            //send to db
            
            mysqli_query($mysqli,"INSERT INTO css_site (title, category, heading, description, content, html_code, css_code, output_code, date) VALUES ('$newFormTitle', '$newFormCategory', '$newFormHeading', '$newFormDesc', '$newFormContent', '$newFormHtml', '$css_code', '$newFormOutput', CURRENT_TIMESTAMP)");
            
            $mysqli->close();
            
            if (!empty($_POST)){
	    echo "<script type='text/javascript'>
	    console.log('yes deleted');
	    alert('Thank you for submitting! Please check you email for a detailed order confirmation.');
	    </script>";
	}
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CSS Site Form</title>
    <link rel="stylesheet" href="form-styles.css">
</head>
<body>
    <h2>This form is for our group to use to enter data into the database</h2>
    <div class="col1">
        <form id="css-site-form"
            method="post"
            action="form.php">
            
            <label for="title" class="col">Title: </label>
            <input type="text" name ="title"  id="title"
                placeholder="Enter page title" value="<?= $_POST['title']; ?>"><br>
                
            <label for="category" class="col">Category: </label>
            <input type="text" name ="category"  id="category"
                placeholder="Enter category" value="<?= $_POST['category']; ?>"><br>
                
            <label for="heading" class="col">Heading: </label>
            <input type="text" name ="heading"  id="heading"
                placeholder="Enter heading" value="<?= $_POST['heading']; ?>"><br><br>
            
            <label for="description">Description: </label><br>
            <textarea placeholder="description" id="description" name="description"><?= $_POST['description']; ?></textarea><br>
            
            <label for="content">Content: </label><br>
            <textarea placeholder="content" id="content" name="content"><?= $_POST['content']; ?></textarea><br>
            
            <label for="html_code" class="col">html_code: </label><br>
            <textarea placeholder="html_code" id="html_code" name="html_code"><?= $_POST['html_code']; ?></textarea><br>
            
            <label for="css_code" class="col">css_code: </label><br>
            <textarea placeholder="css_code" id="css_code" name="css_code"><?= $_POST['css_code']; ?></textarea><br>
            
            <label for="output_code" class="col">output_code: </label><br>
            <textarea placeholder="output_code" id="output_code" name="output_code"><?= $_POST['output_code']; ?></textarea><br><br>
            
            <input type="submit" value="Submit me!" name="submit" id="submitButton"/>
        </form>
    </div>
    <div class="col2">
        <h3><span class="red">PLEASE READ BEFORE ENTERING DATA!!!</span></h3>
        <ul>
            <li>When entering into Description Box Use the necessary HTML tags to format the page description as you like it. Please take a look at the <a href="http://nova.it.rit.edu/~group_three/index.php?name=Spacing&page=Margins&type=Reg">"Margins"</a> Page for an example.</li>
            <li>NO NEED to use "br" tags in the <span class="red">html_code, css_code and output_code</span> boxes.</li>
            <li>When using p tags and ul tags, use the classes "para" for paragraphs and "bullet" for the unordered lists.</li>
            <li>When filling out the CSS_Code field do the following:
            <ul>
                <li><span class="red">use $</span> before any html element tag that is not a class or id: ex: body{ color:red; } instead do this $body{ color:red; }</li>
                <li>enter to new line after each part of the css code: ex: body{ [enter here] color:red; [enter here] } [enter here]</li>
            
            </ul></li>
        </ul>
        <h3>Go to the link below to see the example i entered in, this is what it will look like.</h3>
        <a href="http://nova.it.rit.edu/~group_three/index.php?page=Sample&type=Reg">http://nova.it.rit.edu/~group_three/index.php?page=Sample</a>
        <h3>Example for adding code to the css_code box: please do exactly as shown, thank you</h3>
        <img src='sample.png'>
        <?php
        if(count($errors) > 0){
           echo "<div style='color:red'>";
           foreach($errors as $errors){
             echo $errors . "<br>";
           }
           echo "</div>";
           
           if(preg_match_all('/\.(.*?)\{/',$css_code,$match)){
            var_dump($match[1]);
            }
         }
        ?>
	
	<h3>Use the following for the landing page for each section: <span class="red">"title"</span> and <span class="red">"category":</span></h3>
	<ul>
	    <li><b>Title:</b>Multiple Elements Main<br /><b>Category:</b>Multiple Elements</li>
	    <li><b>Title:</b>Stylesheets Main<br /><b>Category:</b>Stylesheets</li>
	    <li><b>Title:</b>Cross-Browser Main<br /><b>Category:</b>Cross-Browser</li>
	    <li><b>Title:</b>HTML Identifiers Main<br /><b>Category:</b>HTML Identifiers</li>
	    <li><b>Title:</b>Format/Notation Main<br /><b>Category:</b>Format/Notation</li>
	    <li><b>Title:</b>Box Model Main<br /><b>Category:</b>Box Model</li>
	    <li><b>Title:</b>Media Queries Main<br /><b>Category:</b>Media Queries</li>
	    <li><b>Title:</b>Positioning Main<br /><b>Category:</b>Positioning</li>
	    <li><b>Title:</b>Fonts Main<br /><b>Category:</b>Fonts</li>
	    <li><b>Title:</b>Borders Main<br /><b>Category:</b>Borders</li>
	    <li><b>Title:</b>Spacing Main<br /><b>Category:</b>Spacing</li>
	    <li><b>Title:</b>Colors Main<br /><b>Category:</b>Colors</li>
	    <li><b>Title:</b>Z-index Main<br /><b>Category:</b>Z-index</li>
	    <li><b>Title:</b>Shadows Main<br /><b>Category:</b>Shadows</li>
	    <li><b>Title:</b>Floats Main<br /><b>Category:</b>Floats</li>
	    <li><b>Title:</b>Transitions Main<br /><b>Category:</b>Transitions</li>
	    <li><b>Title:</b>Animations Main<br /><b>Category:</b>Animations</li>
	    
	</ul>
	<p>For the pages withi each section use the corresponding <span class="red">"Category"</span> Name. You can use anything you want for the Title</p>
    </div>
    
</body>
</html>
