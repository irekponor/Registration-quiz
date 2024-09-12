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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="quiz.css">

    <!-- Favicons -->
    <link rel="shortcut icon" href="Images/logo.jpg">
    <link rel="apple-touch-icon" href="Images/logo.jpg">
    <link rel="apple-touch-icon" sizes="72x72" href="Images/logo.jpg">
    <link rel="apple-touch-icon" sizes="114x114" href="Images/logo.jpg">
    <link rel="apple-touch-icon" sizes="144x144" href="Images/logo.jpg">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/de8e2530fe.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container" id="quiz">
        <div id="quiz-header">
            <h2 id="question">MCQS text</h2>
            <ul>
                <li>
                    <input type="radio" class="answer" name="answer" id="a">
                    <label for="a" id="optionA">Option A</label>
                </li>
                <li>
                    <input type="radio" class="answer" name="answer" id="b">
                    <label for="b" id="optionB">Option B</label>
                </li>
                <li>
                    <input type="radio" class="answer" name="answer" id="c">
                    <label for="c" id="optionC">Option C</label>
                </li>
                <li>
                    <input type="radio" class="answer" name="answer" id="d">
                    <label for="d" id="optionD">Option D</label>
                </li>
            </ul>


        </div>

        <button id="submit">Next <i class="fa-solid fa-arrow-right-to-bracket"></i></button>

        <a href="logout.php" class="btn btn-dark">Log-out</a>
    </div>


    <script src="quiz.js"></script>
</body>

</html>