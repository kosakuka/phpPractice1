<?php
$id = $_GET['id'];
$dsn = 'mysql:host=db;dbname=library;charset=utf8';
//ここで使うDBのユーザーがlocalhostのものだと失敗する
$user = 'blog_user2';
$password = 'kosakuka0308';

try {
    $dbh = new PDO($dsn, $user, $password);
    // echo "接続成功\n";

    if(empty($id)){
        echo "idが無効です";
    }else{
        $stmt = $dbh->query("select * from books where id = '{$id}' ");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($result);

        $bookName = $result[0]["name"];
        $bookAuthor = $result[0]["author"];
        $bookContent = $result[0]["content"];
    }

    $dbh = null;

} catch (PDOException $e) {
    $dbh = null;
    echo "接続失敗: " . $e->getMessage() . "\n";
    exit();
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
    <h1><?php echo $bookName;?>の詳細</h1>
    <table border="1">
        <tr>
            <th>書籍名</th>
            <th>著者</th>
            <th>内容</th>
        </tr>
        <tr>
            <td><?php echo $bookName;?></td>
            <td><?php echo $bookAuthor;?></td>
            <td><?php echo $bookContent;?></td>
        </tr>
    </table>
    <p><a href="search.html">検索画面に戻る</a></p>
</body>
</html>