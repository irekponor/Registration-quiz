<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location: login-user.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>quiz</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css" type="text/css">
    <script src="https://kit.fontawesome.com/de8e2530fe.js" crossorigin="anonymous"></script>


    <!-- Favicons -->
    <link rel="shortcut icon" href="Images/logo.jpg">
    <link rel="apple-touch-icon" href="Images/logo.jpg">
    <link rel="apple-touch-icon" sizes="72x72" href="Images/logo.jpg">
    <link rel="apple-touch-icon" sizes="114x114" href="Images/logo.jpg">
    <link rel="apple-touch-icon" sizes="144x144" href="Images/logo.jpg">


</head>

<body>
    <div class="dashboard">
        <h3>Hello, Cilian</h3>
        <p>Welcome to Emmanuel's comprehensive 20-question quiz, designed to challenge your expertise across a
            wide range of subjects!. This quiz will take you on a journey through various fields,
            including history, science, literature, music, and more. Get ready to put your knowledge
            to the test and discover new fascinating facts. Good luck, and have fun!.</p>

        <a href="quiz.php" class="btn btn-dark">Start</a>

        <p>Made with love <i class="fa-solid fa-heart"></i> by Emmanuel Irekponor</p>

    </div>
</body>

</html>