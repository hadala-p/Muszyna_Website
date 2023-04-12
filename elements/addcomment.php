<?php session_start();
$user=$_SESSION['user'];
$location=$_SESSION['location'];
$date=date('d-m-Y');
$czas=date("H:i");
$comment = $_POST['comment'];
require_once "connect.php";
//sprawdzanie wprowadzonych znaków do komentarza
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$comment = test_input($_POST["comment"]);
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==true))
{
    try
    {
        $polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
        if($polaczenie -> connect_errno)
        {
            throw new Exception(mysqli_connect_errno());
        }
        if($polaczenie->query("INSERT INTO komentarze VALUES (NULL,'$location','$user','$comment','$date','$czas')"))
        {
            header("Location: ../$location.php#komentarze");
        }
        else
        {
            throw new Exception($polaczenie->error);
        }

        $polaczenie->close();
    }
    catch(Exception $e)
    {
    echo '<span style="color:red;">Błąd servera! przepraszamy</span>';
    echo '<br />Informacja developerska:'.$e;
    }
}
else
{
    header("Location: ../$location.php#komentarze");
}
?>