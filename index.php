<?php
error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_base = 'comments';
$db_table = "user_comments";



$db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
$db->exec("set names utf8");
$query = $db->prepare("SELECT * FROM `user_comments`");
$query_DESC = $db->prepare("SELECT * FROM `user_comments`  ORDER BY `date` DESC");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query_DESC->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
$query_DESC->execute();
$response= $query->fetchAll();
$response_DESC= $query_DESC->fetchAll();

$result = true;
$sort = true;


if (isset($_POST['true'])){
    $sort = true;
}elseif(isset($_POST['false'])){
    $sort = false;
}else{
    $sort = true;
}



?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Комментарии</title>
    <link rel="stylesheet" href="styles.css" type="text/css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="sendData.js" ></script>
</head>
<body>



<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-5 col-md-6 col-12 pb-4" id="result">
                <h1 style="color: black">Комментарии</h1>
                <form method="post" action="index.php">
                    <input type="submit" name="true" value="Сначала новые комментарии">
                    <input type="submit" name="false" value="Сначала старые комментарии">
                </form>
                <?php
                if($sort == false) {
                foreach ($response as $res){?>
                    <div class="comment col-12 mt-4" >
                        <h4 class="mt-3"><?php echo $res['name'] ?></h4>
                        <br>
                        <p><?php echo $res['msg'] ?></p>
                        <br>
                        <h5 style="color: white">Номер телефона : <?php echo $res['number']?></h5>
                        <h5 style="color: white">Адрес электронной почты : <?php echo $res['email']?></h5>
                        <form action="" method="post"  class="likes_form">
                            <h5 style="color: white" id="like_json">Отметок нравится : <?php echo $res['likes'] ?></h5>
                            <input onkeypress="return false" id="id_element" name="id_element" type="number" class="" style="display: none" value="<?php echo $res['id'] ?>">
                            <input id="likes" type="number" name="likes" class=""  style="display: none" value="<?php echo $res['likes'] ?>">
                            <button class="btn btn-primary" type="submit" id="btn_id">Нравится</button>
                        </form>

                    </div>
                <?php } ?>
               <?php }elseif($sort == true){
                    foreach ($response_DESC as $res){?>
                        <div class="comment col-12 mt-4" >
                            <h4 class="mt-3"><?php echo $res['name'] ?></h4>
                            <br>
                            <p><?php echo $res['msg'] ?></p>
                            <br>
                            <h5 style="color: white">Номер телефона : <?php echo $res['number']?></h5>
                            <h5 style="color: white">Адрес электронной почты : <?php echo $res['email']?></h5>
                            <form action="" method="post"  class="likes_form">
                                <h5 style="color: white" id="like_json">Отметок нравится : <?php echo $res['likes'] ?></h5>
                                <input onkeypress="return false" id="id_element" name="id_element" type="number" class="" style="display: none" value="<?php echo $res['id'] ?>">
                                <input id="likes" type="number" name="likes" class=""  style="display: none" value="<?php echo $res['likes'] ?>">
                                <button class="btn btn-primary" type="submit" id="btn_id">Нравится</button>
                            </form>

                        </div>
                    <?php } ?>
                    <?php
                } ?>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12 mt-4">
                <form id="ajax_form" method="POST" action="">
                    <div class="form-group">
                        <h4>Оставьте комментарий</h4>
                        <label for="message">Комментарий</label>
                        <input type="text" name="msg" id="msg" class="form-control" maxlength="65" placeholder="Введите комментарий" required >
                    </div>
                    <div class="form-group">
                        <label for="name">ФИО</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Ваше ФИО" required >
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required >
                    </div>
                    <div class="form-group">
                        <label for="email">Номер телефона</label>
                        <input type="tel" name="mnumber" id="mnumber" class="form-control" placeholder="Номер телефона" required >
                    </div>
                    <div class="form-group">
                        <button type="submit" name="add" id="post" class="btn ">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

</section>
</body>
</html>