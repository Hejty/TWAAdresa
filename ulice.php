<?php
$kraj_kod = htmlspecialchars($_GET["kraj_kod"]);
$okres_kod = htmlspecialchars($_GET["okres_kod"]);
$obec_kod = htmlspecialchars($_GET["obec_kod"]);

if (!is_numeric($obec_kod)) {
    header('Location: index.php?hlaska=1');
    exit;
}
include_once("adresa.class.php");
$adresa = new adresa();
$ulicee = $adresa->vratUliceObci($obec_kod);
if (empty($ulicee)) {
    header('Location: souhrn.php?ulice_kod=' . "" . "&kraj_kod=" . $kraj_kod . "&okres_kod=" . $okres_kod . "&obec_kod=" . $obec_kod);
    exit;
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
    <title>Krok 4: Zadej Ulici</title>
</head>
<body>
<div id="content">
    <h1>Krok 4: Zadej Ulici</h1>
    <form action="souhrn.php" method="get">
        <select name="ulice_kod">
            <?php
            foreach ($ulicee as $ulice)
                echo '<option value="' . $ulice->ulice_kod . '">' . $ulice->nazev . "</option>\n";
            echo "</select>";
            echo '<input type="hidden" name="kraj_kod" value="' . $kraj_kod . '">';
            echo '<input type="hidden" name="okres_kod" value="' . $okres_kod . '">';
            echo '<input type="hidden" name="obec_kod" value="' . $obec_kod . '">';
            ?>
            <input type="submit" value="Potvrdit">
    </form>
</div>
</body>
</html>
