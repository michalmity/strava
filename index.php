<?php require "views/header.php"; ?>
<?php if (isset($_SESSION["user_id"])): ?>
    <h1>Vyberte si stravu</h1>
    <div>
        <div>
            <div>
                <a href="views/pridatjidlo.php">
                    <button type="button" class="btn btn-primary">Přidat jídlo</button>
                </a>
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
<div class="container" id="container">
    <div class="form-container" id="form-container">
        <div class="form" id="form-login">
            <h2>Přihlášení</h2>
            <form action="../controllers/user_controller.php" method="post">
                <input type="hidden" name="action" value="login">
                <label for="email">Email:</label><br>
                <input type="email" id="email_login" name="email" required><br>
                <label for="heslo">Heslo:</label><br>
                <input type="password" id="heslo_login" name="heslo" required><br><br>
                <button type="submit" class="button-submit">Login</button>
            </form>
            <p>Nemáš účet? <a id="show-register">Zaregistrovat se</a></p>
        </div>
        <div class="form" id="form-register" style="display: none;">
            <h2>Registrace</h2>
            <form action="../controllers/user_controller.php" method="post">
                <input type="hidden" name="action" value="register">
                <div class="input-group-two">
                    <div style="margin-right: 5px">
                        <label for="jmeno">Jméno:</label><br>
                        <input class="input-half" type="text" id="jmeno" name="jmeno" required><br>
                    </div>
                    <div>
                        <label for="prijmeni">Příjmení:</label><br>
                        <input class="input-half" type="text" id="prijmeni" name="prijmeni" required><br>
                    </div>
                </div>
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
                <button class="button-submit" type="submit">Register</button>
            </form>
            <p>Máš účet? <a id="show-login">Přihlásit se</a></p>
        </div>
    </div>
    <?php endif; ?>
    <?php require "views/footer.php" ?>

    <script>
        function adjustContainerHeight() {
            const container = document.getElementById('container');
            const formLogin = document.getElementById('form-login');
            const formRegister = document.getElementById('form-register');

            if (formLogin.style.display === 'none') {
                container.style.height = `${formRegister.scrollHeight}px`;
            } else {
                container.style.height = `${formLogin.scrollHeight}px`;
            }
        }

        document.getElementById('show-register').addEventListener('click', function() {
            document.getElementById('form-login').style.display = 'none';
            document.getElementById('form-register').style.display = 'block';
            adjustContainerHeight();
        });

        document.getElementById('show-login').addEventListener('click', function() {
            document.getElementById('form-register').style.display = 'none';
            document.getElementById('form-login').style.display = 'block';
            adjustContainerHeight();
        });

        window.addEventListener('load', adjustContainerHeight);
    </script>
