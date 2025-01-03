<?php

//【重要】
// DB接続のための関数をfuncs.phpに用意
// require_onceでfuncs.phpを取得
// 関数を使えるようにする。
// 1. データベース接続

try {

$db_name = 'yukimushi_php02';
$db_host = 'mysql3104.db.sakura.ne.jp';
$db_id = 'yukimushi_php02';
$db_pw = 'php02kadai';

    $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    exit('DB Connection Error:' . $e
->getMessage());
}

//2. データ登録SQL作成

try {
    $stmt = $pdo->query("SELECT id, genre, goal, completed FROM wishlist");
    echo "<h1>Wish List</h1>";
    echo "<table border='1'>";
    echo "<tr><th>ジャンル</th><th>目標</th><th>操作</th></tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['genre']) . "</td>";
        echo "<td>" . htmlspecialchars($row['goal']) . "</td>";
      
        echo "<td>";
        echo "<a href='detail.php?id=" . $row['id'] . "'>編集</a> ";
        echo "<a href='delete.php?id=" . $row['id'] . "'>削除</a> ";

        echo "</td>";
        echo "</tr>";

    }

    echo "</table>";
} catch (PDOException $e) {
    echo "エラー: " . $e->getMessage();
}

//目標投稿ページへのリンクを追加
echo "<br>";
echo "<a href='index.php'>目標を投稿する</a>";

?>