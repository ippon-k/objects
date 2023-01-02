<?php

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
                        <a class="navbar-brand" href="add.php">動産登録</a>
                    </div>
                </div>
            </nav>
        </header>
        <h1>動産登録</h1>
        <form action="insert.php" method="post">
            <label for="name">品名</label><br>
            <input type="text" name="name" id="name" required><br>

            <label for="category">カテゴリ</label><br>
            <input type="text" name="category" id="category" required><br>

            <label for="purchase">購入日</label><br>
            <input type="date" name="date" id="date" required><br>

            <label for="place">保管場所</label><br>
            <input type="text" name="place" id="place"><br>

            <label for="checkPoint">チェックポイント</label><br>
            <input type="date" name="check1" id="check1"><br>

            <label for="num">管理番号</label><br>
            <input type="text" name="control_num" id="control_num"><br>

            <label for="amortization_period">償却期間（年）</label><br>
            <input type="number" name="amortization_period" id="amortization_period"><br>

            <label for="acquisition_cost">取得価額</label><br>
            <input type="number" name="acquisition_cost" id="acquisition_cost"><br>

            <label for="residual_value">最終残価率</label><br>
            <input type="number" name="residual_value" id="residual_value"><br>

            <label for="others">その他</label><br>
            <input type="text" name="others" id="others"><br>

            <input type="submit" value="send">
        </form>
        <p><a href="index.html">return</a></p>
    </div>
</body>

</html>
