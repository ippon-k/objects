<?php

$menu = $_POST['menu']; // メニュー選択の結果を取得

// echo $menu;

if ($menu === '1') {
    header('Location: add.php');
} elseif ($menu === '2') {
    echo '2';
} elseif ($menu === '9') {
    echo '9';
}
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
    <p><a href="index.html">return</a></p>
</body>

</html>
