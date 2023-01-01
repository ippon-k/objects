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
    } catch (PDOException $e) {
        exit('DBConnectError:' . $e->getMessage());
    }
}
