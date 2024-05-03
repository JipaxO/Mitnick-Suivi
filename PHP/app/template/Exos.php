<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP EXOS</title>
</head>
<h1>Exos PHP</h1>

<h2> 1.1 Clean your room Exercise</h2>

<body>
    <?php


    $room_is_filthy = true;

    if ($room_is_filthy) {
        echo "Yuk, Room is dirty : let's clean it up !";
        cleanup_room();
        echo "<br>Room is now clean!";
        $room_is_filthy = false;
    } else {
        echo "<br>Nothing to do, room is neat.";
    }

    function cleanup_room()
    {
        echo ("<br>Nettoyage en cours");
    }

    ?>

    <h2>1.2 Clean your room Exercise, improved</h2>

    <?php
    $possible_states = [false, true, false];

    $room_filthiness = $possible_states[1];

    if (!$room_filthiness) {
        echo "Yuk, Room is Disgusting! Let's clean it up !";
    } else if (!$room_filthiness) {
        echo "Yuk, Room is dirty : let's clean it up !";
        // ...
    } else {
        echo "Nothing to do, room is neat.";
    }
    ?>

    <h2> 2. "Different greetings according to time" Exercise</h2>

    <?php

    $now = new DateTime();

    if ($now > new DateTime('05:00:00') && $now < new DateTime('09:00:00')) {
        echo ("good morning !");
    } elseif ($now > new DateTime('09:01:00') && $now < new DateTime('12:00:00')) {
        echo ('good day !');
    } elseif ($now > new DateTime('12:01:00') && $now < new DateTime('16:00:00')) {
        echo ('good afternoon !');
    } elseif ($now > new DateTime('16:01:00') && $now < new DateTime('21:00:00')) {
        echo ('good evening !');
    } elseif ($now > new DateTime('21:01:00') || $now < new DateTime('04:59:00')) {
        echo ('good night !');
    }
    ?>

    <h2> 3. "Different greetings according to age" Exercise </h2>

    <?php
    if (isset($_GET['age']) && isset($_GET['gender'])) {

        $Date = new DateTime();
        $age = new DateTime($_GET['age']);

        if ($age > $Date) {
            echo ('heeeeeeeeeeeeeeey NO');
        } else {
            $diff = $Date->diff($age)->y;

            if ($diff < 12) {
                echo ("Hello kiddo");
            } elseif ($diff >= 12 && $diff < 18) {
                echo ("Hello Teenager !");
            } elseif ($diff >= 18 && $diff < 115) {
                echo ("Hello Adult !");
            } elseif ($diff >= 115) {
                echo ("Wow! Still alive ? Are you a robot, like me ? Can I hug you ?");
            }
        }
    }

    ?>


    <form method="get" action="#">
        <br>
        <div>
            <label for="gender">Genre :</label><br>
            <input type="radio" name="gender" id="man" value="Man"><label for="man">Homme</label>
            <input type="radio" name="gender" id="women" value="women"><label for="women">Femme</label>
        </div>
        <br>
        <div>
            <label for="age">Date de naissance :</label><br>
            <input type="date" name="age">
        </div>
        <br>
        <input type="submit" name="submit" value="Greet me now">
    </form>




</body>

</html>