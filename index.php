<?php
    session_start();
    include 'config.php';
    $sql = "SELECT * FROM `clients` WHERE id";
    $query = $connect->prepare($sql);
    $query->execute();
    $clients = $query->fetchAll(PDO::FETCH_ASSOC);
    $scores = 0;
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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">Roselips Loyalty</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
    </button>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
     </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-3">Все Клиенты</h1>
            <a href="create.php" class="btn btn-success mb-3">Добавить клиента</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ФИО</th>
                        <th>Номер</th>
                        <th>Баллы</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($clients as $client): ?>
                    <tr>
                        <td><?= $client['id'];?></td>
                        <td><?= $client['name'];?></td>
                        <td><?= $client['number'];?></td>
                        <td><?= $client['scores'];?></td>
                        <td>
                            <a href="history.php?id=<?= $client['id'];?>" class="btn btn-warning">
                                История
                            </a>
                            <a href="add.php?id=<?= $client['id'];?>&number=<?= $client['number'];?>" class="btn btn-success">
                                Добавить
                            </a>
                            <a href="remove.php?id=<?=$client['id'];?>&number=<?= $client['number'];?>" class="btn btn-danger">Отнять</a>
                        </td>
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