<?php
$bookId = $_GET['id'];
require_once('DbBooks.php');

$dbBooks = new DbBooks();//クラスを用いた処理
$dbh = $dbBooks->dbConnect();


if( !empty($bookId) ){
    //SQL準備(SQLインジェクション対策のため、以下のような2行を行っている)
    $stmt = $dbh->prepare("select * from books where id = :id ");
    $stmt->bindValue(':id', (int)$bookId, PDO::PARAM_INT);
    //SQL実行
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $bookName = $result[0]["name"];
    $bookAuthor = $result[0]["author"];
    $bookContent = $result[0]["content"];
}else{
    //これだけで良いのか？
    echo "無効なidです";
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
    <p><a href="update.php?id=<?php echo $bookId?>">この書籍を更新する(管理者のみ可能)</a></p>
    <p><a href="delete.php?id=<?php echo $bookId?>">この書籍を削除する(管理者のみ可能)</a></p>
    <p><a href="search.html">検索画面に戻る</a></p>
</body>
</html>