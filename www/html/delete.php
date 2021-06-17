<?php
$bookId = $_GET['id'];
require_once('DbBooks.php');

$dbBooks = new DbBooks();//クラスを用いた処理
$dbh = $dbBooks->dbConnect();

if( empty($bookId) ){
    header('Location: create.html');//情報登録ページに遷移
}else{
    //更新処理
    //SQL準備(SQLインジェクション対策のため、以下のような処理を行っている)
    $stmt = $dbh->prepare("delete from books where id = :bookId;");
    $stmt->bindValue(':bookId', (int)$bookId, PDO::PARAM_INT);
    //SQL実行
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Location: searchResult.php');//検索結果が表示されているページに遷移
}