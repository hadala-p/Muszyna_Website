<?php
    require_once "elements/connect.php";
    $location=$_SESSION['location'];
    $zmienna;
    try
    {
        $polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
        $rezultat = @$polaczenie->query(sprintf("SELECT * FROM tresc WHERE Miejsce='%s'",$location));
        $wiersz = mysqli_fetch_row($rezultat);
        $wiersz[37]=$wiersz[37]+1;
        $sql = "UPDATE tresc SET licznik=$wiersz[37] WHERE id=$wiersz[1]";

        if ($polaczenie->query($sql) === TRUE)
        {echo "Odwiedzeń strony: $wiersz[37]";;} 
        else
        {echo "Error updating record: " . $polaczenie->error;}
        $polaczenie->close();
    }
    catch(Exception $e)
    {
    echo '<span style="color:red;">Błąd servera! przepraszamy</span>';
    echo '<br />Informacja developerska:'.$e;
    } 
?>