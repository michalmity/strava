<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<?php session_start(); if (isset($_SESSION["user_id"])): ?>
<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-4">STRAVA</span>
        </a>
        <ul class="nav nav-pills">
            <?php
            echo '<a href="views/profile.php" ><button type="button" class="btn btn-primary">Profile</button></a>';
            #odspacovaní buttonu:
            echo '&nbsp;';
            echo '
                <form action="../controllers/user_controller.php" method="post"> 
                    <input type="hidden" name="action" value="logout">
                    <button class="btn btn-primary" value="action">Logout</button>
                </form>';
            ?>
        </ul>
    </header>
</div>
<?php endif; ?>
