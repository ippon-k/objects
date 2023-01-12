<?php
//xss対応(echo卯s流場所で使用)
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

//DB接続関数：db_conn()

function db_conn()
{
    try {
        //ID:'root', Password: xamppは 空白 ''
        $pdo = new PDO('mysql:dbname=objects;charset=utf8;host=localhost', 'root', '');
        return $pdo;
    } catch (PDOException $e) {
        exit('DBConnectError:' . $e->getMessage());
    }
}

//ログインチェック処理
function loginCheck()
{
    //セッションIDを持っていたらOK
    // 持っていなければ閲覧できない処理にする
    //  ISSETは値があるかどうか確認するメソッド

    if (!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] != session_id()) {
        //ログインがおかしい
        exit('login error');
    } else {
        //ログインOK
        session_regenerate_id(true);
        $_SESSION['chk_ssid'] = session_id();
    }
}
