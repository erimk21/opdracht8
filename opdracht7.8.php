<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Array items toevoegen in een sessie</h1>
    <form action="" method="post">
    <input type="text" name="item" placeholder="Appel"> <br>
    <input type="submit" name="submit" value="Toevoegen">
    </form><br>
    <a href="opdracht_7.8.php?knop=schudden">Schudden</a><br>
    <a href="opdracht_7.8.php?knop=sorteren">Sorteren</a><br>
    <a href="opdracht_7.8.php?knop=wissen">Wissen</a><br>

    <?php
    error_reporting(0);
    if(!$_SESSION["lijst"]){
        $_SESSION["lijst"] = array();
    }

    if(isset($_POST["item"]) && trim($_POST["item"]) != '') {
        $veld = trim($_POST["item"]);
        if(!in_array($veld, $_SESSION["lijst"], true)) {
            $_SESSION["lijst"][] = $veld;
        }
    }

    if(!empty($_SESSION["lijst"])) {
        echo "<h2>Winkelmand</h2>";

        foreach($_SESSION["lijst"] as $waarden) {
            echo "$waarden <br>";
        }
    }

    if(isset($_GET["knop"])) {
        if($_GET["knop"] == "schudden") {
            shuffle($_SESSION["lijst"]);
        }
    }

    if(isset($_GET["knop"])) {
        if($_GET["knop"] == "sorteren") {
            sort($_SESSION["lijst"]);
        }
    }

    if(isset($_GET["knop"])) {
        if($_GET["knop"] == "wissen") {
            $_SESSION = array();
            session_destroy();
            echo "Alle sessievariabelen worden verwijderd.";

            header("Refresh: 0; url=opdracht_7.8.php");
        }
    }
    ?>
</body>
</html>