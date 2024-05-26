<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrace</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/master.css">
</head>
<body>
<?php session_start();
if (isset($_SESSION["user_id"])): ?>
    <header class="navbar">
        <div class="navbar-left">
            <a href="#" class="navbar-brand">Strava</a>
        </div>
        <div class="navbar-right">
            <button class="btn-header">
                <i class="bi bi-person-fill"> </i><?php echo $_SESSION["user_name"]; ?>
            </button>
            <form action="../controllers/user_controller.php" method="post">
                <input type="hidden" name="action" value="logout">
                <button type="submit" class="btn-header">
                    <i class="bi bi-door-open-fill"></i>
                </button>
            </form>
        </div>
    </header>
<?php endif; ?>
