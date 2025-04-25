<?php
 session_start();

 if(!isset($_SESSION["user"])) {
  header("Location: login.php");
  exit();
 }

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel użytkowanika</title><a href="logout.php">Wyloguj się</a>
 </head>
 <body>
  <h2> Witaj, <?= htmlspecialchars($_SESSION["user"]) ?>!</h2>
  <p>Panel użytkowika</p>
 </body>
 </html>