<?php
    $id = $_GET['id'];
    include 'config.php';
    $sql = "SELECT * FROM `messages` WHERE client_id=$id ORDER BY `id` DESC";
    $query = $connect->prepare($sql);
    $query->execute();
    $notes = $query->fetchAll(PDO::FETCH_ASSOC);
    $sql2 = "SELECT * FROM `clients` WHERE id=$id";
    $query2 = $connect->prepare($sql2);
    $query2->execute();
    $client = $query2->fetch(PDO::FETCH_ASSOC);
    $scores = 0;
    foreach ($notes as $note) {
     if($note['mode']==='add'){
         $scores+=$note['scores'];
     }else{
         $scores-=$note['scores'];
     }
    }
    
?>

<!doctype html>
<html lang="en">
<head>
    <!-- css -->
    <link rel="stylesheet" href="libs/bootstrap-4.0.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/Font/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- ./css -->
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
    <a class="navbar-brand" href="/">Roselips Loyalty</a>
    <a href="./" class="btn btn-primary">Назад</a>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-3 d-flex justify-content-between"><?= $client['name']; ?> <span class="total">Накоплено: <?= $scores;?></span></h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Баллы</th>
                        <th>Дата</th>
                        <th>Заметка</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($notes as $note): ?>
                    <tr>
                        <td><?= $note['id'];?></td>
                        <td>
                            <?php if($note['mode']==='add'): ?>
                                <span class='bg-success'>+<?= $note['scores'];?></span>
                            <?php else: ?>
                                <span class='bg-danger'>-<?= $note['scores'];?></span>
                                <?php endif; ?>                        
                        </td>
                        <td><?= $note['date'];?></td>
                        <td><?= $note['message'];?></td>
                   </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

       
    <!-- js -->
    <script src="libs/jquery/jquery-3.3.1.min.js"></script>
    <script src="libs/bootstrap-4.0.0-dist/js/popper.min.js"></script>
    <script src="libs/bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
</body>
</html>