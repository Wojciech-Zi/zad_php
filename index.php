<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="styl.css">
<title>Document</title>
</head>
<body>
<h1>Sklep</h1>
<main>
<form action='index.php' method="POST">
<select name="kategoria">
<?php
$conn = mysqli_connect('localhost', 'root', '', 'sklep');
$zap = 'SELECT DISTINCT kategoria FROM produkty';
$wynik = mysqli_query($conn, $zap);
while ($wiersz = mysqli_fetch_array($wynik)){
echo "<option>" . $wiersz[0] . "</option>";
};
?>
</select>
<br>
<button type='submit'>Pokaż</button>
</form>
</main>
<?php
if (isset($_POST['kategoria'])){
$kategoria = $_POST['kategoria'];
$poloncz = MYSQLI_connect('localhost', 'root', '', 'sklep');
if(!$poloncz){
echo die("Błąd połączenia!");
};
$zapytanie = "SELECT * from produkty WHERE kategoria = '$kategoria';";
$wynik = mysqli_query($poloncz, $zapytanie);
echo '<table border=1>';
echo '<tr>
<th>ID</th>
<th>Nazwa</th>
<th>Kategoria</th>
<th>Cena</th>
</tr>';
while ($cos = mysqli_fetch_assoc($wynik)){
echo '<tr>';
echo '<td>' . $cos['id'] . '</td>';
echo '<td>' . $cos['nazwa'] . '</td>';
echo '<td>' . $cos['kategoria'] . '</td>';
echo '<td>' . $cos['cena'] . '</td>';
echo '</tr>';
};
echo '</table>';
}
?>
<a href="dodaj.php">Dodaj</a>
</body>
</html>