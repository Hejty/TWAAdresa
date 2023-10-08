<?php
$kraj_kod = htmlspecialchars($_GET["kraj_kod"]);
$okres_kod = htmlspecialchars($_GET["okres_kod"]);
$obec_kod = htmlspecialchars($_GET["obec_kod"]);
$ulice_kod = htmlspecialchars($_GET["ulice_kod"]);

include_once("adresa.class.php");
$adresa = new adresa();
$kraj = $adresa->vratNazevKraje($kraj_kod);
$okres = $adresa->vratNazevOkresu($okres_kod);
$obec = $adresa->vratNazevObce($obec_kod);
if ($ulice_kod != "") {
    $ulice = $adresa->vratNazevUlice($ulice_kod);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Krok 5: Souhrn</title>
</head>
<body>
<div id="content">
    <h1>Krok 5: Souhrn</h1>
    <?php
    echo "Kraj: " . $okres;
    echo '<br>';
    echo "Okres: " . $okres;
    echo '<br>';
    echo "Obec: " . $obec;
    echo '<br>';
    if ($ulice_kod != "")
        echo "Ulice: ". $ulice;
    echo '<br>';
    ?>
</div>
</body>
</html>
