<?php require "../views/header.php"?>
<center>
    <form action="../controllers/jidlo_controller.php" method="post">
        <input type="hidden" name="action" value="pridatjidlo">
        <label for="nazev">Název:</label><br>
        <input type="text" id="nazev" name="nazev" required><br>
        <label for="popis">Popis:</label><br>
        <textarea id="popis" name="popis"></textarea><br>
        <label for="cena">Cena:</label><br>
        <input type="number" id="cena" name="cena" required><br><br>
        <button type="submit" class="btn btn-primary">Přidat jídlo</button>
    </form>
</center>










<?php require "../views/footer.php"?>

