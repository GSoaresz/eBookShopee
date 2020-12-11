<?php
    $name = $_POST['name'];
    $category = $_POST['category'];
    $email = $_POST['email'];
    $passwd  = md5($_POST['passwd']);
    
    $conexao = mysqli_connect("localhost","root","","eBookShopee") or print (mysqli_error());
    $query = "INSERT INTO users (name,category,email,passwd) VALUES ('$name','$category','$email','$passwd')";

    if (mysqli_query($conexao, $query)) {  
        header("Location: login.php?msg=OK");
    } else {
        header("Location: login.php?msg=ERRO");
    }
?>