<?php
session_start();
if($_SESSION['userName'] != "admin"){
    header('Location: blank.html?label=requireLogin');
}
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
    <h1>書籍の新規登録</h1>
    <p>管理者さん、登録してください</p>
    <form action="createPost.php" method="post">
        <p><input type="text" name="bookName" placeholder="本の名前（必須）" required></p>
        <p><input type="text" name="bookAuthor" placeholder="著者の名前（必須）" required></p>
        <p><textarea name="bookContent" cols="30" rows="10" placeholder="本の詳細"></textarea></p>
        <input type="submit" value="登録">
    </form>
    <p><a href="search.php">検索画面に戻る</a></p>
</body>
</html>