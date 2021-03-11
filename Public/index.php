<!DOCTYPE html>
<html lang="en">
<?php
    include 'init.php'
?>
    <head>
    <title>Carson's Portfolio</title>
    <meta charset="UTF-8">
        
    <!-- Dependencies -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="CSS/switch.css">
    <link rel="stylesheet" href="CSS/projectStyle.css">
    <link rel="stylesheet" href="CSS/animations.css">
    <link rel="stylesheet" href="CSS/experienceStyle.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    
/*Checks the saved state of Dark Mode*/
    $(function() {
        darkModeSave = sessionStorage.getItem("darkMode");
        if(darkModeSave == 'false'){
            toggleDarkMode();
            var themeToggle = document.getElementById("themeToggle");
            //themeToggle.backgroundColor = white;
            themeToggle.checked = true;
        }
    });
        
/*Allows for smooth scrolling*/
     $(document).ready(function(){
         
         $("a").on('click', function(event) {
             
             if (this.hash !== "") {
                 event.preventDefault();
                 var storedHash = this.hash;
                 $('html, body').animate({
                     scrollTop: $(storedHash).offset().top
                 }, 850, function(){
                     window.location.hash = storedHash;
                 });
             }
         });
     });
        
    /*Toggles theme of site*/
    var darkMode = 'true';
    function toggleDarkMode(){
        var navBar = document.getElementById("navigationBar");
        var body = document.getElementsByTagName("body");
        var iconTray = document.getElementById("iconTray1");
        var iconTray2 = document.getElementById("iconTray2");
        var iconContainer = document.getElementsByClassName("iconContainer");
        var websiteLogo = document.getElementById("websiteLogo");
        var cardContainer = document.getElementsByClassName("cardContainer");
        var phpLogo = document.getElementById("phpLogo");
        var tdLogo = document.getElementById("tdLogo");
        var ajaxLogo = document.getElementById("ajaxLogo");
        var weatherLogo = document.getElementById("weatherLogo");
        
        if(darkMode == 'true'){
            console.log("DARKMODE OFF");
            document.body.style.backgroundColor = "#FFFFFF";
            navBar.classList.remove("navbar-dark","bg-dark","navbarBorderDark");
            navBar.classList.add("navbar-light", "bg-light", "navbarBorderLight");
            iconTray.classList.remove("iconTrayDark");
            iconTray2.classList.remove("iconTrayDark2");
            iconTray.classList.add("iconTrayLight");
            iconTray2.classList.add("iconTrayLight2");
            websiteLogo.src = "/Assets/profilePictureLight.png"
            phpLogo.src = "/Assets/phpIMGLight.png";
            tdLogo.src = "/Assets/tdListIMGLight.png";
            ajaxLogo.src = "/Assets/ajaxIMGLight.png";
            weatherLogo.src = "/Assets/openWeatherIconLight.png";
            
            for(i = 0; i < body.length; i++){
                body[i].style.color = "#000000";
            }
            for(i = 0; i < iconContainer.length; i++){
                iconContainer[i].style.backgroundColor = "#CCC";
            }
            for(i = 0; i < cardContainer.length; i++){
                cardContainer[i].style.backgroundColor = "#CCC";
                cardContainer[i].style.borderColor = "#CCC";
            }
            darkMode = 'false';
        }
        
        else{
            console.log("DARKMODE ON");
            document.body.style.backgroundColor = "#343a40";
            navBar.classList.remove("navbar-light", "bg-light", "navbarBorderLight");
            navBar.classList.add("navbar-dark", "bg-dark", "navbarBorderDark");
            iconTray.classList.remove("iconTrayLight");
            iconTray2.classList.remove("iconTrayLight2");
            iconTray.classList.add("iconTrayDark");
            iconTray2.classList.add("iconTrayDark2");
            websiteLogo.src = "/Assets/profilePictureDark.png"
            phpLogo.src = "/Assets/phpIMGDark.png";
            tdLogo.src = "/Assets/tdListIMGDark.png";
            ajaxLogo.src = "/Assets/ajaxIMGDark.png";
            weatherLogo.src = "/Assets/openWeatherIconDark.png";
            
            for(i = 0; i<body.length; i++){
                body[i].style.color = "#FFFFFF";
            }
            for(i = 0; i < iconContainer.length; i++){
                iconContainer[i].style.backgroundColor = "#343a40";
            }
            for(i = 0; i < cardContainer.length; i++){
                cardContainer[i].style.backgroundColor = "#212529";
                cardContainer[i].style.borderColor = "#212529";
            }
            darkMode = 'true';
        }
        sessionStorage.setItem('darkMode', darkMode);
    }
        
    </script>
  </head>

  <body>
    <nav id="navigationBar" class="navbar sticky navbar-dark bg-dark navbarBorderDark justify-content-between">
        <div>
            <a class="navbar-brand hvr-icon-bob" href="#aboutme">
                <img id="websiteLogo" src="/Assets/profilePictureDark.png" width="55" height="50" class="hvr-icon" alt="">
                CarsonRottingha.us
            </a>
            <label class="switch">
                <input id="themeToggle" type="checkbox" onclick="toggleDarkMode()">
                <span class="slider round"></span>
            </label>
        </div>
        <a class="nav-item nav-link boldText" href="#aboutme" onclick = "return false;">About Me</a>
        <a class="nav-item nav-link boldText" href="#projects" onclick = "return false;">Projects</a>
        <a class="nav-item nav-link boldText" href="#experience" onclick = "return false;">Experience</a>
        <a class="nav-item nav-link boldText" href="#contact" onclick = "return false;">Contact</a>
        <?php
            if(isset($_SESSION['username'])){
                echo '<a class="nav-item nav-link boldText" href="bugReport.php">Bug Report</a>';
                echo '<a class="nav-item nav-link" href="logout.php">Logout</a>';
            }
            else{
                echo '<a class="nav-item nav-link" href="login.php">Login</a>';
            }
        ?>
    </nav>
      
    <div id="aboutme">
        <div id="aboutmecontent">
                <?php
                    if(isset($_SESSION['username'])){
                        echo "<h1>Hello, ".$_SESSION['username'].". I'm Carson Rottinghaus</h1>";
                    }
                    else{
                        echo "<h1>Hello, I'm Carson Rottinghaus</h1>";
                    }
                ?>
            <p>I am currently a junior majoring in Computer Science</p>
            <p>This website will tell you more about my qualifications</p>
        </div>
    </div>

    <div id="projects">
        <div id="projectscontent">
            <h1 class="headText">Projects</h1>
            <div class="mainContainer">
                
                <div class="cardContainer hvr-grow-shadow">
                    <div class="cardTextContainer">
                        <span class="cardTitle">OpenWeather Display</span>
                        <p>An application built to display the currentl weather for Kansas City. Utilizes OpenWeather API and AJAX calls</p>
                        <img id="weatherLogo" src="Assets/openWeatherIconDark.png" class="projectimgSize" alt="Weather Picture">
                    </div>
                    <a class="fill-div hvr-grow-shadow" href="Projects/WeatherAJAX/weatherAjax.html"></a>
                </div>
                
                <div class="cardContainer hvr-grow-shadow">
                    <div class="cardTextContainer">
                        <span class="cardTitle">To-Do List</span>
                        <p>An application built to organize tasks.</p>
                        <img id="tdLogo" src="Assets/tdListIMGDark.png" class="projectimgSize" alt="To-Do List">
                    </div>
                    <a class="fill-div hvr-grow-shadow" href="Projects/ToDoList/CqrqfdToDoListS20.html"></a>
                </div>
                
                <div class="cardContainer hvr-grow-shadow">
                    <div class="cardTextContainer">
                        <span class="cardTitle">PHP Functions</span>
                        <p>An application built to showcase the understanding of POST and GET methods with PHP.</p>
                        <img id="phpLogo" src="Assets/phpIMGDark.png" class="projectimgSize" alt="PHP functions picture">
                    </div>
                    <a class="fill-div hvr-grow-shadow" href="Projects/CqrqfdPHP/index.html"></a>
                </div>
                    
                <div class="cardContainer hvr-grow-shadow">
                    <div class="cardTextContainer">
                        <span class="cardTitle">AJAX</span>
                        <p>An application built to showcase the understanding AJAX.</p>
                        <img id="ajaxLogo" src="Assets/ajaxIMGDark.png" class="projectimgSize" alt="AJAX picture">
                    </div>
                    <a class="fill-div hvr-grow-shadow" href="Projects/CqrqfdAJAX/index.html"></a>
                </div>  
            </div>
        </div>
    </div>


    <div id="experience">
        <div id="experiencecontent">    
            <div id="iconTray1" class="iconTrayDark">
                <h1 class="headText">Languages</h1>
                <div class="iconContainer hvr-grow-shadow">
                    <div class="cardTextContainer">
                        <img src="Assets/javaIcon.png" class="projectimgSize" alt="Java picture">
                        <p>Java</p>
                    </div>
                </div>
                
                <div class="iconContainer hvr-grow-shadow">
                    <div class="cardTextContainer">
                        <img src="Assets/cIcon.png" class="projectimgSize" alt="C picture">
                        <p>C</p>
                    </div>
                </div>
                    
                <div class="iconContainer hvr-grow-shadow">
                    <div class="cardTextContainer">
                        <img src="Assets/pythonIcon.png" class="projectimgSize" alt="Python picture">
                        <p>Python</p>
                    </div>
                </div>
                    
                <div class="iconContainer hvr-grow-shadow">
                    <div class="cardTextContainer">
                        <img src="Assets/javascriptIcon.png" class="projectimgSize" alt="JS picture">
                        <p>JavaScript</p>
                    </div>
                </div>
                    
                <div class="iconContainer hvr-grow-shadow">
                    <div class="cardTextContainer">
                        <img src="Assets/htmlIcon.png" class="projectimgSize" alt="HTML picture">
                        <p>HTML</p>
                    </div>
                </div>
                    
                <div class="iconContainer hvr-grow-shadow">
                    <div class="cardTextContainer">
                        <img src="Assets/cssIcon.png" class="projectimgSize" alt="CSS picture">
                        <p>CSS</p>
                    </div>
                </div>
            </div>
            
        <div id="iconTray2" class="iconTrayDark2">
            <h1 class="headText">IDEs</h1>
                <div class="iconContainer hvr-grow-shadow">
                    <div class="cardTextContainer">
                        <img src="Assets/androidStudioIcon.png" class="projectimgSize" alt="AS picture">
                        <p>Android Studio</p>
                    </div>
                </div>
                
                <div class="iconContainer hvr-grow-shadow">
                    <div class="cardTextContainer">
                        <img src="Assets/visualstudioIcon.png" class="projectimgSize" alt="VS picture">
                        <p>Visual Studio</p>
                    </div>
                </div>
                    
                <div class="iconContainer hvr-grow-shadow">
                    <div class="cardTextContainer">
                        <img src="Assets/pycharmIcon.png" class="projectimgSize" alt="Pycharm picture">
                        <p>PyCharm</p>
                    </div>
                </div>
                    
                <div class="iconContainer hvr-grow-shadow">
                    <div class="cardTextContainer">
                        <img src="Assets/eclipseIcon.png" class="projectimgSize" alt="Eclipse picture">
                        <p>Eclipse</p>
                    </div>
                </div>
                    
                <div class="iconContainer hvr-grow-shadow">
                    <div class="cardTextContainer">
                        <img src="Assets/bracketsIcon.png" class="projectimgSize" alt="Brackets picture">
                        <p>Brackets</p>
                    </div>
                </div>
                    
                <div class="iconContainer hvr-grow-shadow">
                    <div class="cardTextContainer">
                        <img src="Assets/cLionLogo.png" class="projectimgSize" alt="CLion picture">
                        <p>CLion</p>
                    </div>
                </div>
            </div>
      </div>
    </div>


    <div id="contact">
        <div id="contactcontent">
            <h1>Contact</h1>
            <p>Personal Email: cqrottinghaus@gmail.com</p>
            <p>Developer Email: carsonquiasondev@gmail.com</p>
            <p>Github: <a href="https://github.com/CarsonQuiason">CarsonQuiason</a></p>
        </div>
    </div>
      
  </body>
</html>
