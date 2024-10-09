<?php

    if(isset($_SESSION["color"]) && isset($_SESSION["message"])){
        echo '<div class="alert alert-'.$_SESSION["color"].' alert-dismissible fade show" role="alert">
                <strong>'.$_SESSION["message"].'</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        unset($_SESSION["message"]);
        unset($_SESSION["color"]);
    }





?>