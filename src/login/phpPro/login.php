<?php

    session_start();

    include "../../functions/funtions.php";

    if(!empty($_POST["username"]) && !empty($_POST["password"])){

        $username = XSSFilter($_POST["username"]);
        $passwd = XSSFilter($_POST["password"]);
        
        if(empty($username) || empty($passwd)){
            $_SESSION["message"] = "Girdiğiniz bilgilerde sıkıntı var başka bir şey deneyin.";
            $_SESSION["color"] = "danger";
        }else{
            $result = Login($username,$passwd);
            
            $status = $result[0];


            if($status){
                $_SESSION["id"] = $result[1]["u_id"];
                $_SESSION["login"] = "true";
                $_SESSION["isAdmin"] = $result[1]["u_isAdmin"];

                $_SESSION["message"] = "Başarıyla giriş yapıldı";
                $_SESSION["color"] = "success";
                
                header("Location:../");
                exit();
            }else{
                $_SESSION["message"] = "Giriş yapılamadı";
                $_SESSION["color"] = "secondary";
                
                header("Location:../login.php");
                exit();
            }
        }      

    }
?>