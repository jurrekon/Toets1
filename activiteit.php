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

$titel = $beschrijving = $datum = $categorie = $kosten = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (!empty($_POST["titel"])) {
       
       $titel = $_POST["titel"];
       $titel = mysqli_real_escape_string($connection,$titel);
   }
   if (!empty($_POST["beschrijving"])) {

       $beschrijving = $_POST["beschrijving"];
       $beschrijving = mysqli_real_escape_string($connection,$beschrijving);
   }
   
  if (!empty($_POST["datum"])) {
    
       $datum = $_POST["datum"];
      $datum = mysqli_real_escape_string($connection,$datum);
  }
   
   if (!empty($_POST["categorie"])) {

       $categorie = $_POST["categorie"];
       $categorie = mysqli_real_escape_string($connection,$categorie); 
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
<h2>Voeg een aciviteit toe.</h2>
<form id="myform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   <p class="form">
    Titel: <input class="titel" type="text" name="titel" value="">

   <br><br>
   Beschrijving: <textarea class="beschrijving" name="beschrijving" rows="5" cols="40"></textarea>

   <br><br>
   Datum: <input class="datum" type="datetime-local" name="datum" value="">

    <br><br>
   Categorie: <select class="activiteit" name="categorie">
    <option disabled selected> -- select an option -- </option>
  <option value="1">Sport</option>
  <option value="2">Cultuur</option>
  <option value="3">Politiek</option>
  <option value="4">Vrijwilligerswerk</option>
</select>
       
    <br><br>
   Kosten: <input class="kosten" type="number" name="kosten" value="">
       
   <br><br>
   <input type="submit" name="submit" value="Submit"> 
       </p>
</form>

<?php
     if (isset($_POST['submit'])){

$required = array('titel', 'beschrijving', 'datum', 'categorie');

$error = false;
foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}
if ($error) {
  echo "Nog niet alle velden zijn ingevuld";
} else {
    
$sql = "INSERT INTO activiteiten (titel, beschrijving, datum, categorie, kosten)
VALUES ('$titel', '$beschrijving', '$datum', '$categorie', '$kosten')";
    echo "Activiteit toegevoegt!";
    
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