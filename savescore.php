<?php
session_start();

require_once "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $score = $_POST["score"];
    $failed_questions = $_POST["failed_questions"];

    if (isset($email) && isset($score)) {
        try {
            $query = "INSERT INTO quiz_scores (email, score, failed_questions) VALUES (echo htmlspecialchars($userEmail), :score, :failed_questions)";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":echo htmlspecialchars($userEmail)", $email);
            $stmt->bindParam(":score", $score);
            $stmt->bindParam(":failed_questions", $failed_questions);
            $stmt->execute();


            session_unset();
            session_destroy();

            header('Location: quiz.php');
        } catch (PDOException $e) {
            // error should be handled silently that's if there will be error sha
        }
    }
}
