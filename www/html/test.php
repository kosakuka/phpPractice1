<?php
$dsn = 'mysql:host=db;dbname=blog_app;charset=utf8';
//ここで使うDBのユーザーがlocalhostのものだと失敗する
$user = 'blog_user2';
// $user = 'root';
$password = 'kosakuka0308';
// $password = 'secret';

try {
    $dbh = new PDO($dsn, $user, $password);
    echo "接続成功\n";

    $blog_data = $dbh->query("select * from blog");
    // var_dump($blog_data);

	// 取得したデータを出力
	foreach( $blog_data as $value ) {
		echo "{$value['content']}\n";
	}

    $dbh = null;

} catch (PDOException $e) {
    $dbh = null;
    echo "接続失敗: " . $e->getMessage() . "\n";
    exit();
}
?>