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
    <h1>wish List 登録画面</h1>
        <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="insert.php">
        <label for="genre">ジャンル選択</label>
        <select name="genre" id="genre">
            <option value="仕事">仕事</option>
            <option value="起業">起業</option>
            <option value="スキル">スキル</option>
            <option value="リレーションシップ">リレーションシップ</option>
            <option value="健康">健康</option>
            <option value="美容">美容</option>
            <option value="資産">資産</option>
            <option value="学習">学習</option>
            <option value="趣味">趣味</option>
            <option value="その他">その他</option>

        </select>  
        <br>
        <label for="goal">具体的な目標を記入</label>
        <br>
        <textarea name="goal" id="goal" maxlength=300 required></textarea>
        <br>
        <button type="submit">登録</button>
        
    </form>
    <br>
    <a href="select.php">一覧を確認する</a>







</body>

</html>
