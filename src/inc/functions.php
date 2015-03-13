<?php

function display_array($arr){
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
 }
 //NOTE: LOOKUP RDFa Namespaces

 function print_header($title){
    $title = str_replace("_Main", "", $title);
    $title = str_replace("_", " ", $title);
    echo "<!DOCTYPE html>
            <html lang='en'>
              <head>
                <meta charset='utf-8'>
                <title>LCSS | $title</title>
                <link href='http://blurhr.com/ka05/projects/Group_Proj/img/favicon.ico' rel='icon' type='image/x-icon' />
                <link rel='stylesheet' href='http://blurhr.com/ka05/projects/Group_Proj/src/css/styles.css'>
                <script src='http://blurhr.com/ka05/projects/Group_Proj/src/js/jquery-1.11.0.min.js'></script>
                <script type='text/javascript' src='http://blurhr.com/ka05/projects/Group_Proj/src/js/jquery-ui.js'></script>
                <script type='text/javascript' src='http://blurhr.com/ka05/projects/Group_Proj/src/js/demo_script.js'></script>
                <script type='text/javascript' src='http://blurhr.com/ka05/projects/Group_Proj/src/js/LCSS.js'></script>
                <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
              </head>
              <body onload='widthChangeLoad();'>
                <header id='header'>
                        <img src='http://blurhr.com/ka05/Group_Proj/src/img/CSS3.png' alt='Learn - CSS' id='CSS3Img' title='Learn - CSS' height='80' width='80' onclick='showMenu();'/>


                    <div id='pageTitle'>
                      <nav class='nav-effect' id='top-nav'>
                        <a href='http://blurhr.com/ka05/projects/Group_Proj/index.php?name=Home&amp;page=Home_Main' class='top'>Home</a>
                        <a href='http://blurhr.com/ka05/projects/Group_Proj/index.php?name=About&amp;page=About_Main' class='top'>About</a>
                        <a href='http://blurhr.com/ka05/projects/Group_Proj/index.php?name=Properties&amp;page=Properties_Main' class='top'>Properties</a>
                        <a href='http://blurhr.com/ka05/projects/Group_Proj/index.php?name=Sources&amp;page=Sources_Main' class='top'>Sources</a>
                      </nav>
                      <h1 id='site-title'>Learn CSS</h1>
                    </div>
                    <!--
                    <script type='text/javascript'>
                        var smallHW = parseInt(50);
                        var largeHW = parseInt(80);
                        smallHW += 'px';
                        largeHW += 'px';
                        var cssImg = document.getElementById('CSS3Img');
                        var header = document.getElementById('header');
                        var siteTitle = document.getElementById('site-title');

                        $(window).scroll(function(){
                            //console.log($(window).scrollTop());
                            if($(window).scrollTop() > 5)
                            {
                                cssImg.className = 'active';
                                header.className = 'active';
                                siteTitle.style.display = 'none';
                            }
                            if($(window).scrollTop() < 1){
                                cssImg.className = '';
                                header.className = '';
                                siteTitle.style.display = 'block';
                            }
                        });
                    </script>
                    -->
                </header>";
 }
 function print_nav($active_page){


    if($active_page == "Stylesheets"){
        $stylesheets = "active-nav";
    }
    else if($active_page == "Cross-Browser"){
        $cross_browser = "active-nav";
    }
    else if($active_page == "HTML_Identifiers"){
        $identifiers = "active-nav";
    }
    else if($active_page == "Format/Notation"){
        $format = "active-nav";
    }
    else if($active_page == "Box_Model"){
        $box_model = "active-nav";
    }
    else if($active_page == "Media_Queries"){
        $media_queries = "active-nav";
    }
    else if($active_page == "Positioning"){
        $positioning = "active-nav";
    }
    else if($active_page == "Fonts"){
        $fonts = "active-nav";
    }
    else if($active_page == "Border"){
        $border = "active-nav";
    }
    else if($active_page == "Spacing"){
        $spacing = "active-nav";
    }
    else if($active_page == "Colors"){
        $colors = "active-nav";
    }
    else if($active_page == "Z-index"){
        $z_index = "active-nav";
    }
    else if($active_page == "Shadows"){
        $shadows = "active-nav";
    }
    else if($active_page == "Floats"){
        $floats = "active-nav";
    }
    else if($active_page == "Hover"){
        $hover = "active-nav";
    }
    else if($active_page == "Transitions"){
        $transitions = "active-nav";
    }
    else if($active_page == "Animations"){
        $animations = "active-nav";
    }

    echo "<div id='container'>
            <nav class='side-nav ' id='side-nav'>
            <form method='GET' action='index.php'>
            	  <h3 class='nav-heading'>Concepts</h3><hr>
            	  <div class='subNav'>
                	  <ul>
                		  <li class='nav-li $stylesheets'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=Stylesheets&amp;page=Stylesheets_Main' class='nav1'>Stylesheets</a></li>
                		  <li class='nav-li $cross_browser'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=Cross-Browser&amp;page=Cross-Browser_Main' class='nav1'>Cross-Browser</a></li>
                		  <li class='nav-li $identifiers'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=HTML_Identifiers&amp;page=HTML_Identifiers_Main' class='nav1'>HTML Identifiers</a></li>
                		  <li class='nav-li $box_model'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=Box_Model&amp;page=Box_Model_Main' class='nav1'>Box Model</a></li>
                                  <li class='nav-li $media_queries'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=Media_Queries&amp;page=Media_Queries_Main' class='nav1'>Media Queries</a></li>
                	  </ul>
            	  </div>
            	  <h3 class='nav-heading'>Basic Properties</h3><hr>
            	  <div class='subNav'>
                	  <ul>
                		  <li class='nav-li $positioning'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=Positioning&amp;page=Positioning_Main' class='nav2'>Positioning</a></li>
                		  <li class='nav-li $fonts'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=Fonts&amp;page=Fonts_Main' class='nav2'>Fonts</a></li>
                		  <li class='nav-li $border'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=Borders&amp;page=Borders_Main' class='nav2'>Borders</a></li>
                		  <li class='nav-li $spacing'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=Spacing&amp;page=Spacing_Main' class='nav2'>Spacing</a></li>
                		  <li class='nav-li $colors'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=Colors&amp;page=Colors_Main' class='nav2'>Colors</a></li>
                	  </ul>
            	  </div>
            	  <h3 class='nav-heading'>Adv. Properties</h3><hr>
            	  <div class='subNav'>
                	  <ul>
                		  <li class='nav-li $z_index'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=Z-index&amp;page=Z-index_Main' class='nav3'>Z-index</a></li>
                		  <li class='nav-li $shadows'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=Shadows&amp;page=Shadows_Main' class='nav3'>Shadows</a></li>
                		  <li class='nav-li $floats'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=Floats&amp;page=Floats_Main' class='nav3'>Floats</a></li>
                		  <li class='nav-li $hover'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=Hover&amp;page=Hover_Main' class='nav3'>Hover</a></li>
                		  <li class='nav-li $transitions'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=Transitions&amp;page=Transitions_Main' class='nav3'>Transitions</a></li>
                		  <li class='nav-li $animations'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=Animations&amp;page=Animations_Main' class='nav3'>Animations</a></li>
                	  </ul>
            	  </div>
          </form>
	  </nav>";
 }
 function print_footer(){
    echo "<footer class='colSingle'>
                <div class='footerContainer'>
                    <div class='footerBlock'>
                        <h3 class='footerHeading'>Concepts</h3>
                        <ul>
                            <li class='footer-nav $stylesheets'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=Stylesheets&amp;page=Stylesheets_Main' class='footer-nav'>Stylesheets</a></li>
                            <li class='footer-nav $cross_browser'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=Cross-Browser&amp;page=Cross-Browser_Main' class='footer-nav'>Cross-Browser</a></li>
                            <li class='footer-nav $identifiers'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=HTML_Identifiers&amp;page=HTML_Identifiers_Main' class='footer-nav'>HTML Identifiers</a></li>
                            <li class='footer-nav $box_model'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=Box_Model&amp;page=Box_Model_Main' class='footer-nav'>Box Model</a></li>
                            <li class='footer-nav $media_queries'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=Media_Queries&amp;page=Media_Queries_Main' class='footer-nav'>Media Queries</a></li>

                        </ul>
                    </div>
                    <div class='footerBlock'>
                        <h3 class='footerHeading'>Basic Properties</h3>
                        <ul>
                            <li class='footer-nav $positioning'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=Positioning&amp;page=Positioning_Main' class='footer-nav'>Positioning</a></li>
                            <li class='footer-nav $fonts'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=Fonts&amp;page=Fonts_Main' class='footer-nav'>Fonts</a></li>
                            <li class='footer-nav $border'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=Borders&amp;page=Borders_Main' class='footer-nav'>Borders</a></li>
                            <li class='footer-nav $spacing'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=Spacing&amp;page=Spacing_Main' class='footer-nav'>Spacing</a></li>
                            <li class='footer-nav $colors'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=Colors&amp;page=Colors_Main' class='footer-nav'>Colors</a></li>
                        </ul>
                    </div>
                    <div class='footerBlock'>
                        <h3 class='footerHeading'>Adv. Properties</h3>
                        <ul>
                            <li class='footer-nav $z_index'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=Z-index&amp;page=Z-index_Main' class='footer-nav'>Z-index</a></li>
                            <li class='footer-nav $shadows'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=Shadows&amp;page=Shadows_Main' class='footer-nav'>Shadows</a></li>
                            <li class='footer-nav $floats'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=Floats&amp;page=Floats_Main' class='footer-nav'>Floats</a></li>
                            <li class='footer-nav $hover'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=Hover&amp;page=Hover_Main' class='footer-nav'>Hover</a></li>
                            <li class='footer-nav $transitions'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=Transitions&amp;page=Transitions_Main' class='footer-nav'>Transitions</a></li>
                            <li class='footer-nav $animations'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=Animations&amp;page=Animations_Main' class='footer-nav'>Animations</a></li>
                        </ul>
                    </div>
                    <div class='footerBlock'>
                        <h3 class='footerHeading'>Info</h3>
                        <ul>
                            <li class='footer-nav'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=Home&amp;page=Home_Main' class='footer-nav'>Home</a></li>
                            <li class='footer-nav'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=About&amp;page=About_Main' class='footer-nav'>About</a></li>
                            <li class='footer-nav'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=Properties&amp;page=Properties_Main' class='footer-nav'>Properties</a></li>
                            <li class='footer-nav'><a href='http://blurhr.com/ka05/Group_Proj/index.php?name=Sources&amp;page=Sources_Main' class='footer-nav'>Sources</a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </body>
    </html>";
 }

function nl2br2($string) {
    $string = str_replace(array("\r\n", "\r", "\n"), "<br />", $string);
    return $string;
}
 ?>
