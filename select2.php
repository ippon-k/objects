<?php

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
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table;");
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery:" . $error[2]);
} else { //elseの中はsql実行成功した場合
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) { //一行とってくるよ

        $view .= '<tr><td>' . $result['id'] . '</td><td>' . h($result['name']) . '</td><td>' . h($result['category']) . '</td><td>' . $result['date'] . '</td><td>' . h($result['place']) . '</td><td>' . h($result['check1']) . '</td><td>' . h($result['control_num']) . '</td><td>' . h($result['amortization_period']) . '</td><td>'  . h($result['acquisition_cost']) . '</td><td>' . h($result['residual_value']) . '</td><td>' . h($result['others']) . '</td></tr>';
    }
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>動産一覧</title>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style1.css">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body id="main">
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="add.php">動産表示</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div>
        <div class="container jumbotron">
            <table class="table1">
                <tr>
                    <th>ID</th>
                    <th>品名</th>
                    <th>カテゴリ</th>
                    <th>購入日</th>
                    <th>保管場所</th>
                    <th>次回確認</th>
                    <th>管理番号</th>
                    <th>償却期間</th>
                    <th>取得価額</th>
                    <th>最終残価</th>
                    <th>その他</th>
                </tr>
                <?= $view ?>
            </table>
        </div>
    </div>
    <!-- Main[End] -->
    <button><a href="index.html">to menu</a></button>
    <button><a href="add.php">to add</a></button>


</body>

</html>
