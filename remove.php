<?php
    $id = $_GET['id'];
    $number = $_GET['number'];
    include 'config.php';
    $sql = "SELECT * FROM `clients` WHERE id=$id";
    $query = $connect->prepare($sql);
    $query->execute();
    $client = $query->fetch(PDO::FETCH_ASSOC);
    date_default_timezone_set('Asia/Tashkent'); 
    $date = date("Y-m-d H:i:s");
    $scores = $client['scores'];
?>
<!doctype html>
<html lang="en">
<head>
    <!-- css -->
    <link rel="stylesheet" href="libs/bootstrap-4.0.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/Font/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- ./css -->
    <script>
      function checkScore(){
          const removeScore = +document.querySelector('input[type="number"]').value;
          const scores = +document.querySelector('input[type="hidden"]').value
          if(removeScore>0){
            if(removeScore>scores){
              alert('Баллы для снятия не могут быть больше накомпленных баллов!');
              return false;
          }
          else{
              return true;
          }
          }else{
              alert('Введите верное количество бонусов');
              return false
          }
      }
  </script>
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
            <h1 class='d-flex justify-content-between'><?= $client['name']; ?> <span class="total">Накоплено: <?= $scores;?></h1>
            <form action="./removeBonus.php?id=<?=$id;?>&number=<?=$number;?>" method="post" onsubmit='return checkScore()'>
                <div class="form-group">
                    <input type="hidden" value="<?=$scores; ?>">
                    <input type="number" name="score" step='0.01' class="form-control" placeholder='Баллы для снятия'>
                </div>

                <div class="form-group">
                    <textarea name="content" class="form-control" placeholder='Добавить сообщение'></textarea>
                </div>

                <div class="form-group">
                    <a href='./' class="btn btn-primary" type="submit">Назад</a>
                    <button class="btn btn-danger" type="submit">Отнять</button>
                </div>
            </form>
        </div>
    </div>
</div>
  <!-- js -->

  
  <script src="libs/jquery/jquery-3.3.1.min.js"></script>
    <script src="libs/bootstrap-4.0.0-dist/js/popper.min.js"></script>
    <script src="libs/bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
</body>
</html>