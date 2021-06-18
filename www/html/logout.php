<?php
session_start();
$_SESSION = array();//セッションの中身をすべて削除
session_destroy();//セッションを破壊
header('Location: blank.html?label=successLogout');//検索結果が表示されているページに遷移
?>