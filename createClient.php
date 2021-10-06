<?php
    $name = $_POST['name'];
    $number = $_POST['number'];
    include 'config.php';
    $sql1="SELECT `number` FROM `clients` WHERE `number`=$number";
    $query1 = $connect->prepare($sql1);
    $query1->execute();
    $numbers = $query1->fetch(PDO::FETCH_ASSOC);
    if(strlen($number)==12){
        if($numbers){
            echo "Клиент с таким номером существует!";
        }else{
            $sql = "INSERT INTO `clients`(`name`,`number`) VALUES (:name,:number)";
            $query = $connect->prepare($sql);
            $query->execute([
                'name'=>$name,
                'number'=>$number
            ]);  
            echo "success";
        }
    }else{
        echo "Номер введен неправильно!";
    }

    
?>
