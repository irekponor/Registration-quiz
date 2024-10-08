<?php
session_start();

require_once "database.php";

$userEmail = $_SESSION['user_email'] ?? '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $score = $_POST["score"];

    if (isset($email) && isset($score)) {
        try {
            $query = "INSERT INTO quiz_scores (email, score) VALUES (:email, :score)";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":score", $score);
            $stmt->execute();
            header('Location: quiz.php');
        } catch (PDOException $e) {
            // error should be handled silently that's if there will be error sha
        }
    }
}
