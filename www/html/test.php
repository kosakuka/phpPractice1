<?php
$dsn = 'mysql:host=db;dbname=library;charset=utf8';
//ここで使うDBのユーザーがlocalhostのものだと失敗する
$user = 'blog_user2';
// $user = 'root';
$password = 'kosakuka0308';
// $password = 'secret';

try {
    $dbh = new PDO($dsn, $user, $password);
    echo "接続成功\n";

    $stmt = $dbh->query("select * from books where name like '%a%' ");
    // $stmt = $dbh->query("select * from books where name = 'php' ");
    // var_dump($stmt);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($result);

        // 取得したデータを出力
	foreach( $result as $book ) {
		echo "{$book['id']} , {$book['name']}</br>";
	}

    $dbh = null;

} catch (PDOException $e) {
    $dbh = null;
    echo "接続失敗: " . $e->getMessage() . "\n";
    exit();
}
?>