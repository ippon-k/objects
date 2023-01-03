<?php

//1. POSTデータ取得
$id = $_GET['id']; //その他

//2. DB接続します
try {
    //ID:'root', Password: xamppは 空白 ''
    $pdo = new PDO('mysql:dbname=objects;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
    exit('DBConnectError:' . $e->getMessage());
}

// //３．データ登録SQL作成

// 1. SQL文を用意
$stmt = $pdo->prepare(
    'DELETE FROM gs_bm_table WHERE id = :id'
);

//  2. バインド変数を用意

$stmt->bindValue(':id', $id, PDO::PARAM_INT);


// var_export($name . $category);
// //  3. 実行
$status = $stmt->execute();
echo "ok";

//４．データ登録処理後
if ($status === false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit('ErrorMessage:' . $error[2]);
} else {
    //５．index.phpへリダイレクト
    header('Location: select.php');
}
