<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $jmeno = $_POST["jmeno"];
        $prijmeni = $_POST["prijmeni"];
        $email = $_POST["email"];
        $heslo = $_POST["heslo"];
        $datumnarozeni = $_POST["datumnarozeni"];
        $role = $_POST["role"];
        $conn = new mysqli("localhost", "root", "", "strava");
        $sql = "CALL pridat_uzivatele('$jmeno', '$prijmeni', '$email', '$heslo', '$datumnarozeni',1)";
        $conn->query($sql);
        $conn->close();
        header("Location:../html/index.php");
    }
?>
