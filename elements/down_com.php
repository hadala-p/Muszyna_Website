<?php
        require_once "elements/connect.php";
        try
        {
            $polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
$rezultat = @$polaczenie->query(sprintf("SELECT * FROM komentarze WHERE id_a='%s' ORDER BY `komentarze`.`id` DESC",$location));
while ($wiersz = mysqli_fetch_row($rezultat)) 
 {
  echo "<div class=\"com\"><div class=\"c_info\"><img src=\"img/img_avatar2.png\" alt=\"Profile\"><span style=\"font-size:17px; margin-left: 4%;\">$wiersz[2]</span>
  <span style=\"font-size:12px;\"><br><i class=\"icon-calendar\"></i> $wiersz[4]<br><i class=\"icon-clock\"></i> $wiersz[5]</span></div><div class=\"comm\">
  <span style=\"color:red;\"></span >$wiersz[3] </div></div>";
 }
    
            $polaczenie->close();
        }
        catch(Exception $e)
        {
        echo '<span style="color:red;">Błąd servera! przepraszamy</span>';
        echo '<br />Informacja developerska:'.$e;
        } 
        ?>