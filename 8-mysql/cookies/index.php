<?php 
    setcookie("customerId","",time()+ 60 * 60 * 24);

    $_COOKIE['customerId'] = "Abdel Magid";

    echo $_COOKIE['customerId'];
?>