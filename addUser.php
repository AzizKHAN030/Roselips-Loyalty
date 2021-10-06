<?php
    session_start();
    $title = $_POST['title'];
    $content = $_POST['content'];
    include 'config.php';
    $sql = "INSERT INTO `news`(`title`, `content`) VALUES (:title, :content)";
    $query = $connect->prepare($sql);
    $query->execute([
        'title'=>$title,
        'content'=>$content
    ]);
    header('Location: /')
?>