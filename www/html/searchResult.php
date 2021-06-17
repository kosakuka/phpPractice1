<?php
    require_once('DbBooks.php');

    $bookName = $_GET['bookName'];
    $dbBooks = new DbBooks();//クラスを用いた処理
    $dbh = $dbBooks->dbConnect();
    

    if( !empty($bookName) ){
        //SQL準備(SQLインジェクション対策のため、以下のような2行を行っている)
        $stmt = $dbh->prepare("select * from books where name like :bookName ");
        $stmt->bindValue(':bookName', "%".$bookName."%", PDO::PARAM_INT);
        //SQL実行
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }else{
        $result = $dbBooks->getAllBooks();
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
    <p><a href="create.html">書籍を新規登録(管理者のみ可能)</a></p>
    <p><a href="search.html">検索画面に戻る</a></p>
</body>
</html>