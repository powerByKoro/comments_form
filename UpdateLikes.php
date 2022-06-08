<?php
error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');

$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_base = 'comments';
$db_table = "user_comments";

(int)$likes = $_POST['likes'];
(int)$id_element = $_POST['id_element'];
$likes +=1;

try {
    $db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
    $db->exec("set names utf8");
    $data = array( 'likes' => $likes);
    $query = $db->prepare("UPDATE $db_table SET likes = $likes WHERE id = $id_element");
    $query->execute($data);
    $result = true;
} catch (PDOException $e) {

    print "Ошибка!: " . $e->getMessage() . "<br/>";
}

if (true){
    try {
        echo 'успех';

    } catch (PDOException $e) {

        print "Ошибка!: " . $e->getMessage() . "<br/>";
    }


}else{
    echo "Данные не были занесены";
}

?>