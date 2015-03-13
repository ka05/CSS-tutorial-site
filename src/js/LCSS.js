function toggleClass(element, className){
    if (!element || !className){
        return;
    }
    
    var classString = element.className, nameIndex = classString.indexOf(className);
    if (nameIndex == -1) {
        classString += '' + className;
    }
    else {
        classString = classString.substr(0, nameIndex) + classString.substr(nameIndex+className.length);
    }
    element.className = classString;
}



function showMenu(img){
    var menu = document.getElementById('side-nav');
    var content = document.getElementById('main-cont');
    var cssImg = document.getElementById('CSS3Img');
    
    //window size
    var mq = window.matchMedia( "(min-width: 800px)" );

    if (mq.matches) {
            // window width is at least 500px
            window.location.href = "http://nova.it.rit.edu/~group_three/index.php?name=Home&page=Home_Main";
    }
    else {
            // window width is less than 500px
            toggleClass(menu, 'active');
            toggleClass(content, 'active');
    }
}

if (matchMedia) {
    var mq = window.matchMedia("(min-width: 800px)");
    mq.addListener(WidthChange);
    WidthChange(mq);
}

function widthChangeLoad() {
    var mq = window.matchMedia("(min-width: 800px)");
    mq.addListener(WidthChange);
    WidthChange(mq);
    
}


// media query change
function WidthChange(mq) {
    var css_img = document.getElementById('CSS3Img');
    var header = document.getElementById('header');
    var siteTitle = document.getElementById('site-title');
    
    var topNav = document.getElementById('top-nav');
    //window size
    
    if (mq.matches) {
            // window width is at least 500px
            css_img.src = "src/img/CSS3.png";
            
            var smallHW = parseInt(50);
            var largeHW = parseInt(80);
            smallHW += 'px';
            largeHW += 'px';
            var siteTitle = document.getElementById('site-title');
            
            //set top-nav back to normal on resize
            topNav.className = 'nav-effect';
            
            $(window).scroll(function(){console.log($(window).scrollTop());
                if($(window).scrollTop() > 5)
                {
                    css_img.className = 'active';
                    header.className = 'active';
                    siteTitle.style.display = 'none';
                }
                if($(window).scrollTop() < 1){
                    css_img.className = '';
                    header.className = '';
                    siteTitle.style.display = 'block';
                }
            });
    }
    else {
            // window width is less than 500px
            css_img.src = "src/img/menu-icon.png";
            css_img.className = 'active';
            header.className = 'active';
            siteTitle.style.display = 'none';
            topNav.className = 'small-nav';
            
            $(window).scroll(function(){console.log($(window).scrollTop());
                if($(window).scrollTop() > 5)
                {
                }
                if($(window).scrollTop() < 1){
                    css_img.className = 'active';
                    header.className = 'active';
                    siteTitle.style.display = 'none';
                }
            });
            
    }
}