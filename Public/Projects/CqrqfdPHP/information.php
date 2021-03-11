<!DOCTYPE html>

<html>
<head>
    <title>PHP Page</title>
</head>
<body>
    
    <?php
    function factorial($num){
        $fac = 1;
        for($i = 1; $i < $num; $i++){
            $fac = $fac * $i;
        }
        return $fac;
    }
    
    function sumofSquare($n1, $n2){
        $sum = 0;
        for($i = $n1; $i <= $n2; $i++){
            $sum += $i * $i;
        }
        return $sum;
    }
    
        if(isset($_POST["fname"]) && isset($_POST["lname"])){
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            echo "Hello $fname $lname";
        }
        if(isset($_GET["num"])){
            $num = $_GET["num"];
            $fac = factorial($num);
            echo "The factorial of $num is $fac";
        }
        if(isset($_GET["str"])){
            $str = $_GET["str"];
            echo "The reverse string of $str is " .strrev($str);
        }
        if(isset($_GET["n1"]) && isset($_GET["n2"])){
            $n1 = $_GET["n1"];
            $n2 = $_GET["n2"];
            $sum = sumofSquare($n1,$n2);
            echo "The sum of squares between $n1 and $n2 is $sum";
        }
    ?>
    
</body>
</html>