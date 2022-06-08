<?php
error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');

//добавить формат данных
$name = (string)$_POST['name'];
$mnumber = (string)$_POST['mnumber'];
$email = (string)$_POST['email'];
$msg = (string)$_POST['msg'];

$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbBase = 'comments';
$dbTable = "user_comments";

try {
    $db = new PDO("mysql:host=$dbHost;dbname=$dbBase", $dbUser, $dbPassword);
    $db->exec("set names utf8");
    $data = array( 'name' => $name, 'msg' => $msg, 'email' => $email, 'mnumber' => $mnumber );
    $query = $db->prepare("INSERT INTO $dbTable (name, msg, email, number ) values (:name, :msg, :email, :mnumber)");
    $query->execute($data);
    $result = true;
} catch (PDOException $e) {

    print "Ошибка!: " . $e->getMessage() . "<br/>";
}


try {

    $db = new PDO("mysql:host=$dbHost;dbname=$dbBase", $dbUser, $dbPassword);
    $db->exec("set names utf8");
    $query = $db->prepare("SELECT * FROM $dbTable GROUP BY `date` DESC");
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $query->execute();
    $response= $query->fetchAll();
    $result = true;

    $json = json_encode($response);
    echo $json;

} catch (PDOException $e) {

    print "Ошибка!: " . $e->getMessage() . "<br/>";
}



//Вывод на страницу без JS



?>