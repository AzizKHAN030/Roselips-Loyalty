<?php
    date_default_timezone_set('Asia/Tashkent'); 
    $date = trim(date("Y-m-d H:i:s"));
    $id = $_GET['id'];
    $score = $_POST['score']/100;
    $content = $_POST['content'];
    $number = $_GET['number'];
    include 'config.php';
    $sql = "INSERT INTO `messages`(`client_id`,`date`, `scores`, `number`,`message`) VALUES (:id,:date,:score,:number,:content)";
    $query = $connect->prepare($sql);
    $query->execute([
        'id'=>$id,
        'date'=>$date,
        'score'=>$score,
        'number'=>$number,
        'content'=>$content
    ]);
    
    $sql2 = "SELECT * FROM `messages` WHERE client_id=$id";
    $query2 = $connect->prepare($sql2);
    $query2->execute();
    $notes = $query2->fetchAll(PDO::FETCH_ASSOC);
    
    $total=0;
    foreach ($notes as $note) {
        if($note['mode']==='add'){
            $total+=$note['scores'];
        }else{
            $total-=$note['scores'];
        }
    }
    
    $sql3 = "UPDATE `clients` SET `scores`=$total WHERE `id`=$id";
    $query3 = $connect->prepare($sql3);
    $query3->execute();
    header('Location: /');
?>
