<?php
$bookName = $_GET['bookName'];
$dsn = 'mysql:host=db;dbname=library;charset=utf8';
//ここで使うDBのユーザーがlocalhostのものだと失敗する
$user = 'blog_user2';
$password = 'kosakuka0308';

try {
    $dbh = new PDO($dsn, $user, $password,[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
    // echo "接続成功\n";

    $stmt = $dbh->query("select * from books");
    if(!empty($bookName)){
        //SQL準備(SQLインジェクション対策のため、以下のような2行を行っている)
        $stmt = $dbh->prepare("select * from books where name like :bookName ");
        $stmt->bindValue(':bookName', "%".$bookName."%", PDO::PARAM_INT);
        //SQL実行
        $stmt->execute();
    }
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    <h1>検索結果</h1>
    <table border="1">
        <tr> 
            <th>書籍名</th> 
            <th>著者</th> 
            <th>詳細</th> 
        </tr>
        <?php foreach($result as $book):?>
        <tr> 
            <td><?php echo $book['name']; ?></td> 
            <td><?php echo $book['author']; ?></td> 
            <td><a href="aboutBook.php?id=<?php echo $book['id']; ?>">詳細</a></td>
        </tr>
        <?php endforeach?>
    </table>
    <p><a href="search.html">検索画面に戻る</a></p>
</body>
</html>