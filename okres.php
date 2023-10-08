<?php
$kraj_kod = htmlspecialchars($_GET["kraj_kod"]);
if (!is_numeric($kraj_kod))
{
    header('Location: index.php?hlaska=1');
    exit;
}
include_once ("adresa.class.php");
$adresa = new adresa();
$okresy = $adresa->vratOkresyKraje($kraj_kod);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Krok 2: Zadej Okres</title>
</head>
<body>
<div id="content">
<h1>Krok 2: Zadej okres</h1>
<form action="obec.php" method="get">
    <select name="okres_kod">
        <?php
        foreach ($okresy as $okres)
            echo '<option value="' . $okres->okres_kod . '">' . $okres->nazev . "</option>\n";
        echo "</select>";
        echo '<input type="hidden" name="kraj_kod" value="' . $kraj_kod . '">';
        ?>
    <input type="submit" value="Potvrdit">
</form>
</body>
</div>
</html>
