<?php
session_start();
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
    <h1>書籍を検索</h1>
    <p></p>
    <form action="searchResult.php" method="get">
        <input type="text" name="bookName" placeholder="探したい書籍名" id="testJs">
        <input type="submit" value="検索" >
    </form>

    <p>
        <?php 
            if($_SESSION['userName'] == "admin"){
                echo '<a href="logout.php">ログアウト</a>';
            }else{
                echo '<p><a href="login.php">ログイン(管理者)</a></p>';
            }
            
        ?>
    </p>
</body>
</html>