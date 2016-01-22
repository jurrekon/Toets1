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
    
    <h1>Activiteiten lijst</h1>
    
    <table>
<tr>
    <th>Naam</th><th>Categorie</th><th>Datum</th><th>Kosten</th>
</tr>
    
<?php

  $query = "select categorie.naam, activiteiten.* from activiteiten
left join categorie on activiteiten.categorie = categorie.id order by titel asc";
  
  $result = mysqli_query($connection, $query);
 
while ($row = mysqli_fetch_assoc($result))
{
  $activiteiten_id = $row["id"];
  $activiteiten_title = $row["titel"];
  $activiteiten_beschrijving = $row["beschrijving"];
  $activiteiten_datum = $row["datum"];
  $categorie_naam = $row["naam"];
  $activiteiten_kosten = $row["kosten"];
  $small = substr($activiteiten_beschrijving, 0 , 300);
    if ($activiteiten_kosten == "0.00"){
        $activiteiten_kosten = "Gratis";
    }
    else {
        $activiteiten_kosten = "&euro;$activiteiten_kosten";
    }
    
  echo "
<tr>
    <td><h3>$activiteiten_title</h3></td>
    <td>$categorie_naam</td>
    <td>$activiteiten_datum</td>
    <td>$activiteiten_kosten</td>
</tr>
    <td class='beschrijving' style='width:61%'>$small</td>
  \n";
}

?>

    </table>
    <br>
    <a class='inschrijven' href="inschrijven.php">Schrijf mij in!</a>
    
</div>
</body>
</html>