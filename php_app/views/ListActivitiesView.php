<?php
if (!isset($_SESSION['id']) or $_SESSION['id'] === "") {
    header("Location: /m3104_13/index.php?page=user_connect_form");
}
$activities = $_SESSION['activity'];
?>

<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="ressources/css/style.css"/>
        <title>Dashboard</title>
    </head>

    <body>

        <h1>
            Welcome to your SportTrack dashbord !
        </h1>

        <br>

        <table>
            <tr>
                <th>Date</th>
                <th>Description</th>
                <th>Start</th>
                <th>Duration</th>
                <th>Distance (m)</th>
                <th>Minimum cardio frequency (bpm)</th>
                <th>Maximum cardio frequency (bpm)</th>
                <th>Average cardio frequency (bpm)</th>
            </tr>
            <?php
                foreach ($activities as $activity) {
                    $htmlCode = "<tr><td>".$activity['date']."</td><td>".$activity['description']."</td><td>".$activity['debut']."</td><td>".$activity['duree']."</td><td>".$activity['distance']."</td><td>".$activity['cardioMin']."</td><td>".$activity['cardioMax']."</td><td>".$activity['cardioMoy']."</td></tr>";
                    echo($htmlCode);
                }
            ?>
        </table>

        <br>
        <br>
        <br>

        <input type=button onclick="document.location.href='/m3104_13/index.php?page=upload_activity_form'"; value="Upload new Activity"/>

        <input type=button onclick="document.location.href='/m3104_13/index.php?page=user_disconnect'"; value="Disconnect"/>
    </body>

</html>