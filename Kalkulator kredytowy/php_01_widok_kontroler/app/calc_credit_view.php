<?php require_once dirname(__FILE__) . '/../config.php'; ?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Kalkulator kredytowy</title>
</head>
<body>

<h2>Kalkulator kredytowy</h2>

<form action="<?php print(_APP_URL); ?>/app/calc_credit.php" method="post">
    <label for="id_kwota">Kwota kredytu (PLN): </label>
    <input id="id_kwota" type="text" name="kwota" value="<?php if(isset($kwota)) print($kwota); ?>" /><br /><br />

    <label for="id_lata">Liczba lat: </label>
    <input id="id_lata" type="text" name="lata" value="<?php if(isset($lata)) print($lata); ?>" /><br /><br />

    <label for="id_oprocentowanie">Oprocentowanie roczne (%): </label>
    <input id="id_oprocentowanie" type="text" name="oprocentowanie" value="<?php if(isset($oprocentowanie)) print($oprocentowanie); ?>" /><br /><br />

    <input type="submit" value="Oblicz ratę" />
</form>

<?php
if (isset($messages) && count($messages) > 0) {
    echo '<ol style="margin: 20px; padding: 10px; background-color: #f88; width:300px;">';
    foreach ($messages as $msg) {
        echo '<li>'.$msg.'</li>';
    }
    echo '</ol>';
}
?>

<?php if (isset($result)) { ?>
<div style="margin: 20px; padding: 10px; background-color: #ff0; width:300px;">
    <?php echo 'Miesięczna rata: ' . $result . ' PLN'; ?>
</div>
<?php } ?>

</body>
</html>
