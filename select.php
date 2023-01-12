<?php

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}


//1.  DB接続します
try {
    //ID:'root', Password: xamppは 空白 ''
    $pdo = new PDO('mysql:dbname=objects;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
    exit('DBConnectError:' . $e->getMessage());
}

// require_once('funcs.php');
// $pdo = db_conn();

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

        $view .= '<tr><td><a class=wide_link href="detail.php?id=' . $result['id'] . '">';
        $view .= h($result['name']);
        $view .= '</a></td><td><a class=wide_link href="detail.php?id=' . $result['id'] . '">';
        $view .= h($result['category']);
        $view .= '</a></td><td><a class=wide_link href="detail.php?id=' . $result['id'] . '">';
        $view .= h($result['date']);
        $view .= '</a></td><td><a class=wide_link href="detail.php?id=' . $result['id'] . '">';
        $view .= h($result['place']);
        $view .= '</a></td><td><a class=wide_link href="detail.php?id=' . $result['id'] . '">';
        $view .= h($result['amortization_period']);
        $view .= '</a></td><td><a class=wide_link href="detail.php?id=' . $result['id'] . '">';
        $view .= h($result['residual_value']);
        $view .= '</a></td><td>';
        $view .= '<a class=delete href="delete.php?id=' . $result['id'] . '">削除</a>';
        $view .= '</td></tr>';
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
                    <a class="navbar-brand" href="add.php">動産一覧</a>
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
                    <th>品名</th>
                    <th>カテゴリ</th>
                    <th>購入日</th>
                    <th>保管場所</th>
                    <th>償却期間</th>
                    <th>取得価額</th>
                    <th>項目削除</th>
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
