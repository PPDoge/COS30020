<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

        // English days of the week
    $days = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

        // Display the days in English
    echo "The Days of the week in English are: ";
    foreach ($days as $day) {
        echo $day . ", ";
    }
    echo "<br>"; 

        // Reassign the days with French translations
    $days = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");

        // Display the days in French
    echo "The days of the week in French are: ";
    foreach ($days as $day) {
        echo $day . ", ";
    }
    echo "<br>"; 

    ?>
</body>

</html>