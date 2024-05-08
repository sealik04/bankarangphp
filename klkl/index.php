<?php
require_once("Ucet.php");
require_once("Kontokorent.php");

session_start();

if (!isset($_SESSION['Ucet'])) {
    $_SESSION['Ucet'] = new Ucet();
}
$Ucet = $_SESSION['Ucet'];

if (!isset($_SESSION['Kontokorent'])) {
    $_SESSION['Kontokorent'] = new Kontokorent();
}
$Kontokorent = $_SESSION['Kontokorent'];

if (isset($_POST['ok'])) {
    $castkaVk = isset($_POST['vklad']) ? floatval($_POST['vklad']) : 0;
    $castkaVy = isset($_POST['vyber']) ? floatval($_POST['vyber']) : 0;

    if ($castkaVk > 0) {
        $Ucet->vklad($castkaVk);
    }
    if ($castkaVy > 0){
        $Ucet->vyber($castkaVy);
    }

    $Ucet->setKontokorent($Kontokorent);
}

if (isset($_POST['okKon'])) {
    $castkaVkKon = isset($_POST['vklad']) ? floatval($_POST['vklad']) : 0;
    $castkaVyKon = isset($_POST['vyber']) ? floatval($_POST['vyber']) : 0;

    if ($castkaVkKon > 0) {
        $Kontokorent->vklad($castkaVkKon);
    } elseif ($castkaVyKon > 0){
        $Kontokorent->vyber($castkaVyKon);
    }

    $Ucet->setKontokorent($Kontokorent);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<p>zůstatek: <?php echo $Ucet->getZustatek() ?></p>
<p>kontokorent: <?php echo $Kontokorent->getZustatekKontokorentu() ?></p>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <h2>účet</h2>
    vklad: <input type="number" name="vklad"><br>
    výběr: <input type="number" name="vyber"><br>

    <input type="submit" name="ok" value="Submit">
</form>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <h2>kontokorent</h2>
    <p>zůstatek kontokorentu: <?php echo $Kontokorent->getZustatekKontokorentu() ?></p>

    vklad: <input type="number" name="vklad"><br>
    výběr: <input type="number" name="vyber"><br>

    <input type="submit" name="okKon" value="Submit">
</form>

</body>
</html>