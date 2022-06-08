<?php
error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');

$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbBase = 'comments';
$dbTable = "user_comments";

$likes = (int)$_POST['likes'];
$idElement = (int)$_POST['id_element'];
$likes +=1;

try {
    $db = new PDO("mysql:host=$dbHost;dbname=$dbBase", $dbUser, $dbPassword);
    $db->exec("set names utf8");
    $data = array( 'likes' => $likes);
    $query = $db->prepare("UPDATE $dbTable SET likes = $likes WHERE id = $idElement");
    $query->execute($data);
    $result = true;
} catch (PDOException $e) {

    print "Ошибка!: " . $e->getMessage() . "<br/>";
}

?>