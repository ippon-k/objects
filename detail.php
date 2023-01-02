<?php

$id = $_GET['id'];

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}


//1.  DB接続します
try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=objects;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
    exit('DBConnectError' . $e->getMessage());
}

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id = :id;");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

$status = $stmt->execute();

//４．データ登録処理後
if ($status === false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit('ErrorMessage:' . $error[2]);
} else {
    //データが取得できた場合の処理
    $result = $stmt->fetch();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="style1.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>objects</title>
</head>

<body>
    <div>
        <header>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="add.php">動産詳細</a>
                    </div>
                </div>
            </nav>
        </header>
        <h1>動産登録</h1>
        <form action="insert.php" method="post">
            <label for="name">品名</label><br>
            <input type="text" name="name" id="name" required value="<?= $result['name'] ?>"><br>

            <label for="category">カテゴリ</label><br>
            <input type="text" name="category" id="category" required value="<?= $result['category'] ?>"><br>

            <label for="purchase">購入日</label><br>
            <input type="date" name="date" id="date" required value="<?= $result['date'] ?>"><br>

            <label for="place">保管場所</label><br>
            <input type="text" name="place" id="place" value="<?= $result['place'] ?>"><br>

            <label for="checkPoint">チェックポイント</label><br>
            <input type="date" name="check1" id="check1" value="<?= $result['check1'] ?>"><br>

            <label for="num">管理番号</label><br>
            <input type="text" name="control_num" id="control_num" value="<?= $result['control_num'] ?>"><br>

            <label for="amortization_period">償却期間（年）</label><br>
            <input type="number" name="amortization_period" id="amortization_period" value="<?= $result['amortization_period'] ?>"><br>

            <label for="acquisition_cost">取得価額</label><br>
            <input type="number" name="acquisition_cost" id="acquisition_cost" value="<?= $result['acquisition_cost'] ?>"><br>

            <label for="residual_value">最終残価率</label><br>
            <input type="number" name="residual_value" id="residual_value" value="<?= $result['residual_value'] ?>"><br>

            <label for="others">その他</label><br>
            <input type="text" name="others" id="others" value="<?= $result['others'] ?>"><br>

            <input type="submit" value="send">
        </form>
        <p><a href="index.html">return</a></p>
    </div>
</body>

</html>
