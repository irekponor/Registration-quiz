<?php
session_start();

require_once "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userEmail = $_POST["email"];
    $score = $_POST["score"];

    if (isset($email) && isset($score)) {
        try {
            $query = "INSERT INTO quiz_scores (email, score) VALUES (:email, :score)";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":email", $userEmail);
            $stmt->bindParam(":score", $score);
            $stmt->execute();


            session_unset();
            session_destroy();

            header('Location: quiz.php');
        } catch (PDOException $e) {
            // error should be handled silently that's if there will be error sha
        }
    }
}
