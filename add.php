<?php



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
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
            <label for="name">品名</label>
            <input type="text" name="name" id="name"><br>

            <label for="category">品目</label>
            <input type="text" name="category" id="category"><br>

            <label for="purchase">購入日</label>
            <input type="date" name="date" id="date"><br>

            <label for="place">保管場所</label>
            <input type="text" name="place" id="place"><br>

            <label for="checkPoint">チェックポイント</label>
            <input type="date" name="check1" id="check1"><br>

            <input type="submit" value="send">
        </form>
        <p><a href="index.html">return</a></p>
    </div>
</body>

</html>



<!-- <label for="num">管理番号</label>
<input type="text" name="num" id="num"><br>

<label for="amortization">償却期間（年）</label>
<input type="number" name="amortization" id="amortization"><br>

<label for="amount">取得価額</label>
<input type="number" name="amount" id="amount"><br>

<label for="residual">残価</label>
<input type="number" name="residual" id="residual"><br>

<label for="others">その他</label>
<input type="text" name="others" id="others"><br> -->
