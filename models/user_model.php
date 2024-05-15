<?php
namespace models;

require_once "database.php";

class user_model {
    private $db;

    public function __construct() {
        $this->db = new database();
    }

    public function fetch_roles() {
        $conn = $this->db->db_connect();
        $sql = "SELECT * FROM role";
        return $conn->query($sql);
    }

    public function register() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $jmeno = $_POST["jmeno"];
            $prijmeni = $_POST["prijmeni"];
            $email = $_POST["email"];
            $heslo = $_POST["heslo"];
            $datumnarozeni = $_POST["datumnarozeni"];
            $role = $_POST["role"];
            $heslo = password_hash($heslo, PASSWORD_DEFAULT);
            $conn = $this->db->db_connect();
            if ($conn === false) {
                die("ERROR: Could not connect. " . $conn->connect_error);
            }

            $sql = "CALL pridat_uzivatele(?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            if ($stmt === false) {
                die("ERROR: Could not prepare statement. " . $conn->error);
            }

            $stmt->bind_param('sssssi', $jmeno, $prijmeni, $email, $heslo, $datumnarozeni, $role);
            $stmt->execute();
            $stmt->close();

            header("Location: ../index.php");
            exit();
        }
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"] ?? '';
            $heslo_in = $_POST["heslo"] ?? '';

            $conn = $this->db->db_connect();
            if ($conn === false) {
                die("CHYBA: Nepodařilo se připojit. " . $conn->connect_error);
            }

            $sql = "SELECT id_stravnik, heslo FROM stravnik WHERE email = ?";
            $stmt = $conn->prepare($sql);
            if ($stmt === false) {
                die("CHYBA: Nepodařilo se připravit dotaz. " . $conn->error);
            }

            $stmt->bind_param('s', $email);
            $stmt->execute();
            $stmt->bind_result($id, $hashed_password);
            $stmt->fetch();


            if (password_verify($heslo_in, $hashed_password))
            {
                // Přihlášení úspěšné
                session_start();
                $_SESSION['user_id'] = $id;
                header("Location: /index.php");
            }
            else
            {
                // Přihlášení selhalo
                header("Location: /index.php?error=invalid_credentials" . $id . $hashed_password);
            }

            $stmt->close();
            exit();
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: ../index.php");
        exit();
    }
}
?>
