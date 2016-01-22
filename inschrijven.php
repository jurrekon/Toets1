<!DOCTYPE HTML>

<html>
<head>
    <title>Inschrijving</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>

    <script>
(function($,W,D)
{
    var JQUERY4U = {};
    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#myform").validate({
                rules: {
                    autor: "required",
                    title: {
                        required: true,
                    minlength: 10
                    },
                    url: {
                        required: true,
                        url: true
                    },
                    summary: {
                        required: true,
                        minlength: 100
                    },
                },
                messages: {
                    autor: "Please enter the author",
                    title: {
                        required: "Please provide a title",
                        minlength: "Your title must be at least 10 characters long"
                    },
                    url: {
                        required: "Please provide a url",
                        url: "please give a valid url"
                    },
                    summary: {
                        required: "Please provide a summary",
                        minlength: "The summary must be aleast 100 characters long"
                    },
                  
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }
    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
})(jQuery, window, document);
    
    </script>
</head>

<body>

<div id="content">
<?php
  $connection = mysqli_connect('localhost', 'root');
	
  mysqli_select_db($connection, 'phptoets');
// define variables and set to empty values

$voornaam = $achternaam = $telefoon = $adres = $email = $activiteit_id = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (!empty($_POST["voornaam"])) {
       
       $voornaam = $_POST["voornaam"];
       $voornaam = mysqli_real_escape_string($connection,$voornaam);
   }
   if (!empty($_POST["achternaam"])) {

       $achternaam = $_POST["achternaam"];
       $achternaam = mysqli_real_escape_string($connection,$achternaam);
   }
   
  if (!empty($_POST["telefoon"])) {
    
       $telefoon = $_POST["telefoon"];
      $telefoon = mysqli_real_escape_string($connection,$telefoon);
  }
   
   if (!empty($_POST["adres"])) {

       $adres = $_POST["adres"];
       $adres = mysqli_real_escape_string($connection,$adres); 
   }
    
    if (!empty($_POST["email"])) {

       $email = $_POST["email"];
       $email = mysqli_real_escape_string($connection,$email); 
   }
    
    if (!empty($_POST["activiteit_id"])) {

       $activiteit_id = $_POST["activiteit_id"];
       $activiteit_id = mysqli_real_escape_string($connection,$activiteit_id); 
   }
}
?>
    
<div class="menu">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="inschrijvingen.php">Alle inschrijvingen</a></li>
        <li><a href="inschrijven.php">Inschrijven</a></li>
        <li><a href="activiteit.php">Nieuwe activiteiten</a></li>
    </ul>
</div>
    
    <div class="content">
<h2>Schrijf u hier in.</h2>
<form id="myform" method="post" novalidate="novalidate" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   <p class="form">
    Voornaam: <input class="voornaam" type="text" name="voornaam" value="">

   <br><br>
   Achternaam: <input class="achternaam" type="text" name="achternaam" value="">

   <br><br>
   Telefoon: <input class="telefoon" type="tel" name="telefoon" value="">

   <br><br>
   Adres: <input class="adres" type="text" name="adres" value="">

    <br><br>
   E-mail: <input class="email" type="email" name="email" value="">
 
     <br><br>
    Activiteit: <select class="inschrijving" name='activiteit'>
       <option disabled selected> -- select an option -- </option>
       
       <?php
$query = "SELECT * FROM activiteiten";
       
$result = mysqli_query($connection, $query);
 
while ($row = mysqli_fetch_assoc($result))
{
    $activiteiten_id = $row["id"];
    $activiteiten_titel = $row["titel"];
    $activiteiten_beschrijving = $row["beschrijving"];
    $activiteiten_datum = $row["datum"];
    $activiteiten_categorie = $row["categorie"];
    $activiteiten_kosten = $row["kosten"];

echo "
    
    <option value='$activiteiten_id'>$activiteiten_titel</option>

\n";
}
       ?>
       </select>
   <br><br>
   <input type="submit" name="submit" value="Submit"> 
       </p>
</form>

<?php
     if (isset($_POST['submit'])){

$required = array('voornaam', 'achternaam', 'telefoon', 'adres', 'email');

$error = false;
foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}
if ($error) {
  echo "Nog niet alle velden zijn ingevuld";
} else {
    
$sql = "INSERT INTO persooninschrijving (voornaam, achternaam, telefoon, adres, email, activiteit_id)
VALUES ('".$_POST['voornaam']."', '".$_POST['achternaam']."', '".$_POST['telefoon']."', '".$_POST['adres']."', '".$_POST['email']."', '".$_POST['activiteit']."')";
    echo "Inschrijving voltooid!";
    
    if ($connection->query($sql) === TRUE) {

} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}

}
     }
?>
</div>
</body>
</html>

</div>
</body>
</html>