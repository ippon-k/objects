<?php

/**
 * 1. index.phpのフォームの部分がおかしいので、ここを書き換えて、
 * insert.phpにPOSTでデータが飛ぶようにしてください。
 * 2. insert.phpで値を受け取ってください。
 * 3. 受け取ったデータをバインド変数に与えてください。
 * 4. index.phpフォームに書き込み、送信を行ってみて、実際にPhpMyAdminを確認してみてください！
 */
// セッション開始
session_start();

// セッションIDを持っていたらOK。
// 持っていなければ閲覧できない処理にする
// ISSETは値があるかどうか確認するメソッド
if (!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] != session_id()) {
    // ログインできない
    exit('login error');
} else {
    //ログインOK
    session_regenerate_id(true);
    $_SESSION['chk_ssid'] = session_id();
}

if ($_FILES['img']['name'] !== "") {
    $file_name = $_SESSION['post']['file_name'] = $_FILES['img']['name']; //タイトルを取得

    $image_data = $_SESSION['post']['image_data'] = file_get_contents($_FILES['img']['tmp_name']); //データを取得

    $image_type = $_SESSION['post']['image_type'] = exif_imagetype($_FILES['img']['tmp_name']); //イメージタイプを確認する
} else {
    $file_name = $_SESSION['post']['file_name'] = ''; //タイトルを取得

    $image_data = $_SESSION['post']['image_data'] = ''; //データを取得

    $image_type = $_SESSION['post']['image_type'] = ''; //イメージタイプを確認する
}

var_dump($_FILES);

//1. POSTデータ取得
$name = $_POST['name']; //品名
$category = $_POST['category']; //カテゴリー
$date = $_POST['date']; //購入日
// var_dump($date);
$place = $_POST['place']; //保管場所
$check1 = $_POST['check1']; //チェックポイント
$control_num = $_POST['control_num']; //管理番号
$amortization_period = $_POST['amortization_period']; //償却期間
$acquisition_cost = $_POST['acquisition_cost']; //仕入価額
$residual_value = $_POST['residual_value']; //最終残価率
$others = $_POST['others']; //その他
$img = ''; //画像
$id = $_POST['id']; //その他

// 画像ファイルのパスをimgesフォルダに保存する
if ($_SESSION['post']['image_data'] !== "") {
    $img = date('YmdHis') . '_' . $_SESSION['post']['file_name']; //ファイル名被り防止
    file_put_contents("images/$img", $_SESSION['post']['image_data']);
}

//2. DB接続します
try {
    //ID:'root', Password: xamppは 空白 ''
    $pdo = new PDO('mysql:dbname=objects;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
    exit('DBConnectError:' . $e->getMessage());
}
// require_once('funcs.php');
// $pdo = db_conn();

// //３．データ登録SQL作成

// 1. SQL文を用意
$stmt = $pdo->prepare(
    'UPDATE
    gs_bm_table SET
    name = :name,
    category = :category,
    date = :date,
    place = :place,
    check1 = :check1,
    control_num = :control_num,
    amortization_period = :amortization_period,
    acquisition_cost = :acquisition_cost,
    residual_value = :residual_value,
    others = :others,
    img = :img

    WHERE id = :id;'
);

//  2. バインド変数を用意
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':category', $category, PDO::PARAM_STR);
$stmt->bindValue(':date', $date, PDO::PARAM_STR);
$stmt->bindValue(':place', $place, PDO::PARAM_STR);
$stmt->bindValue(':check1', $check1, PDO::PARAM_STR);
$stmt->bindValue(':control_num', $control_num, PDO::PARAM_INT);
$stmt->bindValue(':amortization_period', $amortization_period, PDO::PARAM_INT);
$stmt->bindValue(':acquisition_cost', $acquisition_cost, PDO::PARAM_INT);
$stmt->bindValue(':residual_value', $residual_value, PDO::PARAM_INT);
$stmt->bindValue(':others', $others, PDO::PARAM_STR);
$stmt->bindValue(':img', $img, PDO::PARAM_STR);
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
