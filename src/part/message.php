<?php

if (isset($_SESSION["color"]) || isset($_SESSION["message"])) {
    $alert = "<div class='alert alert-" . $_SESSION["color"] . " alert-dismissible fade show' role='alert'>
  " . $_SESSION["message"] . "
</div>";
    echo $alert;
    unset($_SESSION["message"]);
    unset($_SESSION["color"]);
}
