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

    function GetNumInfo(){
        include "db.php";

        $query1 = "SELECT * FROM users";
        $query2 = "SELECT * FROM question";
        $query3 = "SELECT * FROM category";

        $stmt = $connect->prepare($query1);
        $stmt->execute();
        $result1 = $stmt->fetchAll();


        $stmt = $connect->prepare($query2);
        $stmt->execute();
        $result2 = $stmt->fetchAll();

        $stmt = $connect->prepare($query3);
        $stmt->execute();
        $result3 = $stmt->fetchAll();

        return [$result1,$result2,$result3];
    }

    function Get5Question(){
        include "db.php";

        $query = "SELECT * FROM users INNER JOIN solvedquestions ON users.u_id = solvedquestions.s_uid INNER JOIN question ON question.q_id = solvedquestions.s_qid INNER JOIN category ON category.c_id = question.q_category ORDER BY solvedquestions.s_date DESC LIMIT 5";

        $stmt = $connect->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function GetScoreboard(){
        include "db.php";
        
        $query = "SELECT * FROM solvedquestions INNER JOIN question ON question.q_id = solvedquestions.s_qid INNER JOIN users ON users.u_id = solvedquestions.s_uid";

        $stmt = $connect->prepare($query);

        $stmt->execute();

        $solvedQuestion = $stmt->fetchAll();

        $query = "SELECT * FROM users";

        $stmt = $connect->prepare($query);

        $stmt->execute();
        $users = $stmt->fetchAll();
        $userNum = count($users);

        $scoreBoard = [];

        for ($i=0; $i < $userNum ; $i++) {
            $total = 0;
            foreach ($solvedQuestion as $value) {
                if($users[$i]["u_id"] == $value["u_id"]){
                    $total += $value["q_score"];
                }
            }
            $scoreBoard[$i] = [$total,$users[$i]["u_username"],$users[$i]["u_id"]]; 
        }

        rsort($scoreBoard);

        return $scoreBoard;
    }

    function GetCategoryNumber($id){
        include "db.php";

        $query = "SELECT COUNT(*)as number FROM question WHERE question.q_category = :categoryNumber";

        $stmt = $connect->prepare($query);
    
        $stmt->execute(["categoryNumber"=>$id]);

        return $stmt->fetch();
    }

    function AddCategory($category){
        include "db.php";

        $query = "INSERT INTO category(c_name) VALUES(:category)";

        $stmt = $connect->prepare($query);

        $stmt->execute([":category"=>$category]);
    }

    function DeleteCategory($id){
        include "db.php";

        $query = "DELETE FROM category WHERE c_id = :id";

        $stmt = $connect->prepare($query);

        $stmt->execute([":id"=>$id]);
    }

    function GetAllQuestionWithCategory(){
        include "db.php";

        $query = "SELECT * FROM question INNER JOIN category ON category.c_id = question.q_category ORDER BY category.c_id";

        $stmt = $connect->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function AddQuestion($qTitle,$qDesc,$qLink,$qScore,$qPass,$qCategory){
        include "db.php";

        $query = "INSERT INTO question(q_title,q_desc,q_link,q_password,q_category,q_score) VALUES(:qTitle,:qDesc,:qLink,:qPassword,:qCategory,:qScore)";

        $stmt = $connect->prepare($query);

        $stmt->execute([":qTitle"=>$qTitle,":qDesc"=>$qDesc,":qLink"=>$qLink,"qPassword"=>$qPass,":qCategory"=>$qCategory,"qScore"=>$qScore]);
    }

?>