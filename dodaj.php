<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="dodaj.php" method="POST">
<label>Produkt</label>
<input type="text" name="nazwa">
<label>Kategoria</label>
<input type="text" name="kategoria">
<label>Cena</label>
<input type="number" name="cena">
<button type='submit'>Dodaj</button>
</form>
<?php
if(isset($_POST['nazwa'], $_POST['kategoria'], $_POST['cena'])){
$con = mysqli_connect('localhost', 'root', '', 'sklep');
$produkt = $_POST['nazwa'];
$kategoria = $_POST['kategoria'];
$cena = $_POST['cena'];
$zap = "INSERT INTO produkty (nazwa, kategoria, cena)  VALUES ('$produkt', '$kategoria', $cena);";
mysqli_query($con, $zap);
mysqli_close($con);
};
?>
<a href="index.php">Wróć</a>
</body>
</html>