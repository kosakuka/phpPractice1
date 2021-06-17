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
    <h1><?php echo $bookName;?>の編集画面</h1>

    <p>管理者さん、編集してください</p>
    <form action="create.php" method="post">
        <input type="hide" name="bookId" value="<?php echo $bookId;?>" hidden >
        <p><input type="text" name="bookName" placeholder="本の名前（必須）" value="<?php echo $bookName;?>" required></p>
        <p><input type="text" name="bookAuthor" placeholder="著者の名前（必須）" value="<?php echo $bookAuthor;?>" required></p>
        <p><textarea name="bookContent" cols="30" rows="10" placeholder="本の詳細" ><?php echo $bookContent;?></textarea></p>
        <input type="submit" value="更新">
    </form>

    <p><a href="aboutBook.php?id=<?php echo $bookId?>">詳細画面に戻る</a></p>
</body>
</html>