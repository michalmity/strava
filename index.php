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
    <?php if (isset($_SESSION['user_id'])): ?>
        <a href="../controllers/user_controller.php?action=logout">Odhlásit</a>
    <?php else: ?>
        <h1>Login</h1>
        <form action="../controllers/user_controller.php" method="post">
            <input type="hidden" name="action" value="login">
            <label for="email">Email:</label><br>
            <input type="email" id="email_login" name="email" required><br>
            <label for="heslo">Heslo:</label><br>
            <input type="password" id="heslo_login" name="heslo" required><br><br>
            <input type="submit" value="Přihlásit">
        </form>
        <h1>Registrace</h1>
        <form action="../controllers/user_controller.php" method="post">
            <input type="hidden" name="action" value="register">
            <label for="jmeno">Jméno:</label><br>
            <input type="text" id="jmeno" name="jmeno" required><br>
            <label for="prijmeni">Příjmení:</label><br>
            <input type="text" id="prijmeni" name="prijmeni" required><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email_register" name="email" required><br>
            <label for="heslo">Heslo:</label><br>
            <input type="password" id="heslo_register" name="heslo" required><br>
            <label for="datumnarozeni">Datum narození:</label><br>
            <input type="date" id="datumnarozeni" name="datumnarozeni" required><br>
            <label for="role">Role:</label><br>
            <select id="role" name="role">
                <?php
                require "models/user_model.php";
                $user_model = new \models\user_model();
                $result = $user_model->fetch_roles();
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id_role"] . "'>" . $row["nazev"] . "</option>";
                }
                ?>
            </select><br><br>
            <input type="submit" value="Registrovat">
        </form>
    <?php endif; ?>
</center>
</body>
</html>
