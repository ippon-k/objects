<?php



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>objects</title>
</head>

<body>
    <h1>資産の登録</h1>
    <form action="" method="post">
        <label for="name">品名</label>
        <input type="text" name="name" id="name"><br>

        <label for="category">品目</label>
        <input type="text" name="category" id="category"><br>

        <label for="purchase">購入日</label>
        <input type="text" name="purchase" id="purchase"><br>

        <label for="check">チェックポイント</label>
        <input type="text" name="check" id="check"><br>

        <label for="place">保管場所</label>
        <input type="text" name="place" id="place"><br>

        <label for="num">管理番号</label>
        <input type="text" name="num" id="num"><br>

        <label for="amortization">償却期間</label>
        <input type="text" name="amortization" id="amortization"><br>

        <label for="amount">取得価額</label>
        <input type="text" name="amount" id="amount"><br>

        <label for="residual">残価</label>
        <input type="text" name="residual" id="residual"><br>

        <label for="others">その他</label>
        <input type="text" name="others" id="others"><br>

        <input type="submit" value="send">
    </form>
    <p><a href="index.html">return</a></p>
</body>

</html>
