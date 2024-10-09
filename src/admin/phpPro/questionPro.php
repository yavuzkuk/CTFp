<?php



    include "../../functions/funtions.php";

    session_start();

    echo "<pre>";
    print_r($_FILES);
    echo"</pre>";

    // dosya sistemi yüklenicek

    if(!empty($_POST["qTitle"]) && !empty($_POST["qDesc"]) && !empty($_POST["qScore"]) && intval($_POST["qScore"]) && !empty($_POST["qPass"]) && $_POST["qCategory"] != 0 && intval($_POST["qCategory"])){
        //AddQuestion(XSSFilter($_POST["qTitle"]),XSSFilter($_POST["qDesc"]),XSSFilter($_POST["qScore"]),XSSFilter($_POST["qPass"]),$_POST["qCategory"]);
    }




?>