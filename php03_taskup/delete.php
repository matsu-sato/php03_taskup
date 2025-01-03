<?php
$id    = $_GET['id'];

//2. DB接続します
//*** function化する！  *****************
try {
    $db_name = 'yukimushi_php02';
$db_host = 'mysql3104.db.sakura.ne.jp';
$db_id = 'yukimushi_php02';
$db_pw = 'php02kadai';


    $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
} catch (PDOException $e) {
    exit('DB Connection Error:' . $e->getMessage());
}

//３．データ登録SQL作成
$stmt = $pdo->prepare('DELETE FROM wishlist WHERE id = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    //*** function化する！******\
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    //*** function化する！*****************
    header('Location: select.php');
    exit();
} 