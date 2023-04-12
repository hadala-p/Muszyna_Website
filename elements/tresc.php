<?php
        require_once "elements/connect.php";
        try
        {
            $polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
          $rezultat=@$polaczenie->query(sprintf("SELECT * FROM tresc WHERE miejsce='%s'",$location));
          $wiersz = mysqli_fetch_row($rezultat);
          $i=3;
          echo "<div id=\"date\"><i class=\"icon-calendar iconn\"></i>Post z dnia<p>$wiersz[36]</p></div>";
          if($wiersz[0]=="atrakcje")
          {
            echo "<a class=\"td-none\" href=\"atrakcje.php\"><div style=\"background-color: #facd3a; \" class=\"rodzaj\">atrakcje</div></a>";
          }
          if($wiersz[0]=="zabytki")
          {
            echo "<a class=\"td-none\" href=\"zabytki.php\"><div style=\"background-color: blueviolet;\" class=\"rodzaj\">zabytki</div></a>";
          }
          if($wiersz[0]=="pieszo")
          {
            echo "<a class=\"td-none\" href=\"szlaki_piesze.php\"><div style=\"background-color: #187701;\" class=\"rodzaj\">Wędrówki piesze</div></a>";
          }
          if($wiersz[0]=="rower")
          {
            echo "<a class=\"td-none\" href=\"szlaki_rowerowe.php\"><div style=\"background-color: rgb(6, 96, 199);\" class=\"rodzaj\">Szlaki rowerowe</div></a>";
          }
          echo "<div class=\"fly\"><a class=\"td-none\" href=\"#komentarze\"><i class=\"icon-down-open iconn\"></i>Przejdź do komentarzy</a></div>";
          echo "<div class=\"fly\"><a class=\"td-none\" href=\"#galeria\"><i class=\"icon-down-open iconn\"></i>Przejdź do galerii</a></div>";
          echo "<div class=\"tx\"><h1>$wiersz[$i]</h1>";
          while(($i)<25)
          { 
            $i++;
            if($wiersz[$i]=="")
                {
                    $i++;
                }
            else
            {
                echo "<br>";
                echo "<img src=\"img/$wiersz[$i]\" alt=\"$wiersz[3]\">";
                $i++;
            }
            if($wiersz[$i]!="")
            {
              echo "<div class=\"tresc\"><br>$wiersz[$i]</div>";
            }
          }
          echo "</div>";
          $i=27;
          echo "<a id=\"galeria\"> </a>";
          echo "<div class=\"row galeria\">
          <h2>Galeria zdjęć</h2>";
          while($i<36)
          {
            if($wiersz[$i]=="")
            {
                $i++; 
            }
            else
            {
                echo "<div class=\"col-md-6 col-xl-4\"><a href=\"img/$wiersz[$i]\" data-lightbox=\"my gallery\"><img src=\"img/$wiersz[$i]\" alt=\"$wiersz[27]\"></a></div>";
                $i++;
            }
            
          }
          echo "</div>";
            $polaczenie->close();
            echo "<h3>Inne atrakcje z tej kategorii:</h3><div class=\"row\">";
            $location=$wiersz[0];
            include 'elements/odwiedzane_tresc.php';
            echo "</div>";
        }
        catch(Exception $e)
        {
        echo '<span style="color:red;">Błąd servera! przepraszamy</span>';
        echo '<br />Informacja developerska:'.$e;
        }
        ?>