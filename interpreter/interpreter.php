<?php
  require_once "../php/functions.php";
  //require_once "php/db.php";
  print_header($_GET['page']);
  print_nav($_GET['name']);
?>

<section>
<div class="colMain section">
<h1 id='sectionTitle'>Go ahead, try some CSS!</h1><hr>
  <div class='col1'>
    <div class='code-box'>
        <h5 class='code-title'>HTML</h5>
        <div class='html-code'><textarea class="box" type="text" id="htmlbox"></textarea></div>
        <h5 class='code-title'>CSS</h5>
        <div class='cssCode'><textarea class="box" type="text" id="cssbox"></textarea></div>
    </div>
    <button type="button" id="submitbutton" onclick='run();' class='btn'>Submit Code</button>
    <h4>Filename:</h4><input id="inputFileNameToSaveAs"></input>
    <button type="button" id="savebutton" onclick='saveTextAsFile();' class='btn'>Save Code</button>
  </div>
  <div class='col2'>
    <div class='output'>
        <h5 class='code-title'>OUTPUT</h5>
        <iframe id="output" src="blank.html" seamless></iframe>
    </div>
  </div>
</div>
</section>
</div>
<?php print_footer(); ?>