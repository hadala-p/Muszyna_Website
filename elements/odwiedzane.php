<?php
        require_once "elements/connect.php";
        try
        {
            $polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
$rezultat = @$polaczenie->query(sprintf("SELECT * FROM tresc WHERE rodzaj='%s' ORDER BY `licznik` DESC LIMIT 3",$location));
$i=1;
while ($wiersz = mysqli_fetch_row($rezultat)) 
 {
  echo "<div class=\"top_view_ramka col-md-4\"><a href=\"$wiersz[2].php\"><em>Numer:$i</em><br><p style=\"font-size:10px;\">Odwiedzeń strony:$wiersz[37]</p><img class=\"zdjecie\" src=\"img/$wiersz[4]\" alt=\"$wiersz[3]\">$wiersz[3]</a></div>";
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