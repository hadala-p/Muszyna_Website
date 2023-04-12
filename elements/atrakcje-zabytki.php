<?php
        require_once "elements/connect.php";
        try
        {
            $polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
            $rezultat = @$polaczenie->query(sprintf("SELECT * FROM tresc WHERE rodzaj='$location' ORDER BY `tresc`.`id` DESC",$location));
            while ($wiersz = mysqli_fetch_row($rezultat)) 
            {
               echo "<a style=\"text-decoration: none; color:white\" href=\"$wiersz[2].php\"><div class=\"ramka row\"><h2>$wiersz[3]</h2><div class=\"col-sm-12 col-lg-4\"><img src=\"img/$wiersz[4]\" alt=\"Ogrody miłości\"></div>
               <div class=\"col-sm-12 col-lg-8\">$wiersz[5]</div></div></a>";
            }
    
            $polaczenie->close();
        }
        catch(Exception $e)
        {
        echo '<span style="color:red;">Błąd servera! przepraszamy</span>';
        echo '<br />Informacja developerska:'.$e;
        } 
        ?>