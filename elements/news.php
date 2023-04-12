<?php
        require_once "elements/connect.php";
        try
        {
            $polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
$rezultat = @$polaczenie->query(sprintf("SELECT * FROM `tresc` WHERE `rodzaj`!='historia' ORDER BY `data` DESC LIMIT 3"));
$i=1;
while ($wiersz = mysqli_fetch_row($rezultat)) 
 {
  echo "<div class=\"top_view_ramka col-md-4\"><a href=\"$wiersz[2].php\"><em style=\"color: yellow\">Numer:$i</em><br><p style=\"font-size:10px;\">Data dodania:$wiersz[36]</p><img class=\"zdjecie\" src=\"img/$wiersz[4]\" alt=\"$wiersz[3]\">$wiersz[3]</a></div>";
  $i=$i+1;
 }
    
            $polaczenie->close();
        }
        catch(Exception $e)
        {
        echo '<span style="color:red;">Błąd servera! przepraszamy</span>';
        echo '<br />Informacja developerska:'.$e;
        } 
        ?>