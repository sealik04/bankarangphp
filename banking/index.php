<?php
require_once ("Tridy/Ucet.php");
require_once ("Tridy/Kontokorent.php");
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

    // Add the following two lines here
    $kontokorentZustatek = $Kontokorent->getZustatekKontokorentu();
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

    // Add the following line here
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
<p>zustatek: <?php echo $Ucet->zustatek ?></p>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <h2>klasik ucet</h2>
    Vklad: <input type="number" name="vklad"><br>
    Vyber: <input type="number" name="vyber"><br>

    <input type="submit" name="ok" value="odeslat">
</form>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <h2>kontokorent</h2>
    <p>zustatek kontokorentu: <?php echo $Kontokorent->zustatekKontokorentu ?></p>

    Vklad: <input type="number" name="vklad"><br>
    Vyber: <input type="number" name="vyber"><br>

    <input type="submit" name="okKon" value="odeslat">
</form>

</body>
</html>
