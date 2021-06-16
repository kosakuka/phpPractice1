<?php
// echo "{$_POST}";
// $blog = $_GET;
$blog = $_POST;
// echo $blog;
// var_dump($blog);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>ご回答ありがとうございます</h1>
    <p>
        <?php 
        foreach($blog as $a => $b){
            $b2 = htmlspecialchars($b, ENT_QUOTES, 'UTF-8');
            echo "<br>{$a} : {$b2} <br>";
        }
        ?>
    </p>
</body>
</html>