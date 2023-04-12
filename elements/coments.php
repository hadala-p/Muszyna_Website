<a id="komentarze"> </a>
      <section class="comments">
        <h2>Komentarze:</h2>
        <form action="elements/addcomment.php" method="post">
            <input type="text" placeholder="Dodaj komentarz..." name="comment" required>
            <button class="btn-com"><?php if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==true))
             echo "Dodaj komentarz";
              else
               echo "Zaloguj się aby dodać komentarz";
                ?></button>
        </form>
        <?php include 'elements/down_com.php'?>
      </section>