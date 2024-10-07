<?php

    include "../../functions/funtions.php";
    session_start();

    $username = XSSFilter($_POST["inputUsername"]);
    $passwd = XSSFilter($_POST["inputPasswd"]);



    if($username == "randomkullanıcı" && md5($passwd) == "80ed019aa14dc14e68377af8faf26f05"){
        $_SESSION["message"] = "Başarıyla giriş yaptınız.";
        $_SESSION["color"] = "success";
        
        $_SESSION["idorId"] = "3";
        header("Location:../mainpage.php");
        exit();
    }else{
        $_SESSION["message"] = "Aşağıda kullanıcı adı ve şifre??!! var görmüyor musun? Ya da bir şeyler gözden kaçtı.";
        $_SESSION["color"] = "danger";
        
        header("Location:../");
        exit();
    }


?>