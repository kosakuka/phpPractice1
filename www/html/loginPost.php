<?php
session_start();//セッションの準備

$userName = $_POST["userName"];
$password = $_POST["password"];

require_once('DbUsers.php');

$dbUsers = new DbUsers();//クラスを用いた処理
$dbh = $dbUsers->dbConnect();


if( !empty($userName) ){
    //SQL準備(SQLインジェクション対策のため、以下のような2行を行っている)
    $stmt = $dbh->prepare("select * from users where name = :userName ");
    $stmt->bindValue(':userName', $userName, PDO::PARAM_INT);
    //SQL実行
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if( $result && $result["password"] == md5($password) ){
        //ログイン成功
        $_SESSION['userName'] = $userName; 
        header('Location: blank.html?label=successLogin');//検索結果が表示されているページに遷移
    }else{
        //ログイン失敗
        header('Location: blank.html?label=incorrectPassword');//検索結果が表示されているページに遷移
    }
}else{
    //ユーザー名が空で送られてしまった場合、不明なエラー
    header('Location: blank.html?label=error');//検索結果が表示されているページに遷移
}
