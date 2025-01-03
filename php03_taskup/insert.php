<?php

//1. POSTデータ取得
$genre   = $_POST['genre'];
$goal  = $_POST['goal'];

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
require_once('funcs.php'); 
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare(
    'INSERT INTO
        wishlist(
            genre, goal
        )
    VALUES (
            :genre, :goal 
        );'
);

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':genre', $genre, PDO::PARAM_STR);
$stmt->bindValue(':goal', $goal, PDO::PARAM_STR);
$status = $stmt->execute(); //実行

echo "登録が完了しました。<br>";
echo "<a href='index.php'>戻る</a>";


//４．データ登録処理後
if ($status === false) {
    //*** function化する！******\
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    //*** function化する！*****************
    header('Location: index.php');
    exit();
}



 




?>

 