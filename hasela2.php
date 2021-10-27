<?php
ob_start();
session_start();
$true=false;
$connect = mysqli_connect("localhost","root","",$_SESSION['baza']);
$zapper = "SELECT * FROM log";
$wyn = mysqli_query($connect,$zapper);
$ilosc = mysqli_num_rows($wyn);

while($ilosc = mysqli_fetch_row($wyn))
    if($_SESSION['security']==$ilosc[0])
        $true = true;

if($true){
    echo "<form method='POST' action='hasela.php'><input type='submit' value='powrot'></form>";

    $zap = "insert into main values ('','".$_POST["typ"]."','".$_POST["login"]."','".$_POST["haslo"]."')";

    if(mysqli_query($connect,$zap)){
        echo "dodane.";
    } else {
        echo "ERROR: Nie udało się wykonać $zap. " . mysqli_error($connect);
    }
    header('refresh: 5, url=hasela.php');
} else{
    echo 'how did you get here?';
    header('refresh: 5, url=login.php');
}
?>