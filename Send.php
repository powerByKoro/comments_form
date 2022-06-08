<?php
error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');

//добавить формат данных
(string)$name = $_POST['name'];
(string)$mnumber = $_POST['mnumber'];
(string)$email = $_POST['email'];
(string)$msg = $_POST['msg'];

$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_base = 'comments';
$db_table = "user_comments";

try {
    $db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
    $db->exec("set names utf8");
    $data = array( 'name' => $name, 'msg' => $msg, 'email' => $email, 'mnumber' => $mnumber );
    $query = $db->prepare("INSERT INTO $db_table (name, msg, email, number ) values (:name, :msg, :email, :mnumber)");
    $query->execute($data);
    $result = true;
} catch (PDOException $e) {

    print "Ошибка!: " . $e->getMessage() . "<br/>";
}

if (true) {
    try {

        $db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
        $db->exec("set names utf8");
        $query = $db->prepare("SELECT * FROM `user_comments` GROUP BY `date` DESC");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        $response= $query->fetchAll();
        $result = true;

        $json = json_encode($response);
        echo $json;

    } catch (PDOException $e) {

        print "Ошибка!: " . $e->getMessage() . "<br/>";
    }


}else{
    echo "Данные не были занесены";
}
//Вывод на страницу без JS



?>