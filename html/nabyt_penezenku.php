<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nabýt peněženku</title>
</head>
<body>
<center>
    <header><a href="index.php">Registrace</a></header>
    <h1>Nabýt peněženku</h1>
    <form action="../php/penezenka.php" method="post">
        Strávník <select name="id_penezenka">
            <?php
            $conn = new mysqli("localhost", "root", "", "strava");
            $sql = "SELECT * FROM stravnik";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["id_stravnik"] . "'>" . $row["jmeno"] . " " . $row["prijmeni"] . "</option>";
            }
            $conn->close();
            ?>
        </select>
        <br><br>
        Částka <input type="number" name="castka" min="70" step="70"><br><br>
        <button type="submit" value="Nabýt peněženku">Nabýt peněženku</button><br><br>
    </form>

</body>
</html>