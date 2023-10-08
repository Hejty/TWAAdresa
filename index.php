<?php
include_once("adresa.class.php");
$adresa = new adresa();
$kraje = $adresa->vratKraje();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Krok 1: Zadej Kraj</title>
</head>
<body>
<div id="content">
    <h1>Krok 1: Zadej kraj</h1>
    <form action="okres.php" method="get">
        <select name="kraj_kod">
            <?php
            foreach ($kraje as $kraj)
                echo '<option value="' . $kraj->kraj_kod . '">' . $kraj->nazev . "</option>\n";
            ?>
        </select>
        <input type="submit" value="Potvrdit">
    </form>
</div>
</body>
</html>
