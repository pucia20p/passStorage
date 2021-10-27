<!DOCTYPE html>
<html>
    <head>
        <style>
            body{
                transition-duration: 1s;
            }
            tr{
                cursor: pointer;
            }
            td{
                width: 200px;
                font-size: 20px;
                color: black;
                margin: 5px;
            }
            td[onclick='uwu(this)']{
                background-color: black;
            }
        </style>
    </head>
    <body>
        <script>
            function uwu(that){
                that.style.backgroundColor = "rgba(255,255,255,0)"
            }
        </script>
    </body>
</html>
<?php
/*
drop database if exists toUse;
create database toUse;
use toUse
create table main(
    id int primary key auto_increment,
    platforma text,
    username text,
    pass text
);
create table log(
    hasla text
);
*/
session_start();
if($_POST['base'] != null)
    $_SESSION['baza'] = $_POST['base'];

//$_SESSION['baza'] = 'example';

$true = false;
$connect = mysqli_connect("localhost","root","",$_SESSION['baza']);
$zapper = "SELECT * FROM log";
$wyn = mysqli_query($connect,$zapper);
$ilosc = mysqli_num_rows($wyn);

if($_POST['security']!=null)
    $_SESSION['security'] = $_POST['security'];

//$_SESSION['security'] = 'example';

while($ilosc = mysqli_fetch_row($wyn)){
    if($ilosc[0]==$_SESSION['security'])
        $true = true;
}
if($true){
    $zap = "SELECT * FROM main";
    $wyniki = mysqli_query($connect,$zap);
    $ile = mysqli_num_rows($wyniki);
    echo "Btw żeby sprawdzić login naciśnij na czarne pole a żeby skopiować hasło do schowka naciśnij na platformę ;-)<table border='5px'>";
    echo "<tr><td>platforma</td><td>login</td></tr>";
    while($ile = mysqli_fetch_row($wyniki)){
        echo "<tr><td onclick='navigator.clipboard.writeText(\"".$ile[3]."\")'>".$ile[1]."</td><td onclick='uwu(this)'>".$ile[2]."</td></tr>";
    }

    echo "</table>";
    echo '<form method="POST" action="hasela2.php"><b>dodawańsko</b> typ: <input type="text" name="typ"><br>login: <input type="text" name="login"><br>hasło: <input type="password" name="haslo"><br><input type="submit" value="submit"></form>';


    echo '<br>Dodaj nowe hasło do systemu (nie bazy):<br><form method="POST" action="hasela3.php"><input type="text" name="hasloNew"><br><input type="submit" value="submit"></form>';

} else 
    echo "zaloguj się"; 
?>