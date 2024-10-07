<?php

    function XSSFilter($text){
        $text = trim($text);
        $text = strip_tags($text);

        return $text;
    }

    function CheckUsername($inputUsername){
        include "db.php";
        
        $query = "SELECT * FROM users WHERE u_username = :username";

        $stmt = $connect->prepare($query);

        $stmt->execute([":username"=>$inputUsername]);

        return $stmt->rowCount();
    }

    function Register($inputUsername,$inputPasswd){
        include "db.php";

        $query = "INSERT INTO users(u_username,u_password) VALUES(:username,:passwd)";

        $stmt = $connect->prepare($query);

        $result = $stmt->execute([":username"=>$inputUsername,":passwd"=>$inputPasswd]);

        return [$connect->lastInsertId(),$result];
    }


    function Login($inputUsername,$inputPasswd){
        include "db.php";

        $query = "SELECT * FROM users WHERE u_username = :username AND u_password = :passwd";

        $stmt = $connect->prepare($query);

        $stmt->execute([":username"=>$inputUsername,":passwd"=>$inputPasswd]);

        $result = $stmt->fetch();

        if($stmt->rowCount()){
            return [$stmt->rowCount(),$result];
        }else{
            return [$stmt->rowCount(),0];
        }
    }

    function GetUserInfo($id){
        include "db.php";

        $query = "SELECT * FROM users WHERE u_id = :id";

        $stmt = $connect->prepare($query);

        $stmt->execute([":id"=>$id]);

        return $stmt->fetch();
    }

    function GetOsintQ(){
        include "db.php";

        $query = "SELECT * FROM osint";

        $stmt = $connect->prepare($query);

        $stmt->execute();

        $result = $stmt->fetchAll();

        return $result;
    }


    function GetWebQ(){
        include "db.php";

        $query = "SELECT * FROM web";

        $stmt = $connect->prepare($query);

        $stmt->execute();

        $result = $stmt->fetchAll();

        return $result;
    }

    function GetUsersScores(){
        include "db.php";

        $query = "SELECT * FROM users ORDER BY score DESC";

        $stmt = $connect->prepare($query);

        $stmt->execute();

        $result = $stmt->fetchAll();

        return $result;
    }

    function GetSettings(){
        include "db.php";

        $query = "SELECT * FROM settings";

        $stmt = $connect->prepare($query);

        $stmt->execute();

        return $stmt->fetch();
    }

    function GetCategory(){
        include "db.php";

        $query = "SELECT * FROM category";

        $stmt = $connect->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function GetQuestion($category){
        include "db.php";

        $query = "SELECT * FROM question WHERE q_category = :id";

        $stmt = $connect->prepare($query);

        $stmt->execute([":id"=>$category]);

        return $stmt->fetchAll();
    }

    function GetUserAnswer($id){
        include "db.php";

        $query = "SELECT * FROM solvedquestions WHERE s_uid = :id";

        $stmt = $connect->prepare($query);

        $stmt->execute([":id"=>$id]);

        $result = $stmt->fetchAll();

        return $result;
    }

?>