<?php
namespace models;

require_once "database.php";

class jidlo_model
{
    private $db;
    public function __construct()
    {
        $this->db = new database();
    }

public function pridat_jidlo()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nazev = $_POST["nazev"];
            $popis = $_POST["popis"];
            $cena = $_POST["cena"];
            $conn = $this->db->db_connect();
            if ($conn === false) {
                die("ERROR: Could not connect. " . $conn->connect_error);
            }
            $sql = "CALL pridat_jidlo(?, ?, ?)";
            $stmt = $conn->prepare($sql);
            if ($stmt === false) {
                die("ERROR: Could not prepare statement. " . $conn->error);
            }
            $stmt->bind_param('dss', $cena, $nazev, $popis);
            $stmt->execute();
            $stmt->close();
            header("Location: ../views/pridatjidlo.php");
            exit();
        }
    }

}

