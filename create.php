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
            <h1>Добавление нового клиента:</h1>
            <form>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder='Введите имя и фамилию' name="name">
                </div>
                <div class="form-group">
                    <input name="number" placeholder='Номер тел: (998XXYYYYYYY)' type='number' class="form-control">
                </div>

                <div class="form-group">
                    <a href='./' class="btn btn-primary">Назад</a>
                    <button class="btn btn-success" type="submit">Добавить</button>
                </div>
            </form>
        </div>
    </div>
</div>
  <!-- js -->
  <script src="libs/jquery/jquery-3.3.1.min.js"></script>
    <script src="libs/bootstrap-4.0.0-dist/js/popper.min.js"></script>
    <script src="libs/bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
    
    <script>
       const form = document.querySelector('form');
       const btn = form.querySelector('button[type="submit"]');
       form.addEventListener('submit',(e)=>{
           e.preventDefault();
       })
       
       btn.addEventListener('click',(e)=>{
        const name = form.querySelector('input[type="text"]').value;
            if(!name){
                alert('Введите имя');
            }else{
                let xhr = new XMLHttpRequest();
         xhr.open('POST', 'createClient.php', true);
            xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    location.href = "/";
                } else {
                    alert(data);
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
            }
       })
    </script>
</body>
</html>