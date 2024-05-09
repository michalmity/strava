<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_penezenka = $_POST["id_penezenka"];
    $castka = $_POST["castka"];
    $conn = new mysqli("localhost", "root", "", "strava");
    $sql = "CALL nabyti_penezenky('$id_penezenka', '$castka')";
    $conn->query($sql);
    $conn->close();
    header("Location:../html/nabyt_penezenku.php");
}
?>