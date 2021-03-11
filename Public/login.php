<!DOCTYPE html>
<html lang="en">
    <?php
    include 'init.php'
    ?>
    <head>
        <title>Sign In</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="CSS/style.css">
        <link rel="stylesheet" href="CSS/switch.css">
        <link rel="stylesheet" href="CSS/signInStyle.css">
        <link rel="stylesheet" href="CSS/animations.css">

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
                var signInContainer = document.getElementById("signInContainer");
                var userInput = document.getElementById("userInput");
                var passInput = document.getElementById("passInput");

                if(darkMode){
                    document.body.style.backgroundColor = "#FFFFFF";
                    navBar.classList.remove("navbar-dark","bg-dark","navbarBorderDark");
                    navBar.classList.add("navbar-light", "bg-light", "navbarBorderLight");
                    websiteLogo.src = "/Assets/profilePictureLight.png";
                    signInContainer.style.backgroundColor = "#EEEEEE";
                    userInput.style.backgroundColor = "#CCC";
                    passInput.style.backgroundColor = "#CCC";
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
                    websiteLogo.src = "/Assets/profilePictureDark.png";
                    signInContainer.style.backgroundColor = "#212529";
                    userInput.style.backgroundColor = "#343a40";
                    passInput.style.backgroundColor = "#343a40";
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
        </nav>
            <div id="signinContent">
                <div id="signInContainer" class="signInContainer">
                    <div class="formContainer">
                        <h1>Sign In</h1>
                        <form action=login.php method="POST">
                            <input class="inputStyle" id="userInput" type="text" name="username" placeholder="Username" required>
                            <input class="inputStyle" id="passInput" type="password" name="password" placeholder="Password" required>
                            <input class="inputStyle" type="submit" name="submit" value="Login">
                        </form>
                        <?php
                        ob_start();
                            if(isset($_POST['submit'])){
                                if($_POST['username'] == 'test' && $_POST['password'] == 'pass') {
                                    $_SESSION['username'] = $_POST['username'];
                                    header('Location: index.php');
                                    ob_end_flush();
                                }
                                else{
                                    echo "<p style='color: red';>Incorrect Login</p>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
    </body>
</html>