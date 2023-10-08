<?php
$kraj_kod = htmlspecialchars($_GET["kraj_kod"]);
$okres_kod = htmlspecialchars($_GET["okres_kod"]);
if (!is_numeric($okres_kod)) {
    header('Location: index.php?hlaska=1');
    exit;
}
include_once("adresa.class.php");
$adresa = new adresa();
$obce = $adresa->vratObceOkresu($okres_kod);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Krok 3: Zadej Obec</title>
</head>
<body>
<div id="content">
    <h1>Krok 3: Zadej obec</h1>
    <form action="ulice.php" method="get">
        <select name="obec_kod">
            <?php
            foreach ($obce as $obec)
                echo '<option value="' . $obec->obec_kod . '">' . $obec->nazev . "</option>\n";
            echo "</select>";
            echo '<input type="hidden" name="kraj_kod" value="' . $kraj_kod . '">';
            echo '<input type="hidden" name="okres_kod" value="' . $okres_kod . '">';
            ?>
            <input type="submit" value="Potvrdit">
    </form>
</div>
</body>
</html>
