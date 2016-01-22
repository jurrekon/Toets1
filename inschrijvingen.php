<?php
  $connection = mysqli_connect('localhost', 'root');
	
  mysqli_select_db($connection, 'phptoets');
?>

<html>
    <head>
        <title>Inschrijvingen lijst</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
        <meta charset="utf-8">
    </head>
    
    <body>  
<div class="menu">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="inschrijvingen.php">Alle inschrijvingen</a></li>
        <li><a href="inschrijven.php">Inschrijven</a></li>
        <li><a href="activiteit.php">Nieuwe activiteiten</a></li>
    </ul>
</div>
        
<div class="content">
    
    <h1>Huidige inschrijvingen</h1>
    
    <table>
<tr>
    <th>Naam</th><th>Activiteit</th><th>Inschrijf datum</th>
</tr>
    
<?php

  $query = "SELECT activiteiten.titel, persooninschrijving.* FROM persooninschrijving
LEFT JOIN activiteiten ON persooninschrijving.activiteit_id = activiteiten.id ORDER BY id ASC";
  
  $result = mysqli_query($connection, $query);
 
while ($row = mysqli_fetch_assoc($result))
{
  $persooninschrijving_id = $row["id"];
  $persooninschrijving_voornaam = $row["voornaam"];
  $persooninschrijving_achternaam = $row["achternaam"];
  $persooninschrijving_telefoon = $row["telefoon"];
  $persooninschrijving_adres = $row["adres"];
  $persooninschrijving_email = $row["email"];
  $activiteit_titel = $row["titel"];
  $persooninschrijving_datum_inschrijving = $row["datum_inschrijving"];
    
  echo "
<tr>
    <td>$persooninschrijving_voornaam $persooninschrijving_achternaam</td>
    <td>$activiteit_titel</td>
    <td>$persooninschrijving_datum_inschrijving</td>
</tr>

  \n";
}

?>

    </table>
    <br>
    <a class='inschrijven' href="inschrijven.php">Schrijf mij in!</a>
    
</div>
</body>
</html>