<?php
require_once('DbManager.php');
class DbUsers extends DbManager{
    public function __construct(){
        parent::__construct();
        $table = "users";
    }
    // public function __construct(){
    //     $this->dsn = 'mysql:host=db;dbname=library;charset=utf8';
    //     //ここで使うDBのユーザーがlocalhostのものだと失敗する
    //     $this->user = 'blog_user2';
    //     $this->password = 'kosakuka0308';
    // }
    
    // public function dbConnect(){
    //     try {
    //         $dbh = new PDO($this->dsn, $this->user, $this->password,[
    //             PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    //             PDO::ATTR_EMULATE_PREPARES => false,
    //         ]);
    //     } catch (PDOException $e) {
    //         $dbh = null;
    //         echo "接続失敗: " . $e->getMessage() . "\n";
    //         exit();
    //     }

    //     return $dbh;
    // }
    public function getAllUsers(){
            $stmt = $this->dbConnect()->query("select * from users");//DBから全データを取得している
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);//連想配列に変換

            return $result;
    }

}