<?php

    session_start();
    
    include "../../functions/funtions.php";

    if(isset($_POST) && !empty($_POST["user-name"]) && !empty($_POST["password"]) && isset($_POST["registerButton"])){

        $passwd = XSSFilter($_POST["password"]);
        $passwd2 = XSSFilter($_POST["password2"]);
        
        $inputUsername = XSSFilter($_POST["user-name"]);

        if($passwd2 == $passwd){
            $result = CheckUsername($inputUsername);
            if(!empty($passwd) && !empty($inputUsername)){
                if($result){
                    $_SESSION["message"] = "Bu kullanıcı adı alınmış, başka bir şey dene.";
                    $_SESSION["color"] = "secondary";
                    header("Location:../register.php");
                    exit();
                }else{
                    
                    $result = Register($inputUsername,$passwd2);
                    $id = $result[0];
                    $regResult = $result[1];

                    if($regResult){
                        $_SESSION["message"] = "Başarıyla kayıt oldunuz";
                        $_SESSION["color"] = "success";
                        
                        $_SESSION["isAdmin"] = GetUserInfo($id)["u_isAdmin"];
                        $_SESSION["id"] = $id;
                        $_SESSION["login"] = "true";
                        
                        header("Location:../");
                        exit();
                    }else{
                        $_SESSION["message"] = "Bir sorun oldu tekrar deneyin";
                        $_SESSION["color"] = "warning";
                        
                        header("Location:../");
                        exit();
                    }

                }
            }else{
                $_SESSION["message"] = "Kullanıcı adı ve şifrenizi tekrar gözden geçiriniz.";
                $_SESSION["color"] = "secondary";
                header("Location:../register.php");
                exit();
            }
        }else{
            $_SESSION["message"] = "Şifreler eşleşmiyor";
            $_SESSION["color"] = "secondary";
            header("Location:../register.php");
            exit();
        }
    }



?>