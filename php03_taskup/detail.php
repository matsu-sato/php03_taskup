<?php

/**
 * [ここでやりたいこと]
 * 1. クエリパラメータの確認 = GETで取得している内容を確認する
 * 2. select.phpのPHP<?php ?>の中身をコピー、貼り付け
 * 3. SQL部分にwhereを追加
 * 4. データ取得の箇所を修正。
 */
$id = $_GET['id'];
try {
    $db_name = 'yukimushi_php02';
$db_host = 'mysql3104.db.sakura.ne.jp';
$db_id = 'yukimushi_php02';
$db_pw = 'php02kadai';





    $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
} catch (PDOException $e) {
    exit('DB Connection Error:' . $e->getMessage());
}

$stmt = $pdo->prepare('SELECT * FROM wishlist  WHERE id = :id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT ); 
$status = $stmt->execute();

$view = '';
if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    $result = $stmt->fetch();

}

// var_dump($result);


?>
<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
(入力項目は「登録/更新」はほぼ同じになるから)
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Wish List</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <h1>wish List 編集画面</h1>
        <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="update.php">
        <input type="hidden" name=id value="<?=htmlspecialchars($result['id']) ?>">
        <label for="genre">ジャンル選択</label>
<select name="genre" id="genre">
    <?php
    $genres = ["仕事", "起業", "スキル", "リレーションシップ", "健康", "美容", "資産", "学習", "趣味", "その他"];
    foreach ($genres as $g) {
        $selected = $result['genre'] === $g ? 'selected' : '';
        echo "<option value='$g' $selected>$g</option>";  // ここが修正ポイント
    }
    ?>

</select>

 
        <br>
        <label for="goal">具体的な目標を記入</label>
        <br>
        <textarea name="goal" id="goal" maxlength=300 required><?=
        htmlspecialchars($result['goal']) ?></textarea>
        <br>
        <button type="submit">更新</button>
        
    </form>
    <br>
    <a href="select.php">一覧を確認する</a>
</body>
</html>