<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrace</title>
</head>
<body>
<center>
    <header><a href="nabyt_penezenku.php">Nabýt peněženku</a></header>
    <h1>Registrace</h1>
    <form method="post" action="../php/registrace.php">
        Jméno<br><input type="text" name="jmeno"><br>
        Příjmení<br><input type="text" name="prijmeni"><br>
        Email<br><input type="email" name="email"><br>
        Heslo<br><input type="password" name="heslo"><br>
        Datum narození<br><input type="date" name="datumnarozeni"><br><br>
        Role<br><select name="role" >
            <?php
            $conn = new mysqli("localhost", "root", "", "strava");
            $sql = "SELECT * FROM role";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["id_role"] . "'>" . $row["nazev"] . "</option>";
            }
            $conn->close();
            ?>
        </select><br><br>
        <button type="submit" value="Registrovat">Register</button><br><br>
        <button type="button">Login</button>
    </form>
</center>
</body>
</html>
