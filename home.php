<?php
    session_cache_expire(5);
    session_start();

    if (!isset($_SESSION["system"]["id"])) {
        header("Location: index.php");
        
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faster Food Service - Admin</title>
    
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include "menu.php"; ?>
    <div class="container">
        <?php
            $fd = $pg = "";
            
            if(isset($_GET["fd"])){
                $fd = trim ($_GET["fd"]);
            }

            if(isset($_GET["pg"])){
                $pg = trim ($_GET["pg"]);
            }

            if (empty ($pg)){
                $page = "dashboard.php";

            }else{
                $page = $fd."/".$pg.".php";

            }
            if(file_exists($page)){
                include $page;

            }else{
                include "error.php";
                
            }

        ?>
    </div>
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>