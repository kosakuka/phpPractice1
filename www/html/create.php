<?php
$bookId = $_POST['bookId'];
$bookName = $_POST['bookName'];
$bookAuthor = $_POST['bookAuthor'];
$bookContent = $_POST['bookContent'];

require_once('DbBooks.php');

$dbBooks = new DbBooks();//クラスを用いた処理
$dbh = $dbBooks->dbConnect();

if( empty($bookName) || empty($bookAuthor) ){
    header('Location: create.html');//情報登録ページに遷移
}else if( !empty($bookId) ){
    //更新処理
    //SQL準備(SQLインジェクション対策のため、以下のような処理を行っている)
    $stmt = $dbh->prepare(
        "UPDATE `books` SET 
        `name` = :bookName, 
        `author` = :bookAuthor, 
        `content` = :bookContent
        WHERE `id` = :bookId ;");
    $stmt->bindValue(':bookId', (int)$bookId, PDO::PARAM_INT);
    $stmt->bindValue(':bookName', $bookName, PDO::PARAM_INT);
    $stmt->bindValue(':bookAuthor', $bookAuthor, PDO::PARAM_INT);
    $stmt->bindValue(':bookContent', $bookContent, PDO::PARAM_INT);
    //SQL実行
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Location: searchResult.php');//検索結果が表示されているページに遷移
}else{
    //登録処理
    //SQL準備(SQLインジェクション対策のため、以下のような処理を行っている)
    $stmt = $dbh->prepare("insert into books (`name`, `author`, `content`) values (:bookName, :bookAuthor, :bookContent);");
    $stmt->bindValue(':bookName', $bookName, PDO::PARAM_INT);
    $stmt->bindValue(':bookAuthor', $bookAuthor, PDO::PARAM_INT);
    $stmt->bindValue(':bookContent', $bookContent, PDO::PARAM_INT);
    //SQL実行
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Location: searchResult.php');//検索結果が表示されているページに遷移
}
