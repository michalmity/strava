<?php require "views/header.php"; ?>
<center>
    <?php if (isset($_SESSION["user_id"])): ?>
    <h1>Vyberte si stravu</h1>
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <a href="views/pridatjidlo.php"><button type="button" class="btn btn-primary">Přidat jídlo</button></a>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-primary">Objednat jídlo</button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-primary">Nabýt peněženku</button>
                </div>
            </div>
        </div>
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
<?php require "views/footer.php" ?>
