<?php session_start();
require_once "connect.php";
$i=5;
$id = $_POST['id'];
$tresc1 = $_POST['tresc1'];


    try
    {
        $polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
        if($polaczenie -> connect_errno)
        {
            throw new Exception(mysqli_connect_errno());
        }
        $resolut=@$polaczenie->query(sprintf("SHOW COLUMNS FROM `tresc`"));
        $i=0;
        while($row = mysqli_fetch_array($resolut)){
            $tab1[$i] = $row['Field'];
            $i++;
        }
        if($polaczenie->query("UPDATE tresc SET `$tab1[0]`='$_POST[rodzaj]',`$tab1[2]`='$_POST[Miejsce]',
        `$tab1[3]`='$_POST[naglowek]',
        `$tab1[4]`='$_POST[naglowek_img]',
        `$tab1[5]`='$_POST[tresc1]',
        `$tab1[6]`='$_POST[img1]',
        `$tab1[7]`='$_POST[tresc2]',
        `$tab1[8]`='$_POST[img2]',`$tab1[9]`='$_POST[tresc3]',`$tab1[10]`='$_POST[img3]',`$tab1[11]`='$_POST[tresc4]',
        `$tab1[12]`='$_POST[img4]',`$tab1[13]`='$_POST[tresc5]',`$tab1[14]`='$_POST[img5]',
        `$tab1[15]`='$_POST[tresc6]',`$tab1[16]`='$_POST[img6]',`$tab1[17]`='$_POST[tresc7]',`$tab1[18]`='$_POST[img7]',
        `$tab1[19]`='$_POST[tresc8]',`$tab1[20]`='$_POST[img8]',`$tab1[21]`='$_POST[tresc9]',`$tab1[22]`='$_POST[img9]',
        `$tab1[23]`='$_POST[tresc_wolna1]',`$tab1[24]`='$_POST[tresc_wolna2]',`$tab1[25]`='$_POST[tresc_wolna3]',`$tab1[26]`='$_POST[tresc_wolna4]',
        `$tab1[27]`='$_POST[g_img_1]',`$tab1[28]`='$_POST[g_img_2]',`$tab1[29]`='$_POST[g_img_3]',`$tab1[30]`='$_POST[g_img_4]',
        `$tab1[31]`='$_POST[g_img_5]',`$tab1[32]`='$_POST[g_img_6]',`$tab1[33]`='$_POST[g_img_7]',`$tab1[34]`='$_POST[g_img_8]',
        `$tab1[35]`='$_POST[g_img_9]',`$tab1[36]`='$_POST[data]',`$tab1[37]`='$_POST[licznik]' WHERE Id='$id'"))
        {
            header("Location: ../atrakcje.php");
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
?>

