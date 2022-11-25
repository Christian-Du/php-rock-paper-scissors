<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Schere, Stein, Papier</title>
   <!--  <link rel="stylesheet" href="00style.css"> -->
    <style>
    body{
        color: rgba(79,218,124,255);
        background-color: rgba(255, 255, 255, 0);
        height: 100%;
        margin: auto;
        text-align: center;
    }
    table{
        align: center;
        margin: auto;
    }

    </style>
    <?php
    /*
    // zur Anzeige von Fehlern
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    */
    $computer_display = 'X';
    $rps_display = "Du hast noch nicht geklickt";
    $arr = array ('Schere', 'Stein' , 'Papier');

    function Is_Win($player, $computer){
        /* r > s ; p > r ; s > p */
        if ($player == $computer){
            return "unentschieden!";
        } elseif (($player == 'Stein' && $computer == 'Schere')
        || ($player == 'Papier' && $computer == 'Stein')
        || ($player == 'Schere' && $computer == 'Papier')){
            return "Du hast gewonnen!";
        } else {
            return "Du hast verloren!";
        }
    }

    function SetCompPic($computer){
        GLOBAL $computer_display;
        if($computer == "Schere"){
            $computer_display = '&#9996;';
        } elseif ($computer == 'Stein'){
            $computer_display = '&#9994;';
        } elseif ($computer == "Papier"){
            $computer_display = '&#9995;';
        } else {
            $computer_display = 'X';
        }
    }
    function Play($user_choice){
        Global $rps_display;
        Global $arr;
        shuffle($arr);
        $is_win = Is_Win($user_choice, $arr[0]);
        SetCompPic($arr[0]);
        $rps_display = "Du hast Schere geklickt!
        Und der Computer hat $arr[0] gewählt.
        $is_win";
    }
            
    if (isset($_POST['Schere'])){
        Play('Schere');
        }
    if (isset($_POST['Stein'])){
        Play('Stein');
        }
    if (isset($_POST['Papier'])){
        Play('Papier');
        }
    
    ?>
</head>
    <body>
        <!-- <p><?php echo $rps_display; ?></p> -->    
        <form method="post">

        <table>
            <tr>
                
                <td colspan="3"><?php echo $rps_display; ?></td>
                
            </tr>
            <tr>
                <td></td>
                <td><input style="height: 190px; width: 190px; font-size: 150px" type="label" name="computer" value="<?php echo"$computer_display";?>"></td>
                <td></td>
            </tr>
            <tr>
                <td><input style="height: 200px; width: 200px; font-size: 150px" type="submit" name="Schere" value="&#9996;"></td>
                <td><input style="height: 200px; width: 200px; font-size: 150px" type="submit" name="Stein" value="&#9994;"></td>
                <td><input style="height: 200px; width: 200px; font-size: 150px" type="submit" name="Papier" value="&#9995;"></td>
            </tr>
        </table>
        </form><br>
    </body>
</html>