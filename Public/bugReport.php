<!DOCTYPE html>
<html lang="en">
    <?php
        session_start();
        if(isset($_SESSION['username']) == NULL){
            header('Location: login.php');
            exit();
        }
    ?>
    <head>
        <title>Bug Report</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="CSS/style.css">
        <link rel="stylesheet" href="CSS/switch.css">
        <link rel="stylesheet" href="CSS/animations.css">
        <link rel="stylesheet" href="CSS/bugReportStyle.css">
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"> </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            
            $(function() {
            darkModeSave = sessionStorage.getItem("darkMode");
            if(darkModeSave == 'false'){
                toggleDarkMode();
                document.getElementById("themeToggle").checked = true;
                }
            });
            
            var darkMode = true;
            function toggleDarkMode(){
                var navBar = document.getElementById("navigationBar");
                var body = document.getElementsByTagName("body");
                var websiteLogo = document.getElementById("websiteLogo");
                var bugReportContainer = document.getElementById("bugReportContainer");
                var bugtextBox = document.getElementById("bugInput");
                var logoutButton = document.getElementById("logoutButton");

                if(darkMode){
                    document.body.style.backgroundColor = "#FFFFFF";
                    navBar.classList.remove("navbar-dark","bg-dark","navbarBorderDark");
                    navBar.classList.add("navbar-light", "bg-light", "navbarBorderLight");
                    logoutButton.style.color = "#000000";
                    bugReportContainer.style.backgroundColor = "#EEEEEE";
                    bugtextBox.style.backgroundColor = "#CCC";
                    bugtextBox.style.color = "#000000";
                    websiteLogo.src = "/Assets/profilePictureLight.png";
                    for(i = 0; i < body.length; i++){
                        body[i].style.color = "#000000";
                    }
                    darkMode = false;
                }

                else{
                    console.log("DARKMODE ON");
                    document.body.style.backgroundColor = "#343a40";
                    navBar.classList.remove("navbar-light", "bg-light", "navbarBorderLight");
                    navBar.classList.add("navbar-dark", "bg-dark", "navbarBorderDark");
                    logoutButton.style.color = "#FFFFFF";
                    bugReportContainer.style.backgroundColor = "#212529";
                    bugtextBox.style.backgroundColor = "#343a40";
                    bugtextBox.style.color = "#FFFFFF";
                    websiteLogo.src = "/Assets/profilePictureDark.png";
                    for(i = 0; i<body.length; i++){
                        body[i].style.color = "#FFFFFF";
                    }                    
                    darkMode = true;
                }
                sessionStorage.setItem('darkMode', darkMode);
            }
            
        </script>
    </head>
    <body>
        <nav id="navigationBar" class="navbar sticky navbar-dark bg-dark navbarBorderDark justify-content-between">
            <div>
                <a class="navbar-brand hvr-icon-bob" href="index.php">
                    <img id="websiteLogo" src="/Assets/profilePictureDark.png" width="55" height="50" class="hvr-icon" alt="">
                    CarsonRottingha.us
                </a>
                <label class="switch">
                    <input id="themeToggle" type="checkbox" onclick="toggleDarkMode()">
                    <span class="slider round"></span>
                </label>
            </div>
            <a id="logoutButton" class="nav-item nav-link" href="logout.php">Logout</a>
        </nav>
            <div id="bugReportContent">
                <div id="bugReportContainer" class="reportContainer">
                    <div id="formContainer" class="formContainer">
                        <h1>Bug Report</h1>
                        <form method="POST">
                            <input class="bugtextboxStyle" id="bugInput" type="text" name="bugReport" placeholder="Please give me a detailed description of the bug and if possible, any way to recreate said bug. Thanks!" required>
                            <input class="emailStyle" type="submit" name="submit" value="Send">
                        </form>
                        <?php
                        session_start();
                            if(isset($_POST['submit'])){
                                $bugReport = "Bug Report:\n".$_POST['bugReport']."\n";
                                $bugReportFile = "bugReportData.txt";
                                $fp = fopen($bugReportFile,"a+") or die("SOMETHING WENT WRONG.");
                                fwrite($fp,$bugReport);
                                fclose($fp);
                                echo '<p style=color: green;>Your bug has been recorded. Thank you for your help!</p>';
                            }
                        exit();
                        ?>
                    </div>
                </div>
            </div>
    </body>
</html>