<?php
require_once ("Tridy/Ucet.php");
require_once ("Tridy/Kontokorent.php");

$Ucet = new Ucet();
$Kontokorent = new Kontokorent();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<?php
$castkaVk = $_POST['vklad'];
$castkaVy = $_POST['vyber'];
if (isset($_POST['ok'])) {
    if("vklad" !== null) {
        $Ucet->Vklad($castkaVk);
    }
    if ("vyber" !== null){
        $Ucet->Vyber($castkaVy);
    }

}

if (isset($_POST['okKon'])) {
    if("vklad" !== null) {
        $Kontokorent->Vklad($castkaVk);
    } else if ("vyber" !== null){
        $Kontokorent->Vyber($castkaVy);
    }

}

?>
<body>
<p>zustatek: <?php echo $Ucet->zustatek ?></p>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    <h2>klasik ucet</h2>
    Vklad: <input type="number" name="vklad"><br>
    Vyber: <input type="number" name="vyber"><br>

    <input type="submit" name="ok" value="odeslat">
</form>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    <h2>kontokorent</h2>
    <p>zustatek kontokorentu: <?php echo $Kontokorent->zustatekKontokorentu ?></p>

    Vklad: <input type="text" name="vklad"><br>
    Vyber: <input type="text" name="vyber"><br>

    <input type="submit" name="okKon" value="odeslat">
</form>

</body>
</html>