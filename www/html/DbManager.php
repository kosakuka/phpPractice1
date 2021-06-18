<?php
class DbManager{
    public function __construct(){
        $this->dsn = 'mysql:host=db;dbname=library;charset=utf8';
        //ここで使うDBのユーザーがlocalhostのものだと失敗する
        $this->user = 'blog_user2';
        $this->password = 'kosakuka0308';
    }
    
    public function dbConnect(){
        try {
            $dbh = new PDO($this->dsn, $this->user, $this->password,[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        } catch (PDOException $e) {
            $dbh = null;
            echo "接続失敗: " . $e->getMessage() . "\n";
            exit();
        }

        return $dbh;
    }

    //データの存在チェックを実装しようと考えていたが保留
    // public function judgeExist($table, $col, $data){

    // }

}